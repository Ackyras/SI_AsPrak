<?php

namespace App\Http\Controllers\Admin\Practicum;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Period;
use App\Models\Schedule;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;
use Illuminate\Database\Eloquent\Collection;

class ScheduleController extends Controller
{
    public $period;

    //
    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
    }

    public function index()
    {
        $classrooms = Classroom::query()
            ->whereRelation('period_subject', 'period_id', $this->period->id)
            ->with([
                'schedule' => function ($query) {
                    $query->withCount('psrs');
                },
                'schedule' => [
                    'room',
                    'psrs',
                ],
                'period_subject.subject'
            ])
            ->get();
        // dd($classrooms);
        $rooms = Room::all();
        return view('admin.pages.practicum.schedule.index', compact('classrooms', 'rooms'), ['period' => $this->period]);
    }

    public function assistantSchedule()
    {
        // $classrooms = Classroom::query()
        //     ->whereRelation('period_subject', 'period_id', $this->period->id)
        //     ->with([
        //         'schedule' => function ($query) {
        //             $query->withCount('psrs');
        //         },
        //         'schedule' => [
        //             'room',
        //             'psrs',
        //         ],
        //         'period_subject.subject'
        //     ])
        //     ->get();
        // $rooms = Room::all();
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject.period', 'is_active', true)
            ->whereRelation('period_subject', 'period_id', $this->period->id)
            ->where('is_pass_file_selection', true)
            ->where('is_pass_exam_selection', true)
            ->with(
                [
                    'period_subject'    =>  function ($query) {
                        $query->where('period_id', $this->period->id)
                            ->with('subject');
                    },
                    'schedules' => [
                        'classroom',
                        'room'
                    ],
                    'registrar'
                ],
            )
            ->get()
            ->sortBy('period_subject.subject.name')
            // ->dd()
            //
        ;
        // dd($psrs[0]->schedules);
        $schedules = Schedule::query()
            ->whereRelation('classroom.period_subject', 'period_id', $this->period->id)
            ->with(
                [
                    'classroom.period_subject',
                    'psrs',
                    'room'
                ]
            )
            ->withCount('psrs')
            ->get()
            // ->dd()
            //
        ;
        return view('admin.pages.practicum.schedule.assistant-schedule', compact('psrs', 'schedules'), ['period' => $this->period]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        $validated = $request->validate(
            [
                'day'                           =>  ['required', Rule::in($days)],
                'start_time'                    =>  ['required', 'date_format:H:i', 'before:end_time'],
                'end_time'                      =>  ['required', 'date_format:H:i'],
                'number_of_lab_assistant'       =>  ['required', function ($attribute, $value, $fail) use ($schedule) {
                    $limit = $schedule->classroom->period_subject->number_of_lab_assistant;
                    $available = $limit - $schedule->psrs->count();

                    if ($value > $available) {
                        $fail('Jumlah asisten praktikum yang tersedia adalah ' . $available);
                    }
                }],
                'room_id'                       =>  ['required']
            ]
        );
        // dd($validated);
        if ($schedule->updateOrFail($validated)) {
            return back()->with(
                [
                    'success'   =>  'Jadwal baru berhasil dibuat'
                ]
            );
        }
        return back()->with(
            [
                'failed'    =>  'Jadwal gagl dibuat'
            ]
        );
    }

    public function addSchedule(Request $req)
    {
        $validated = $req->validate(
            [
                'schedule_id'   =>  'required'
            ]
        );
        $schedule = Schedule::find($validated['schedule_id']);
        $schedule->loadCount('psrs')
            ->load('classroom.period_subject.subject');
        if ($schedule->psrs_count < $schedule->number_of_lab_assistant) {
            dd($schedule);
        } else {
            dd('OD');
        }
    }
}
