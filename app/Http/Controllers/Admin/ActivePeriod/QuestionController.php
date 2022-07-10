<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use Illuminate\Http\Request;
use App\Models\PeriodSubject;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index(PeriodSubject $period_subject)
    {
        $period_subject->load(['questions.choices']);
        return view('admin.pages.active-period.period-subject-question.index', compact('period_subject'));
    }

    public function create()
    {
        //
    }

    public function store(StoreQuestionRequest $request, PeriodSubject $period_subject)
    {
        //
        $validated = $request->validated();
        if($validated['type'] == '')
        $question = Question::create($validated);
        // $period_subject->questions()->create($validated);
    }

    public function show(Question $question)
    {
        //
    }

    public function edit(Question $question)
    {
        //
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    public function destroy(Question $question)
    {
        //
    }
}
