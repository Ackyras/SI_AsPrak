<?php

namespace App\Http\Controllers\Admin\Period;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Period;
use App\Models\PeriodSubject;
use App\Models\Subject;

class QuestionController extends Controller
{
    public function index(Period $period, Subject $subject)
    {
        $periodsubject = PeriodSubject::where('period_id', $period->id)->where('subject_id', $subject->id)->first();
        // dd($periodsubject);
        $periodsubject->load(['questions.choices']);
        return view('admin.pages.periodsubject.question.index', compact('periodsubject', 'period', 'subject'));
    }

    public function create(Period $period, Subject $subject)
    {
        $periodsubject = PeriodSubject::where('period_id', $period->id)->where('subject_id', $subject->id)->first();
        return view('admin.pages.periodsubject.question.create', compact('periodsubject'));
    }

    public function store(StoreQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
