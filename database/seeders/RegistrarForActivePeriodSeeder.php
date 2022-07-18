<?php

namespace Database\Seeders;

use App\Models\Period;
use App\Models\PeriodSubject;
use App\Models\Registrar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegistrarForActivePeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $period = Period::where('is_active', true)->first();
        $registrars = Registrar::factory()
            ->count(20)
            // ->hasAttached($period_subjects, [], 'period_subjects')
            ->create();
        foreach ($registrars as $registrar) {
            $period_subjects = PeriodSubject::query()
                ->where('period_id', $period->id)
                ->inRandomOrder()
                ->limit(3)
                ->get();
            foreach ($period_subjects as $period_subject) {
                $is_pass_file_selection = rand(0, 1);
                $registrar->period_subjects()->attach(
                    $period_subject,
                    [
                        'is_pass_file_selection'    =>  $is_pass_file_selection
                    ]
                );
            }
        }
    }
}
