<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Period;
use App\Models\Registrar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;

class FileSelectionController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
        $this->period->load('subjects');
    }

    public function index()
    {
        $period_subject_registrars = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $this->period->id)
            ->with('registrar', 'period_subject.subject')
            ->get()
            //
        ;
        $subjects = $this->period->subjects;
        return view('admin.pages.active-period.file-selection.registrar-file', compact('period_subject_registrars', 'subjects'));
    }

    public function updateFileSelection(Request $req, PeriodSubjectRegistrar $psr)
    {
        $validated = $req->validate(
            [
                'is_pass_file_selection'    =>  'required'
            ]
        );
        $psr->updateOrFail($validated);

        if ($psr->wasChanged()) {
            if ($validated['is_pass_file_selection']) {
                $status = 'lulus';
            } else {
                $status = 'tidak lulus';
            }
            return back()->with(
                [
                    'success'   =>  'Status peserta berhasil diubah menjadi ' . $status . ' seleksi berkas',
                ]
            );
        }
        return back()->with(
            [
                'failed'   =>  'Gagal mengubah status peserta',
            ]
        );
    }

    public function passSelection()
    {
        $period_subject_registrars = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $this->period->id)
            ->where('is_pass_file_selection', true)
            ->with('registrar', 'period_subject.subject')
            ->get();
        $subjects = $this->period->subjects;
        $subjects->map(function ($subject) {
            $subject->pass_selection_count = PeriodSubjectRegistrar::query()
                ->where('period_subject_id', $subject->pivot->id)
                ->where('is_pass_file_selection', true)
                // ->get()
                ->count()
                //
            ;
        });
        // dd($subjects[1]);
        return view('admin.pages.active-period.file-selection.pass-selection-registrar', compact('period_subject_registrars', 'subjects'));
    }

    public function announceFileSelectionResult()
    {
        $registrars = Registrar::query()
            ->whereRelation('period_subjects', 'is_pass_file_selection', true)
            ->with(
                [
                    'period_subjects' => function ($query) {
                        $query->where('is_pass_file_selection', true);
                    }
                ]
            )->get();
        dd($registrars);
    }
}
