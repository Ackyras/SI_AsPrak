<?php

namespace App\Http\Controllers\Admin\Practicum;

use App\Models\Period;
use App\Models\Classroom;
use App\Models\Registrar;
use Illuminate\Http\Request;
use App\Models\PeriodSubject;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;

class LabAssistantController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
    }

    public function index()
    {
        $period = $this->period;
        $lab_assistants = Registrar::query()
            ->whereRelation('period_subjects', 'period_id', $this->period->id)
            ->whereHas('period_subjects', function ($query) {
                $query->where('psr.is_pass_exam_selection', true)
                    ->where('psr.is_pass_file_selection', true);
            })
            ->with(
                [
                    'period_subjects' => function ($query) use ($period) {
                        $query->where('period_id', $period->id)
                            ->where('psr.is_pass_exam_selection', true)
                            ->where('psr.is_pass_file_selection', true)
                            ->with('subject');
                    },
                ]
            )
            ->get();
        $this->period->load('subjects');
        $subjects = $this->period->subjects;
        return view('admin.pages.practicum.assistant.index', compact('lab_assistants', 'subjects'));
    }

    public function presenceIndex()
    {
        $period = $this->period;
        $period->load('subjects');
        $period->subjects->map(function ($subject) {
            $classrooms_count = Classroom::where('period_subject_id', $subject->pivot->id)->count();
            $subject->pivot->classrooms_count = $classrooms_count;
            $lab_assistants_count = PeriodSubjectRegistrar::query()
                ->where('is_pass_file_selection', true)
                ->where('is_pass_exam_selection', true)
                ->where('period_subject_id', $subject->pivot->id)
                ->get()
                ->count()
                //
            ;
            $subject->pivot->current_lab_assistant_count = $lab_assistants_count;
        });
        // dd($period);
        return view('admin.pages.practicum.presence.index', compact('period'));
    }

    public function salaryIndex()
    {
        return view('admin.pages.practicum.assistant.salary');
    }

    public function presenceShow(PeriodSubject $period_subject)
    {
        // $period_subject->load([
        //     'subject',
        //     'registrars' => function ($query) {
        //         $query->where('psr.is_pass_exam_selection', true)
        //             ->where('psr.is_pass_file_selection', true)
        //             ->where('psr.period_subject_id', 'period_subject.id')
        //             ->withCount(
        //                 [
        //                     'presences' => function ($query) {
        //                         $query->where('psr.period_subject_id', 'period_subject.id');
        //                     },
        //                     'schedules' => function ($query) {
        //                         $query->where('psr.period_subject_id', 'period_subject.id');
        //                     }
        //                 ]
        //             );
        //     },
        //     'classrooms'    =>  function($query){

        //     }
        // ]);
        $period_subject->load(
            [
                'classrooms.schedule',
            ]
        );
        $psr = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_subject.id', $period_subject->id)
            ->whereRelation('period_subject', 'psr.is_pass_file_selection', true)
            ->whereRelation('period_subject', 'psr.is_pass_exam_selection', true)
            ->with(
                [
                    'registrar',
                    'presences'
                ]
            )
            ->get()
            //
        ;
        // dd($period_subject, $psr);
        $lab_assistants = $period_subject->registrars;
        return view('admin.pages.practicum.presence.show', compact('lab_assistants', 'period_subject'));
    }

    public function presenceShowAssistant(PeriodSubject $period_subject, Classroom $class)
    {
        return view('admin.pages.practicum.presence.show-assistant', compact('period_subject'));
    }
}
