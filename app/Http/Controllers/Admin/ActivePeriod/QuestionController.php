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
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
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
