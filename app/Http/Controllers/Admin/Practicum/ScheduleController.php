<?php

namespace App\Http\Controllers\Admin\Practicum;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Period;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
            ->with(['schedules', 'period_subject.subject'])
            ->withCount('schedules')
            ->get();
        $pivotCollection = new Collection();
        $classrooms->map(function ($classroom) use ($pivotCollection) {
            foreach ($classroom->schedules as $schedule) {
                $temp_schedule = Schedule::find($schedule->pivot->id);
                $temp_schedule->load('period_subject_registrars');
                dd($temp_schedule);
                $schedule->lab_asistant_count = $temp_schedule;
            }
        });

        // dd($classrooms[0]);
        return view('admin.pages.practicum.schedule.index', compact('classrooms'));
    }
}
