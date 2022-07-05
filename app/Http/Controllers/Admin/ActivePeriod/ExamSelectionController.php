<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Period;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubject;
use App\Models\PeriodSubjectRegistrar;

class ExamSelectionController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
        $this->period->load('subjects');
    }
    public function index()
    {
        $period = $this->period;
        $allsubjects = Subject::whereDoesntHave('periods', function ($query) use ($period) {
            $query->where('period_id', $period->id);
        })->orderBy('name')->get();
        return view('admin.pages.active-period.exam-selection.index', compact('period', 'allsubjects'));
    }

    public function examData()
    {
        $period = $this->period;
        return view('admin.pages.active-period.exam-selection.exam-data', compact('period'));
    }
    public function examDataDetail(PeriodSubject $period_subject)
    {
        $period_subject_registrar = PeriodSubjectRegistrar::query()
            ->where('period_subject_id', $period_subject->id)
            ->get();
        $period_subject_registrar->load('registrar');
        return view('admin.pages.active-period.exam-selection.exam-data-detail', compact('period_subject','period_subject_registrar'));
    }
    public function registrarExamData(PeriodSubject $period_subject, PeriodSubjectRegistrar $psr)
    {
        $registrar = $psr->registrar;
        return view('admin.pages.active-period.exam-selection.registrar-exam-data', compact('period_subject','registrar'));
    }
}
