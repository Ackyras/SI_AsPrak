<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;
use App\Models\Presence;
use App\Models\Qr;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->registrar;
        $user->load(['period_subjects']);
        return Inertia::render('Dashboard', [
            'user'  =>  $user
        ])->with(
            [
                'alert'   =>  [
                    'msg'       =>  'Welcome ' . $user->name,
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
}
