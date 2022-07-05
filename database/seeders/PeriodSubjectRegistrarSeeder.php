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
            $registrars = Registrar::factory()->count(50)->create();
            foreach ($registrars as $registrar) {
                $registrar->period_subjects()->attach($period_subjects->random(3));
            }
        }
    }
}
