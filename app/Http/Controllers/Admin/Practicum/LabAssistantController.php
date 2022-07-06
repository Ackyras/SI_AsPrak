<?php

namespace App\Http\Controllers\Admin\Practicum;

use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;
use App\Models\Registrar;

class LabAssistantController extends Controller
{
    //

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
    }

    public function index()
    {
        // $lab_assistants = PeriodSubjectRegistrar::query()
        //     ->whereRelation('period_subject', 'period_id', $this->period->id)
        //     ->where('is_pass_exam_selection', true)
        //     ->get();
        // $lab_assistants->load(['registrar', 'period_subject.subject']);
        $lab_assistants = Registrar::query()
            ->whereRelation('period_subjects', 'period_id', $this->period->id)
            ->whereHas('period_subjects', function ($query) {
                $query->where('period_subject_registrar.is_pass_exam_selection', true);
            })
            ->with('period_subjects.subject')
            ->get();
        return view('admin.pages.practicum.assistant.index', compact('lab_assistants'));
    }
}
