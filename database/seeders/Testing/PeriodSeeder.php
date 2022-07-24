<?php

namespace Database\Seeders\Testing;

use Carbon\Carbon;
use App\Models\Period;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $period = Period::create(
            [
                'name'                  =>  'Semester Genap TA 2022/2023',
                'honor'                 =>  18000,
                'registration_start'    =>  Carbon::now(),
                'registration_end'     =>   Carbon::now()->addDays(7),
                'is_active'             =>  true,
                'is_active_date'        =>  Carbon::now(),
                'is_open_for_selection'     =>  false,
                'is_open_for_selection_date'        =>  Carbon::now(),
                'is_file_selection_over'        =>  false,
                'is_file_selection_over_date'       =>  Carbon::now(),
                'is_exam_selection_over'        =>  false,
                'is_exam_selection_over_date'       =>  Carbon::now(),
                'selection_poster'  =>  'images/Poster.jpeg',
            ]
        );
    }
}
