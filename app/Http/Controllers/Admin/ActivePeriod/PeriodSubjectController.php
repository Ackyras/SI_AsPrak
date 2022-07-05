<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Period;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Period\StoreSubjectForPeriodRequest;
use App\Http\Requests\Period\UpdateSubjectForPeriodRequest;
use App\Models\Classroom;

class PeriodSubjectController extends Controller
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
        $allsubjects = Subject::whereDoesntHave('periods', function ($query) use ($period) {
            $query->where('period_id', $period->id);
        })->orderBy('name')->get();
        return view('admin.pages.active-period.period-subject.index', compact('period', 'allsubjects'));
    }
    public function addSubject(StoreSubjectForPeriodRequest $request, Period $period)
    {
        $validated = $request->validated();
        $period_subject = $period->subjects()->attach(
            $validated['subject_id'],
            $request->safe()->except(['subject_id', 'number_of_class', 'class_name_prefix'])
        );
        dd($period_subject);
        $alphabet = range('A', 'Z');
        for ($i = 0; $i < $validated['number_of_class']; $i++) {
            # code...
            $iteration = '';
            if ($validated['class_name_prefix'] == 'TPB') {
                $iteration = $alphabet[$i];
            } else if ($validated['class_name_prefix'] == 'TPB') {
                $iteration = $i + 1;
            }
            $classrooms = Classroom::create(
                [
                    'name'  =>  $validated['class_name_prefix'] . ' ' . $iteration,
                ]
            );
        };
        return back()->with(
            [
                'success'   =>  'Mata Kuliah baru berhasil ditambahkan ke dalam periode' . $period->name,
            ]
        );
    }
    public function updateSubject(UpdateSubjectForPeriodRequest $request, Period $period, Subject $subject)
    {
        $validated = $request->validated();
        $period->subjects()->updateExistingPivot($subject->id, $validated);

        return back()->with(
            [
                'success'   =>  'Mata Kuliah berhasil diperbarui ke dalam periode' . $period->name,
            ]
        );
    }
}
