<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Http\Requests\Period\StorePeriodRequest;
use App\Http\Requests\Period\UpdatePeriodRequest;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();
        return view('admin.DataMaster.Periods.index', compact('periods'));
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
            return to_route('admin.data.master.period.index')->with(
                [
                    'failed'   =>  'Masih ada periode yang belum ditutup, periode baru tidak dapat dibuka'
                ]
            );
        }
        $period = Period::create($validated);

        if ($period) {
            return to_route('admin.data.master.period.index')->with(
                [
                    'success'   =>  'Periode baru berhasil dibuka'
                ]
            );
        }

        return to_route('admin.data.master.period.index')->with(
            [
                'failed'   =>  'Periode baru gagal dibuka'
            ]
        );
    }
    
    public function show(Period $period)
    {
        return view('admin.DataMaster.Periods.show', compact('period'));
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
            return to_route('admin.data.master.period.index')->with(
                [
                    'failed'   =>  'Masih ada periode yang belum ditutup, periode baru tidak dapat dibuka'
                ]
            );
        }
        $period = Period::create($validated);

        if ($period) {
            return to_route('admin.data.master.period.index')->with(
                [
                    'success'   =>  'Periode baru berhasil dibuka'
                ]
            );
        }

        return to_route('admin.data.master.period.index')->with(
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
    }
}
