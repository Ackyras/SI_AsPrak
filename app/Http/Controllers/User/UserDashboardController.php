<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\PeriodSubject;
use App\Models\PeriodSubjectRegistrar;
use App\Models\Presence;
use App\Models\Qr;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->registrar;
        // dd($user);
        $user->load(['period_subjects']);
        // dd(Session::all());
        return Inertia::render('Dashboard', [
            'user'  =>  $user
        ])->with( 'alert', [ 'msg' => 'Welcome back,' . $user->name, 'status' => 'success']);
    }

    public function presence(Request $request)
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
            ->with(
                [
                    'registrar',
                    'schedules'
                ]
            )
            ->first();

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

    public function scheduleIndex()
    {
        $period = Period::firstWhere('is_active', true);
        $user = auth()->user()->registrar;
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $period->id)
            ->where('registrar_id', $user->id)
            ->where('is_pass_exam_selection', true)
            ->where('is_pass_file_selection', true)
            ->with(
                [
                    'period_subject'    =>  function ($query) use ($user, $period) {
                        $query->where('period_id', $period->id)->with(
                            [
                                'classrooms.schedule.room',
                                'subject'
                            ]
                        );
                    },
                    'schedules' =>  function ($query) {
                        $query->with('classroom', 'room');
                    },
                ]
            )->get();
        $period_subjects = PeriodSubject::query()
            ->where('period_id', $period->id)
            ->whereRelation('registrars', 'registrars.id', $user->id)
            ->whereRelation('registrars', 'psr.is_pass_file_selection', true)
            ->whereRelation('registrars', 'psr.is_pass_exam_selection', true)
            ->whereRelation('registrars', 'psr.registrar_id', $user->id)
            ->with(
                [
                    'subject',
                    'classrooms.schedule',
                    'registrars'    =>  function ($query) use ($user) {
                        $query->where('registrars.id', $user->id);
                    }
                ]
            )
            ->get()
            // ->dd()
            //
        ;
        return Inertia::render('Schedule/Index', [
            'user'  =>  $user,
            'period_subjects'   =>  $period_subjects,
            'psrs'  =>  $psrs
        ]);
    }

    public function scheduleStore(Request $request)
    {
        // dd($request->all());
        // $validated = $request->validate(
        //     [
        //         'schedule_id'   =>  'required',
        //         'psr_id'        =>  'required'
        //     ]
        // );
        // dd($validated);
        // $schedule = Schedule::with('psrs')->find($validated['schedule_id']);
        // $psr = PeriodSubjectRegistrar::find($validated['psr_id']);
        // if($schedule->psrs->contains($psr)){

        // }
        // $schedule->psrs()->attach($validated['psr_id']);
        return to_route('user.schedule')
            ->with( 'alert', [ 'msg' => 'Welcome back, ', 'status' => 'success']);
    }
}
