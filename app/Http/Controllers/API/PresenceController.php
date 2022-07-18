<?php

namespace App\Http\Controllers\API;

use App\Models\Qr;
use App\Models\Presence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;
use Carbon\Carbon;

class PresenceController extends Controller
{
    //
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

        // if (now()->dayName != $qr->schedule->day) {
        //     return response('failed');
        // }

        $is_valid = false;
        if (now() < $qr->end_date) {
            $is_valid = true;
            return response($day != $qr->schedule->day);
        }
        // dd();
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
