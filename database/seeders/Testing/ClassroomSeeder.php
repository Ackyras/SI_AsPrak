<?php

namespace Database\Seeders\Testing;

use App\Models\Period;
use App\Models\Classroom;
use App\Models\PeriodSubject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        // $period = Period::firstWhere('is_active', true);
        $period_subjects = PeriodSubject::query()
            ->whereRelation('period', 'is_active', true)
            ->with('subject')
            ->get();
        $alphabet = range('A', 'Z');
        foreach ($period_subjects as $period_subject) {
            for ($i = 0; $i < rand(4, 6); $i++) {
                # code...
                $iteration = '';
                if (!str_contains($period_subject->subject->name, 'PKS')) {
                    $iteration = $alphabet[$i];
                } else {
                    $iteration = $i + 1;
                }
                $classrooms = Classroom::create(
                    [
                        'name'                  =>  $period_subject->class_name_prefix . ' ' . $iteration,
                        'period_subject_id'     =>  $period_subject->id
                    ]
                );
            };
        }
    }
}
