<?php

namespace Database\Seeders;

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
        $registrars = Registrar::all();
        foreach ($registrars as $registrar) {
            $periodsubjects = PeriodSubject::inRandomOrder()->limit(3)->get();
            $registrar->period_subjects()->attach($periodsubjects);
        }
    }
}
