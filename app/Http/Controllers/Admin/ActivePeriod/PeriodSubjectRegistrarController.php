<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Registrar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Period;

class PeriodSubjectRegistrarController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::where('is_active', true)->first();
    }

    public function index()
    {
        $period = $this->period;
        $registrars = Registrar::query()
            ->whereRelation('period_subjects', 'period_id', $period->id)
            ->get();
        // dd($period);
        $registrars->load('period_subjects.subject');
        return view('admin.pages.active-period.period-subject-registrar.index', compact('registrars'));
    }
}
