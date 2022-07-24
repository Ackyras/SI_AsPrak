<?php

namespace Database\Seeders;

use App\Models\Period;
use Database\Seeders\Testing\AnswerSeeder;
use Database\Seeders\Testing\ClassroomSeeder;
use Database\Seeders\Testing\LabAssistantSchedule;
use Database\Seeders\Testing\PassedExamRegistrarSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Testing\PeriodSeeder;
use Database\Seeders\Testing\QuestionSeeder;
use Database\Seeders\Testing\PeriodSubjectSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Testing\PeriodSubjectRegistrarSeeder;
use Database\Seeders\Testing\QrSeeder;
use Database\Seeders\Testing\ScheduleSeeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $periods = Period::query()->update(
            [
                'is_active' =>  false,
            ]
        );
        $this->call(
            [
                PeriodSeeder::class,
                PeriodSubjectSeeder::class,
                ClassroomSeeder::class,
                QuestionSeeder::class,
                PeriodSubjectRegistrarSeeder::class,
                AnswerSeeder::class,
                ScheduleSeeder::class,
                QrSeeder::class,
                PassedExamRegistrarSeeder::class,
                LabAssistantSchedule::class,
            ]
        );
    }
}
