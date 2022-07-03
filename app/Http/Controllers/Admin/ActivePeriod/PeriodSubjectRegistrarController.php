<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Registrar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriodSubjectRegistrarController extends Controller
{
    public function index()
    {
        $registrars = Registrar::query()
            ->with('period_subjects.subject')
            ->when(
                request()->query('period'),
                function ($query) {
                    $query->where('period_id', request()->query('period'));
                }
            )
            ->get();
        
        return view('admin.pages.active-period.period-subject-registrar.index', compact('registrars'));
    }
}
