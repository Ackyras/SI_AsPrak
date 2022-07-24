<?php

namespace Database\Seeders\Testing;

use App\Models\Schedule;
use Illuminate\Database\Seeder;
use App\Models\PeriodSubjectRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LabAssistantSchedule extends Seeder
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
            ->with(
                [
                    'period_subject' => [
                        'classrooms' => [
                            'schedule'
                        ]
                    ]
                ]
            )
            ->get()
            //
        ;
        foreach ($psrs as $psr) {
            // $classrooms = $psr->period_subject->classrooms;
            $randomNumberOfSchedule = rand(1, $psr->period_subject->classrooms->count());
            $classrooms = $psr->period_subject->classrooms->random($randomNumberOfSchedule);
            foreach ($classrooms as $classroom) {
                $psr->schedules()->attach($classroom->schedule);
            }
        }
    }
}
