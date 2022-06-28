<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;

class UserDashboardController extends Controller
{
    public function index(){
        $user = auth()->user()->registrar;
        $period_subject_registrar = PeriodSubjectRegistrar::where('registrar_id',$user->id)
            ->with('period_subject.subject')
            ->get();
        // dd($user,$period_subject_registrar);
        return Inertia::render('Dashboard', [
            'user'      => $user,
            'period_subject_registrar'  => $period_subject_registrar
        ]);
    }
}
