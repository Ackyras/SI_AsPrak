<?php

namespace Database\Seeders;

use App\Models\Period;
use App\Models\PeriodSubject;
use App\Models\Registrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSubjectRegistrarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $periods = Period::all();
        foreach ($periods as $period) {
            $period_subjects = PeriodSubject::where('period_id', $period->id)->get();
            $registrars = Registrar::factory()->count(20)->create();
            foreach ($registrars as $registrar) {
                $registrar->period_subjects()->attach($period_subjects->random(3));
            }
            $registrars = Registrar::factory()->count(15)->create();
            foreach ($registrars as $registrar) {
                $registrar->period_subjects()->attach(
                    $period_subjects->random(2),
                    [
                        'is_pass_file_selection'        =>  true,
                    ]
                );
            }
            $registrars = Registrar::factory()->count(10)->create();
            foreach ($registrars as $registrar) {
                $registrar->period_subjects()->attach(
                    $period_subjects->random(2),
                    [
                        'is_pass_exam_selection'        =>  true,
                    ]
                );
            }
        }
    }
}
