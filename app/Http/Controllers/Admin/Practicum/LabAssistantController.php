<?php

namespace App\Http\Controllers\Admin\Practicum;

use App\Models\Period;
use App\Models\Classroom;
use App\Models\Registrar;
use Illuminate\Http\Request;
use App\Models\PeriodSubject;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;
use App\Models\Presence;

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
            ->dd()
            //
        ;
        return view('admin.pages.practicum.presence.index', compact('period', 'period_subjects'));
    }

    public function salaryIndex()
    {
        $registrars = Registrar::query()
            ->whereRelation('period_subjects.period', 'is_active', true)
            ->whereRelation('period_subjects', 'psr.is_pass_file_selection', true)
            ->whereRelation('period_subjects', 'psr.is_pass_exam_selection', true)
            ->with(
                [
                    'period_subjects'   =>  function ($query) {
                        $query->where('psr.is_pass_file_selection', true)
                            ->where('psr.is_pass_exam_selection', true)
                            ->with(
                                [
                                    'classrooms.schedule.qrs'
                                    // =>  function ($query) {
                                    //     $query->withCount(
                                    //         [
                                    //             'presenceds as presence_count'  =>  function ($query) {
                                    //                 $query->where('psr_id', 'psr.id');
                                    //             }
                                    //         ]
                                    //     )
                                    //         //
                                    //     ;
                                    // }
                                    // //
                                    ,
                                    'subject'
                                ]
                            )
                            //
                        ;
                    }
                ]
            )
            ->get()
            ->each(function ($registrar) {
                // $psrId = $registrar->period_subjects->pluck('pivot.id');
                // dd($psrId);
                foreach ($registrar->period_subjects as $period_subject) {
                    $total_presences = 0;
                    foreach ($period_subject->classrooms as $classroom) {
                        // $total_presences = $classroom->schedule->qrs
                        $classroom_presences = 0;
                        $classroom->schedule->qrs->loadCount(
                            [
                                'presenceds as presence_count'    => function ($query) use ($period_subject) {
                                    $query->where('psr_id', $period_subject->pivot->id);
                                }
                            ]
                        );
                        $classroom->total_presences = $classroom->schedule->qrs->sum('presence_count');
                    }
                    $period_subject->pivot->total_presences = $period_subject->classrooms->sum('total_presences');
                }
                $registrar->total_presences = $registrar->period_subjects->sum('pivot.total_presences');
                return $registrar;
            })
            // ->dd()
        ;
        // dd($registrars[0]);
        $period = $this->period;
        return view('admin.pages.practicum.assistant.salary', compact('registrars', 'period'));
    }

    public function salaryPost(Registrar $registrar)
    {
        $registrar->update(
            [
                'is_honor_taken'    =>  true,
            ]
        );
        if ($registrar->wasChanged()) {
            return back()->with(
                [
                    'success'   =>  'Status honor asprak berhasil diubah'
                ]
            );
        }
        return back()->with(
            [
                'failed'   =>  'Status honor asprak gagal diubah'
            ]
        );
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
            // ->whereRelation('registrar.user', 'is_active', true)
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

    public function presenceUpdate(Request $req)
    {
        // dd($req->all());
        $validated = $req->validate(
            [
                'psr_id'        =>  'required',
                'qr_id'   =>  'required'
            ]
        );
        $presence = Presence::where('psr_id', $validated['psr_id'])->where('qr_id', $validated['qr_id'])->first();
        $presence->update(
            [
                'is_valid'  =>  true,
            ]
        );
        if ($presence->wasChanged()) {
            return back()->with(
                [
                    'success'   =>  'Status presensi berhasil diubah'
                ]
            );
        }
        return back()->with(
            [
                'failed'   =>  'Status presensi gagal diubah'
            ]
        );
    }
}
