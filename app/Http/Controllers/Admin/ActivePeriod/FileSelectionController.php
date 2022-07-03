<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Period;
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
        $period_subject_registrars = PeriodSubjectRegistrar::with('registrar', 'period_subject.subject')->get();
        $subjects = $this->period->subjects;
        return view('admin.pages.active-period.file-selection.registrar-file', compact('period_subject_registrars', 'subjects'));
    }

    public function passSelection()
    {
        $period_subject_registrars = PeriodSubjectRegistrar::query()
            ->where('is_pass_file_selection', true)
            ->with('registrar', 'period_subject.subject')
            ->get();
        $subjects = $this->period->subjects;
        return view('admin.pages.active-period.file-selection.pass-selection-registrar', compact('period_subject_registrars', 'subjects'));
    }
}
