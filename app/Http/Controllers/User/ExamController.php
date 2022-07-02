<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubject;
use App\Models\Question;

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

    public function exam(PeriodSubject $subject)
    {
        $user = auth()->user()->registrar;
        $subject->load('questions.choices');

        return Inertia::render('Exam/TakeExam', [
            'user'      => $user,
            'period_subject'   => $subject
        ]);
    }

    // public function storeAnswer(Request $request, PeriodSubject $subject, Question $question)
    // {
    //     $validated = $request->validate(
    //         [
    //             'answer'    =>  'required',
    //         ]
    //     );
    //     dd($validated);
    // }
    public function storeAll(Request $request, PeriodSubject $subject)
    {
        dd($request->questions);
    }
}
