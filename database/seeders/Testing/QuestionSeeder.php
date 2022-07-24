<?php

namespace Database\Seeders\Testing;

use App\Models\Choice;
use App\Models\Period;
use App\Models\Question;
use App\Models\PeriodSubject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $period = Period::firstWhere('is_active', true);
        $period_subjects = PeriodSubject::query()
            ->where('period_id', $period->id)
            ->get();
        foreach ($period_subjects as $period_subject) {
            $essayquestions = Question::factory()->count(3)->for($period_subject, 'period_subject')->create([
                'type'  =>  'essay'
            ]);
            $choicequestions = Question::factory()->count(3)->for($period_subject, 'period_subject')
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
