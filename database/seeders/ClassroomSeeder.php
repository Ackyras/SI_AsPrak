<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\PeriodSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $period_subjects = PeriodSubject::all();
        foreach ($period_subjects as $period_subject) {
            $classrooms = Classroom::factory()->count(4)->for($period_subject)->create();
        }
    }
}
