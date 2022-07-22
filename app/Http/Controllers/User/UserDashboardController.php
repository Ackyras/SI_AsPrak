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
        ])
            ->with(
                [
                    'alert'   =>  Session::has('alert') ?
                        Session::get('alert', 'default')
                        :
                        [
                            'msg'       =>  'Welcome back,' . $user->name,
                            'status'    =>  'success',
                        ],
                ]
            );
    }

    public function presence(Request $request)
    {
        $validated = $request->validate(
            [
                'token' =>  'required',
            ]
        );

        $qr = Qr::query()
            ->where('token', $validated['token'])
            ->with(
                [
                    'schedule'  =>  [
                        'classroom.period_subject'
                    ],
                ]
            )
            ->first();
        if (!$qr) {
            return back()->with(
                [
                    'notification'  =>  [
                        'msg'       =>  'Kode presensi tidak ditemukan, harap coba kembali beberapa saat, atau hubungi admin.',
                        'status'    =>  'failed'
                    ]
                ]
            );
        }
        $day = now()->format('l');
        // if()
        $registrar = auth()->user()->registrar;
        $registrar->load(
            [
                'period_subjects'
            ]
        );
        $psr = PeriodSubjectRegistrar::query()
            ->where('registrar_id', $registrar->id)
            ->where('period_subject_id', $qr->schedule->classroom->period_subject->id)
            ->first();
        dd($qr);
        $presence = Presence::query()
            ->where('psr_id',);

        dd($psr);
        // if ($registrar) {
        //     return response()->json(
        //         [
        //             'msg'   =>  'Presensi sudah ada'
        //         ]
        //     );
        // }
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
                                'classrooms.schedule'
                            ]
                        );
                    },
                    'schedules'
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
}
