<?php

namespace Database\Seeders;

use App\Models\Choice;
use App\Models\PeriodSubject;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $periodsubjects = PeriodSubject::all();
        foreach ($periodsubjects as $periodsubject) {
            $essayquestions = Question::factory()->count(3)->for($periodsubject, 'period_subject')->create([
                'type'  =>  'essay'
            ]);
            $choicequestions = Question::factory()->count(3)->for($periodsubject, 'period_subject')
                ->has(
                    Choice::factory()->count(4)
                        ->state(function (array $attributes) {
                            return [
                                'is_true'       =>  false
                            ];
                        })
                )->has(
                    Choice::factory()->count(1)
                        ->state(function (array $attributes) {
                            return [
                                'is_true'       =>  true
                            ];
                        })
                )
                ->create(
                    [
                        'type'  =>  'pilihan berganda'
                    ]
                );
        }
    }
}
