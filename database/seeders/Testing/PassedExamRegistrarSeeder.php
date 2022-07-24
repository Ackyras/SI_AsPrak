<?php

namespace Database\Seeders\Testing;

use App\Models\Registrar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PassedExamRegistrarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $registrars = Registrar::query()
            ->whereRelation('period_subjects.period', 'is_active', true)
            ->whereRelation('period_subjects', 'psr.is_pass_file_selection', true)
            ->with(
                [
                    'period_subjects' => function ($query) {
                        $query->where('psr.is_pass_file_selection', true);
                    },
                    'user'
                ]
            )
            ->get();
        foreach ($registrars as $registrar) {
            foreach ($registrar->period_subjects as $period_subject) {
                $is_pass_exam_selection = rand(0, 1);
                if ($is_pass_exam_selection) {
                    $registrar->period_subjects()->updateExistingPivot(
                        $period_subject->id,
                        [
                            'is_pass_exam_selection'    => true,
                        ]
                    );
                }
            }
        }
        $passed_exam_selection_registrars = Registrar::query()
            ->whereRelation('period_subjects', 'psr.is_pass_exam_selection', true)
            ->get();
        foreach ($passed_exam_selection_registrars as $registrar) {
            $registrar->user()->update(
                [
                    'is_asprak' =>  true,
                ]
            );
        }
    }
}
