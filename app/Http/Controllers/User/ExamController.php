<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubject;

class ExamController extends Controller
{
    public function index()
    {
        $user = auth()->user()->registrar;
        $user->load('period_subjects');
        // dd($user);
        return Inertia::render('Exam/Index', [
            'user'      => $user,
        ]);
    }

    public function exam($period_subject_id)
    {
        $user = auth()->user()->registrar;
        $user->load('period_subjects');

        $period_subject = PeriodSubject::where('id',$period_subject_id)->first();
        $period_subject->load('questions');
        // dd($period_subject);

        return Inertia::render('Exam/TakeExam', [
            'user'      => $user,
            'period_subject'   => $period_subject
        ]);
    }
}
