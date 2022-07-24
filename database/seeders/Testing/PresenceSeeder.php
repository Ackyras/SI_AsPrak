<?php

namespace Database\Seeders\Testing;

use App\Models\PeriodSubjectRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $psrs = PeriodSubjectRegistrar::query()
        //     ->whereRelation('period_subject.period', 'is_active', true)
        //     ->whereRelation('user', 'is_asprak', true)
        //     ->where('is_pass_file_selection', true)
        //     ->where('is_pass_exam_selection', true)
    }
}
