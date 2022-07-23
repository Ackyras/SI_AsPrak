<?php

namespace App\Http\Controllers\Admin\Practicum;

use App\Models\Period;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresenceController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
    }

    public function index()
    {
        $period = $this->period;
        $period->load('subjects');
        $period->subjects->map(function ($subject) {
            $classrooms_count = Classroom::where('period_subject_id', $subject->pivot->id)->count();
            $subject->pivot->classrooms_count = $classrooms_count;
        });
        return view('admin.pages.practicum.presence.index', compact('period'));
    }
}
