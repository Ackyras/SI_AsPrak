<?php

namespace App\Http\Controllers\User;

use App\Models\Qr;
use Inertia\Inertia;
use App\Models\Period;
use App\Models\Presence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;

class PresenceController extends Controller
{
    //
    public function index()
    {
        $period = Period::firstWhere('is_active', true);
        $user = auth()->user()->registrar;
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $period->id)
            ->where('registrar_id', $user->id)
            ->where('is_pass_exam_selection', true)
            ->where('is_pass_file_selection', true)
            ->get();
        // dd($psrs);
        $psrs->map(function ($psr) use ($user, $period) {
            $id = $psr->id;
            // dd($id);
            $psr
                ->load(
                    [
                        'period_subject'    =>  function ($query) use ($user, $period, $id) {
                            $query->where('period_id', $period->id)->with(
                                [
                                    'classrooms'    =>  function ($query) use ($user, $id) {
                                        $query->whereRelation('schedule.psrs', 'psr.registrar_id', $user->id)
                                            ->with(
                                                [
                                                    'schedule.qrs' => function ($query) use ($id) {
                                                        $query->withCount(
                                                            [
                                                                'presenceds as valid_presence_count' => function ($query) use ($id) {
                                                                    $query->where('psr_id', $id)->where('is_valid', true);
                                                                },
                                                                'presenceds as invalid_presence_count' => function ($query) use ($id) {
                                                                    $query->where('psr_id', $id)->where('is_valid', false);
                                                                }
                                                            ]
                                                        )->with(
                                                            [
                                                                'presenceds' => function ($query) use ($id) {
                                                                    $query->where('psr_id', $id);
                                                                }
                                                            ]
                                                        );
                                                    }
                                                ]
                                            );
                                    },
                                    'subject'
                                ]
                            );
                        },
                    ]
                )
                //
            ;
            $psr->period_subject->classrooms->map(function ($classroom) {
                $classroom->total_valid_presence = $classroom->schedule->qrs->sum('valid_presence_count');
                $classroom->total_invalid_presence = $classroom->schedule->qrs->sum('invalid_presence_count');
            });
        });
        $extrapsrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $period->id)
            ->where('registrar_id', $user->id)
            ->where('is_pass_exam_selection', true)
            ->where('is_pass_file_selection', true)
            ->get();
        $extrapsrs->map(function ($psr) use ($user, $period) {
            $id = $psr->id;
            // dd($id);
            $psr
                ->load(
                    [
                        'period_subject'    =>  function ($query) use ($user, $period, $id) {
                            $query->where('period_id', $period->id)->with(
                                [
                                    'classrooms'    =>  function ($query) use ($user, $id) {
                                        $query
                                            ->whereRelation('schedule.qrs.presenceds', 'presences.psr_id', $id)
                                            ->with(
                                                [
                                                    'schedule.qrs' => function ($query) use ($id) {
                                                        $query->withCount(
                                                            [
                                                                'presenceds as valid_presence_count' => function ($query) use ($id) {
                                                                    $query->where('psr_id', $id)->where('is_valid', true);
                                                                },
                                                                'presenceds as invalid_presence_count' => function ($query) use ($id) {
                                                                    $query->where('psr_id', $id)->where('is_valid', false);
                                                                }
                                                            ]
                                                        )->with(
                                                            [
                                                                'presenceds' => function ($query) use ($id) {
                                                                    $query->where('psr_id', $id);
                                                                }
                                                            ]
                                                        );
                                                    }
                                                ]
                                            );
                                    },
                                    'subject'
                                ]
                            );
                        },
                    ]
                )
                //
            ;
            $psr->period_subject->classrooms->map(function ($classroom) {
                $classroom->total_valid_presence = $classroom->schedule->qrs->sum('valid_presence_count');
                $classroom->total_invalid_presence = $classroom->schedule->qrs->sum('invalid_presence_count');
            });
        });
        // dd($psrs, $extrapsrs);
        return Inertia::render('Presence/Index', [
            'user'  =>  $user,
            'psrs'  =>  $psrs,
            'extraPsrs'  =>  $extrapsrs,
        ]);
    }

    public function store(Request $request)
    {
        $state = false;
        // validating token
        $validated = $request->validate(
            [
                'token' =>  'required',
            ]
        );

        // finding qr with token
        $qr = Qr::query()
            ->where('token', $validated['token'])
            ->with(
                [
                    'schedule'  =>  [
                        'classroom.period_subject.subject'
                    ],
                ]
            )
            ->first();

        // return failed if qr is not found
        if (!$qr) {
            return to_route('user.dashboard')->with(
                [
                    'alert'  =>  [
                        'msg'       =>  'Kode presensi tidak ditemukan, harap coba kembali beberapa saat, atau hubungi admin.',
                        'status'    =>  'failed'
                    ]
                ]
            );
        }

        // checikng if now is the right time to presence
        $schedule = $qr->schedule;
        $day = now()->dayName;
        $time = now()->format('H:i');
        $timeState = false;
        if ($schedule->day == $day && ($schedule->start_time < $time && $schedule->end_time > $time)) {
            $timeState = true;
        }

        // finding psr for user
        $psr = PeriodSubjectRegistrar::query()
            ->where('registrar_id', auth()->user()->registrar->id)
            ->where('period_subject_id', $qr->schedule->classroom->period_subject->id)
            ->where('is_pass_file_selection', true)
            ->where('is_pass_exam_selection', true)
            ->with(
                [
                    'registrar',
                    'schedules'
                ]
            )
            ->first();
        // dd($psr);

        // return failed if user is not registered as lab assistant
        if (!$psr) {
            return to_route('user.dashboard')->with(
                [
                    'alert'  =>  [
                        'msg'       =>  'Anda tidak terdaftar sebagai asisten di mata kuliah ' . $qr->schedule->classroom->period_subject->subject->name,
                        'status'    =>  'failed'
                    ]
                ]
            );
        }

        // validating the class is right
        $classState = false;
        // dd($psr->schedules, $qr->schedule);
        // dd($psr->schedules->contains('id', $qr->schedule->id));
        if ($psr->schedules->contains('id', $qr->schedule->id)) {
            $classState = true;
        }
        if ($timeState && $classState) {
            $state = true;
        }

        // check if lab assistant already presence
        $presence = Presence::query()
            ->where('psr_id', $psr->id)
            ->where('qr_id', $qr->id)
            ->count();
        if ($presence > 0) {
            return to_route('user.dashboard')->with(
                [
                    'alert'  =>  [
                        'msg'       =>  'Anda tidak dapat mealakukan presensi lebih dari 1 kali untuk Mata Kuliah ini',
                        'status'    =>  'failed'
                    ]
                ]
            );
        }

        // submit presence
        $presence = Presence::create(
            [
                'psr_id'    =>  $psr->id,
                'qr_id'     =>  $qr->id,
                'is_valid'  =>  $state
            ]
        );
        if ($presence) {
            return to_route('user.dashboard')->with(
                [
                    'alert'  =>  [
                        'msg'       =>  'Presensi berhasil dilakukan',
                        'status'    =>  'success'
                    ]
                ]
            );
        }

        // return unk error
        return to_route('user.dashboard')->with(
            [
                'alert'  =>  [
                    'msg'       =>  'Presensi gagal dilakukan, harap coba kembail beberapa saat',
                    'status'    =>  'failed'
                ]
            ]
        );
    }
}
