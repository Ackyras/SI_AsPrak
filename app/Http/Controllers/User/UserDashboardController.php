<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->registrar;
        $user->load('period_subjects');
        return Inertia::render('Dashboard', [
            'user'      => $user,
        ]);
    }
}
