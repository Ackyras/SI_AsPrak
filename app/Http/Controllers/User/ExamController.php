<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index()
    {
        $user = auth()->user()->registrar;
        $user->load('period_subjects');
        return Inertia::render('ExamSelection', [
            'user'      => $user,
        ]);
    }
}
