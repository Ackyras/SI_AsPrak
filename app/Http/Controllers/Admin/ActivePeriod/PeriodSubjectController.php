<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Period;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Period\StoreSubjectForPeriodRequest;
use App\Http\Requests\Period\UpdateSubjectForPeriodRequest;

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
        $allsubjects = Subject::whereDoesntHave('periods', function ($query) use ($period) {
            $query->where('period_id', $period->id);
        })->orderBy('name')->get();
        return view('admin.pages.active-period.period-subject.index', compact('period', 'allsubjects'));
    }
    public function addSubject(StoreSubjectForPeriodRequest $request, Period $period)
    {
        $validated = $request->validated();
        $period->subjects()->attach(
            $validated['subject_id'],
            $request->safe()->except('subject_id')
        );
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
