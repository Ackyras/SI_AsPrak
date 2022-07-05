<?php

namespace App\Http\Controllers\Admin\Period;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Http\Requests\Period\StorePeriodRequest;
use App\Http\Requests\Period\StoreSubjectForPeriodRequest;
use App\Http\Requests\Period\UpdatePeriodRequest;
use App\Http\Requests\Period\UpdateSubjectForPeriodRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();
        return view('admin.pages.datamaster.periods.index', compact('periods'));
    }

    public function create()
    {
        //
    }

    public function store(StorePeriodRequest $request)
    {
        //
        $validated = $request->validated();
        $activePeriod = Period::where('is_active', true)->first();
        if ($activePeriod) {
            return to_route('admin.data-master.period.index')->with(
                [
                    'failed'   =>  'Masih ada periode yang belum ditutup, periode baru tidak dapat dibuka'
                ]
            );
        }
        $period = Period::create($validated);

        if ($period) {
            return to_route('admin.data-master.period.index')->with(
                [
                    'success'   =>  'Periode baru berhasil dibuka'
                ]
            );
        }

        return to_route('admin.data-master.period.index')->with(
            [
                'failed'   =>  'Periode baru gagal dibuka'
            ]
        );
    }

    public function show(Period $period)
    {
        $period->load('subjects');
        $allsubjects = Subject::whereDoesntHave('periods', function ($query) use ($period) {
            $query->where('period_id', $period->id);
        })->orderBy('name')->get();
        return view('admin.pages.datamaster.periods.show', compact('period', 'allsubjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        //
        $period->load('subjects');
        $subjects = Subject::all();
        return view('admin.pages.datamaster.periods.edit', compact('period', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodRequest  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        //
        $validated = $request->validated();
        $activePeriod = Period::where('is_active', true)->first();
        if ($activePeriod) {
            return to_route('admin.data-master.period.index')->with(
                [
                    'failed'   =>  'Masih ada periode yang belum ditutup, periode baru tidak dapat dibuka'
                ]
            );
        }
        $period = Period::create($validated);

        if ($period) {
            return to_route('admin.data-master.period.index')->with(
                [
                    'success'   =>  'Periode baru berhasil dibuka'
                ]
            );
        }

        return to_route('admin.data-master.period.index')->with(
            [
                'failed'   =>  'Periode baru gagal dibuka'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        //
        $period->deleteOrFail();
        return back()->with(
            [
                'deleted'   =>  'Periode berhasil di hapus',
            ]
        );
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

    public function updatePeriodStatus(Request $req, Period $period)
    {

        $validated = $req->validate([
            'is_active'                 =>  'boolean',
            'is_open_for_selection'     =>  'boolean',
            'is_file_selection_over'    =>  'boolean',
            'is_exam_selection_over'    =>  'boolean',
        ]);

        foreach ($validated as $key => $value) {
            $period->update(
                [
                    $key            =>  $value,
                    $key . '_date'    =>  today()
                ]
            );
        }
        if ($period->wasChanged()) {
            return redirect()->back()->with(
                [
                    'success'   =>  'Status periode berhasil dirubah',
                ]
            );
        }
        return redirect()->back()->with(
            [
                'failed'    =>  'Status periode gaga; dirubah',
            ]
        );
    }
}
