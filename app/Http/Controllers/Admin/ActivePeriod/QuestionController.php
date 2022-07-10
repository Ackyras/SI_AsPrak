<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use Illuminate\Http\Request;
use App\Models\PeriodSubject;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index(PeriodSubject $period_subject)
    {
        $period_subject->load(['questions.choices']);
        return view('admin.pages.active-period.period-subject-question.index', compact('period_subject'));
    }
    
    public function create(PeriodSubject $period_subject)
    {
        return view('admin.pages.active-period.period-subject-question.create', compact('period_subject'));
    }
    
    public function store(Request $request, PeriodSubject $period_subject)
    {
        dd($request->request);
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit()
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
