<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\PeriodSubject;
use App\Models\PeriodSubjectRegistrar;
use App\Models\Presence;
use App\Models\Qr;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->registrar;
        // dd($user);
        $user->load(['period_subjects']);
        // dd(Session::all());
        return Inertia::render('Dashboard', [
            'user'  =>  $user
        ])->with('alert', ['msg' => 'Welcome back,' . $user->name, 'status' => 'success']);
    }

    public function scheduleIndex()
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
                                'classrooms' => function ($query) {
                                    $query->with(
                                        [
                                            'schedule' => function ($query) {
                                                $query->with('room')->withCount('psrs');
                                            }
                                        ]
                                    );
                                },
                                'subject'
                            ]
                        );
                    },
                    'schedules' =>  function ($query) {
                        $query->with('classroom', 'room');
                    },
                ]
            )->get();
        $period_subjects = PeriodSubject::query()
            ->where('period_id', $period->id)
            ->whereRelation('registrars', 'registrars.id', $user->id)
            ->whereRelation('registrars', 'psr.is_pass_file_selection', true)
            ->whereRelation('registrars', 'psr.is_pass_exam_selection', true)
            ->whereRelation('registrars', 'psr.registrar_id', $user->id)
            ->with(
                [
                    'subject',
                    'classrooms.schedule',
                    'registrars'    =>  function ($query) use ($user) {
                        $query->where('registrars.id', $user->id);
                    }
                ]
            )
            ->get()
            // ->dd()
            //
        ;
        return Inertia::render('Schedule/Index', [
            'user'  =>  $user,
            'period_subjects'   =>  $period_subjects,
            'psrs'  =>  $psrs,
            'period'  =>  $period,
        ]);
    }

    public function scheduleStore(Request $request)
    {
        dd($request->all());
        $validated = $request->validate(
            [
                'schedule_id'   =>  'required',
                'psr_id'        =>  'required'
            ]
        );
        $schedule = Schedule::withCount('psrs')->find($validated['schedule_id']);
        if ($schedule->psrs_count >= $schedule->number_of_lab_assistant) {
            return back()
                ->with(
                    'alert',
                    [
                        'msg' => 'Jadwal sudah penuh, harap pilih jadwal lain, atau hubungi laboran untuk pengajuan jadwal',
                        'status' => 'failed'
                    ]
                );
        }
        $psr = PeriodSubjectRegistrar::find($validated['psr_id']);
        if ($schedule->psrs->contains($psr)) {
        }
        $schedule->psrs()->attach($validated['psr_id']);
        return to_route('user.schedule')
            ->with('alert', ['msg' => 'Welcome back, ', 'status' => 'success']);
    }
}
