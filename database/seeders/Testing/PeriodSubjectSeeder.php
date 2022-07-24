<?php

namespace Database\Seeders\Testing;

use App\Models\Period;
use Carbon\Carbon;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeriodSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $period = Period::firstWhere('is_active', true);
        $subjects = Subject::inRandomOrder()->limit(5)->get();
        foreach ($subjects as $key => $subject) {
            $period->subjects()->attach(
                $subject,
                [
                    'exam_start'                =>  Carbon::now()->addDays(5)->addHours($key),
                    'exam_end'                  =>  Carbon::now()->addDays(5)->addHours($key + 2),
                    'number_of_lab_assistant'   =>  rand(3, 6),
                ]
            );
        }
    }
}
