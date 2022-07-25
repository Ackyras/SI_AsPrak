<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\PeriodSubjectRegistrar;

class SalaryController extends Controller
{
    //

    public function index()
    {
        $user = auth()->user()->registrar;
        $user->load(
            [
                'period_subjects'    =>  function ($query) {
                    $query->where('is_pass_exam_selection', true)
                        ->where('is_pass_file_selection', true)
                        ->with('subject');
                }
            ]
        );

        $period = Period::firstWhere('is_active', true);
        $psrs = PeriodSubjectRegistrar::query()
            ->where('registrar_id', $user->id)
            // ->whereRelation('period_subject', 'period_id', true)
            ->whereRelation('period_subject', 'period_id', $period->id)
            ->where('is_pass_exam_selection', true)
            ->where('is_pass_file_selection', true)
            ->with(
                [
                    'period_subject.subject',
                ]
            )->withCount(
                [
                    'presences' => function ($query) {
                        $query->where('presences.is_valid', true);
                    }
                ]
            )
            ->get()
            //
        ;
        // $period = Period::firstWhere('is_active', true);
        // dd($psrs);
        return Inertia::render('Salary/Index', [
            'user'          =>  $user,
            'period'        =>  $period,
            'psrs'          =>  $psrs
        ]);
    }
}
