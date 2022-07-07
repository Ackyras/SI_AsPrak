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
            ->with(['schedules.room', 'period_subject.subject'])
            ->get();
        // dd($classrooms);
        $pivotCollection = new Collection();
        return view('admin.pages.practicum.schedule.index', compact('classrooms'), ['period' => $this->period]);
    }
}
