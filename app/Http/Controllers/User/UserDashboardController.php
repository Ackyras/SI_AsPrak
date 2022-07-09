<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;
use App\Models\Qr;

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

    // public function presence(Request $request)
    // {
    //     $validated = $request->validate(
    //         [
    //             'token' =>  'required',
    //         ]
    //     );
    //     $qr=Qr::where('token', $validated['token'])->first();
    //     if (!$qr) {
    //         return back()->with('');
    //     }
    // }
}
