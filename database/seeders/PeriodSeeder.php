<?php

namespace Database\Seeders;

use App\Models\Period;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Period::factory()->count(5)->create([
            'is_active' =>  false
        ]);
        $period = Period::create(
            [
                'name'                  =>  'Semester Ganjil TA 2022/2023',
                'registration_start'    =>  Carbon::now(),
                'registration_end'     =>   Carbon::now()->addDays(7),
                'is_active'             =>  true,
            ]
        );
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