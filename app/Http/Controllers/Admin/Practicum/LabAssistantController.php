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
        $period->load(
            [
                'subjects'
            ]
        );
        $period_subjects = PeriodSubject::query()
            ->where('period_id', $period->id)
            ->with(
                [
                    'subject',
                    'classrooms' => [
                        'schedule'  =>  function ($query) {
                            $query->withCount('psrs');
                        }
                    ]
                ]
            )->withCount(
                [
                    'classrooms',
                ]
            )
            ->get()
            ->map(function ($period_subject) {
                $total_lab_assistant = 0;
                // $total_lab_assistant = $period_subject->classrooms->sum('schedule.psrs_count');
                foreach ($period_subject->classrooms as $classroom) {
                    $total_lab_assistant += $classroom->schedule->psrs_count;
                }
                $period_subject->lab_assistant_count = $total_lab_assistant;
                return $period_subject;
            })
            // ->dd()
            //
        ;
        return view('admin.pages.practicum.presence.index', compact('period', 'period_subjects'));
    }

    public function salaryIndex()
    {
        return view('admin.pages.practicum.assistant.salary');
    }

    public function presenceShow(PeriodSubject $period_subject)
    {
        $period_subject->load(
            [
                'classrooms.schedule' => function ($query) {
                    $query->withCount('psrs');
                },
            ]
        );
        return view('admin.pages.practicum.presence.show', compact('period_subject'));
    }

    public function presenceShowAssistant(PeriodSubject $period_subject, Classroom $classroom)
    {
        $period_subject->load(
            [
                'subject',
            ]
        );
        $classroom->load(
            [
                'schedule' => function ($query) {
                    $query->with(
                        [
                            'qrs' => [
                                'presenceds'
                            ]
                        ]
                    )->withCount('qrs');
                }
            ]
        );
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_subject.id', $period_subject->id)
            ->whereRelation('registrar.user', 'is_active', true)
            ->whereRelation('schedules', 'classroom_id', $classroom->id)
            ->where('is_pass_file_selection', true)
            ->where('is_pass_exam_selection', true)
            ->with(
                [
                    'presences',
                    'registrar'
                ]
            )
            ->get()
            //
        ;
        $psrs_id = $psrs->pluck('id')->toArray();
        // dd($psrs, $psrs_id);
        $extrapsrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_subject.id', $period_subject->id)
            ->whereRelation('registrar.user', 'is_active', true)
            ->whereRelation('schedules', 'classroom_id', '!=', $classroom->id)
            ->whereRelation('presences.schedule.classroom', 'classrooms.id', $classroom->id)
            ->where('is_pass_file_selection', true)
            ->where('is_pass_exam_selection', true)
            ->with(
                [
                    'presences',
                    'registrar'
                ]
            )
            ->get()
            ->except($psrs_id)
            //
        ;
        return view('admin.pages.practicum.presence.show-assistant', compact('period_subject', 'classroom', 'psrs', 'extrapsrs'));
    }
}
