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
                    $query->withCount('psrs')->with(
                        [
                            'room',
                            'psrs',
                        ],
                    );
                },
                'period_subject.subject'
            ])
            ->get();
        // dd($classrooms);
        $rooms = Room::all();
        return view('admin.pages.practicum.schedule.index', compact('classrooms', 'rooms'), ['period' => $this->period]);
    }

    public function assistantSchedule()
    {
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
            // ->dd();
            ->sortBy('period_subject.subject.name');
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

    public function store(Request $request, Classroom $classroom)
    {
        // dd($request->all());
        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        $classroom->load(
            [
                'period_subject.classrooms.schedule',
            ]
        );
        $period_subject = $classroom->period_subject;
        $current_psr = 0;
        foreach ($period_subject->classrooms as $newclassroom) {
            // dd($newclassroom);
            if ($newclassroom->schedule) {
                $current_psr += $newclassroom->schedule->number_of_lab_assistant;
            }
        }
        // dd($period_subject, $current_psr);
        $validated = $request->validate(
            [
                'day'                           =>  ['required', Rule::in($days)],
                'start_time'                    =>  ['required', 'date_format:H:i', 'before:end_time'],
                'end_time'                      =>  ['required', 'date_format:H:i'],
                'number_of_lab_assistant'       =>  [
                    'required',
                    function ($attribute, $value, $fail) use ($period_subject, $current_psr) {
                        $limit = $period_subject->number_of_lab_assistant;
                        $available = $limit - $current_psr;

                        if ($value > $available) {
                            $fail('Jumlah asisten praktikum yang tersedia adalah ' . $available);
                        }
                    }
                ],
                'room_id'                       =>  ['required']
            ]
        );
        $validated['classroom_id'] = $classroom->id;
        $schedule = Schedule::create($validated);
        if ($schedule) {
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
                    'success'   =>  'Jadwal berhasil diperbarui'
                ]
            );
        }
        return back()->with(
            [
                'failed'    =>  'Jadwal gagl diperbarui'
            ]
        );
    }

    public function addSchedule(Request $req)
    {
        $validated = $req->validate(
            [
                'psr_id'        =>  'required',
                'schedule.*'    =>  'nullable'
            ]
        );
        // dd($validated['schedule']);
        if (isset($validated['schedule'])) {
            $errMsg = '';
            $status = 'success';
            foreach ($validated['schedule'] as $schedule_id) {
                $schedule = Schedule::find($schedule_id);
                $schedule->loadCount('psrs')
                    ->load('classroom.period_subject.subject');
                if ($schedule->number_of_lab_assistant >= $schedule->psrs_count) {
                    $errMsg = 'Jumlah asisten praktikum untuk mata kuliah ' .
                        $schedule->classroom->period_subject->subject->name .
                        ' kelas ' . $schedule->classroom->name . ' sudah penuh.
                        ';
                }
                $schedule->psrs()->attach($validated['psr_id']);
            }
            if ($errMsg != '') {
                return back()->with(
                    [
                        'warning'   =>  'Sebagian pembaruan gagal dilakukan.
                        ' . $errMsg
                    ]
                );
            }
        } else {
            $psr = PeriodSubjectRegistrar::find($validated['psr_id']);
            $psr->schedules()->detach();
        }

        return back()->with(
            [
                'success'   =>  'Berhasil memperbarui jadwal'
            ]
        );
    }
}
