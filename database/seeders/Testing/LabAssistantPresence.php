<?php

namespace Database\Seeders\Testing;

use Illuminate\Database\Seeder;
use App\Models\PeriodSubjectRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LabAssistantPresence extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject.period', 'is_active', true)
            ->whereRelation('registrar.user', 'is_asprak', true)
            ->where('is_pass_file_selection', true)
            ->where('is_pass_exam_selection', true)
            ->get()
            //
        ;
        $psrs->map(function ($psr) {
            $psr->load(
                [
                    'period_subject' => [
                        'classrooms' => function ($query) use ($psr) {
                            $query->whereRelation('schedule.psrs', 'psr.id', $psr->id)
                                ->with('schedule.qrs');
                        }
                    ]
                ]
            );
        });
        foreach ($psrs as $psr) {
            foreach ($psr->period_subject->classrooms as $classroom) {
                // foreach()
                foreach ($classroom->schedule->qrs as $qr) {
                    $state = rand(0, 1);
                    if ($state) {
                        $psr->presences()->attach(
                            $qr,
                            [
                                'is_valid'  => true
                            ]
                        );
                    }
                }
            }
        }
    }
}
