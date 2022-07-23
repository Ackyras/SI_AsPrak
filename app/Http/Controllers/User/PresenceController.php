<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\PeriodSubjectRegistrar;

class PresenceController extends Controller
{
    //
    public function index()
    {
        $period = Period::firstWhere('is_active', true);
        $user = auth()->user()->registrar;
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $period->id)
            ->where('registrar_id', $user->id)
            ->where('is_pass_exam_selection', true)
            ->where('is_pass_file_selection', true)
            ->with(
                [
                    'period_subject'    =>  function ($query) use ($user, $period) {
                        $query->where('period_id', $period->id)->with(
                            [
                                'classrooms'    =>  function ($query) use ($user) {
                                    $query->whereRelation('schedule.psrs', 'psr.id', $user->id);
                                },
                                'subject'
                            ]
                        );
                    },
                    'presences'
                ]
            )->withCount(
                [
                    'presences',
                ]
            )
            ->get()
            //
        ;
        return Inertia::render('Presence/Index', [
            'user'  =>  $user,
            'psrs'  =>  $psrs,
        ]);
    }
}
