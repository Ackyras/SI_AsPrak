<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;
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
                    'msg'       =>  'welcome ' . $user->name,
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
                        'psrs'  =>  [
                            // function ($query){
                            //     $query->where('');
                            // },
                            'period_subject.subject',
                            'registrar',
                        ],
                        'classroom.period_subject.subject'
                    ],
                    'period_subject_registrar'
                ]
            )
            ->first();
        dd($qr);
        $registrar = auth()->user()->registrar;
        $user = User::with('registrar')->where('email', 'user@user')->first();
        $psr = PeriodSubjectRegistrar::query()
            ->where('period_subject_id', $qr->schedule->psrs)
            //
        ;
        if ($qr->schedule->psrs->contain($user->registrar)) {
            return response()->json(
                [
                    'msg'   =>  'Presensi sudah ada'
                ]
            );
        }
        return response()->json($qr);
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
    }
}
