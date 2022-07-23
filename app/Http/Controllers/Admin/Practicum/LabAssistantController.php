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
        });
        return view('admin.pages.practicum.presence.index', compact('period'));
    }

    public function salaryIndex()
    {
        return view('admin.pages.practicum.assistant.salary', compact('period'));
    }

    public function presenceShow(PeriodSubject $period_subject)
    {
        $period_subject->load([
            'subject',
            'registrars' => function($query) {
                $query->where('psr.is_pass_exam_selection', true)
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
                ;
            }
        ]);
        // if (!request()->query('period_subject_id')) {
        //     return to_route('admin.practicum.lab-assistant.index')->with(
        //         [
        //             'failed'    =>  'Id yang dimasukkan salah'
        //         ]
        //     );
        // }
        // $period_subject = PeriodSubject::query()
        //     ->whereRelation('period', 'id', $this->period->id)
        //     ->with(
        //         [
        //             'subject',
        //             'registrars' =>  function ($query) {
        //                 $query->where('psr.is_pass_exam_selection', true)
        //                     ->withCount(
        //                         [
        //                             'presences' => function ($query) {
        //                                 $query->where('psr.period_subject_id', request()->query('period_subject_id'));
        //                             },
        //                             'schedules' => function ($query) {
        //                                 $query->where('psr.period_subject_id', request()->query('period_subject_id'));
        //                             }
        //                         ]
        //                     )
        //                 ;
        //             },

        //         ]
        //     )
        //     ->find(request()->query('period_subject_id'));
        // if (!$period_subject) {
        //     return to_route('admin.practicum.lab-assistant.index')->with(
        //         [
        //             'failed'    =>  'Id yang dimasukkan tidak dalam periode yang aktif saat ini'
        //         ]
        //     );
        // }
        // dd($period_subject);
        $lab_assistants = $period_subject->registrars;
        return view('admin.pages.practicum.presence.show', compact('lab_assistants', 'period_subject'));
    }
}
