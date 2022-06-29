<?php

namespace App\Http\Controllers\Admin\FileSelection;

use App\Models\Period;
use App\Models\Registrar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;

class RegistrarFileController extends Controller
{

    public $period;

    public function __construct()
    {
        $this->period = Period::where('is_active', true)->first();
    }

    public function index()
    {
        // $registrars = Registrar::with('period_subjects')->get();
        $period_subject_registrars = PeriodSubjectRegistrar::with('registrar', 'period_subject.subject')->get();
        $this->period->load('subjects');
        $subjects = $this->period->subjects;
        return view('admin.pages.fileselection.registrarfile.index', compact('period_subject_registrars', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  PeriodSubjectRegistrar $psr
     * @return \Illuminate\Http\Response
     */
    public function show(PeriodSubjectRegistrar $psr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  PeriodSubjectRegistrar $psr
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriodSubjectRegistrar $psr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  PeriodSubjectRegistrar $psr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeriodSubjectRegistrar $psr)
    {
        //
        $psr->updateOrFail([
            'is_pass_file_selection'    =>  !$psr->is_pass_file_selection
        ]);
        return back()->with(
            [
                'success'   =>  'Status kelulusan berhasil diubah'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  PeriodSubjectRegistrar $psr
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeriodSubjectRegistrar $psr)
    {
        //
    }
}
