<?php

namespace App\Http\Controllers\Admin\Practicum;

use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubject;
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
                $query->where('psr.is_pass_exam_selection', true);
            })
            ->with('period_subjects.subject')
            ->get();
        $this->period->load('subjects');
        $subjects = $this->period->subjects;
        return view('admin.pages.practicum.assistant.index', compact('lab_assistants', 'subjects'));
    }

    public function subjectBased()
    {
        if (!request()->query('period_subject_id')) {
            return to_route('admin.practicum.lab-assistant.index')->with(
                [
                    'failed'    =>  'Id yang dimasukkan salah'
                ]
            );
        }
        $period_subject = PeriodSubject::query()
            ->whereRelation('period', 'id', $this->period->id)
            ->with(
                [
                    'subject',
                    'registrars' =>  function ($query) {
                        $query->where('psr.is_pass_exam_selection', true)
                            // ->where('psr.is_pass_file_selection', true)
                            ->withCount(
                                [
                                    'presences' => function ($query) {
                                        $query->where('psr.period_subject_id', request()->query('period_subject_id'));
                                    },
                                    'schedules' => function ($query) {
                                        $query->where('psr.period_subject_id', request()->query('period_subject_id'));
                                    }
                                ]
                            )
                            //
                        ;
                    },

                ]
            )
            ->find(request()->query('period_subject_id'));
        if (!$period_subject) {
            return to_route('admin.practicum.lab-assistant.index')->with(
                [
                    'failed'    =>  'Id yang dimasukkan tidak dalam periode yang aktif saat ini'
                ]
            );
        }
        // dd($period_subject);
        $lab_assistants = $period_subject->registrars;
        // dd($lab_assistants);
        $this->period->load('subjects');
        $subjects = $this->period->subjects;
        return view('admin.pages.practicum.assistant.index-per-subject', compact('subjects', 'lab_assistants'));
    }
}
