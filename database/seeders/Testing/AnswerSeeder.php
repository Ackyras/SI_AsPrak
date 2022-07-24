<?php

namespace Database\Seeders\Testing;

use App\Models\Answer;
use App\Models\User;
use App\Models\Period;
use App\Models\PeriodSubject;
use App\Models\PeriodSubjectRegistrar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnswerSeeder extends Seeder
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
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject.period', 'is_active', true)
            ->where('is_pass_file_selection', true)
            ->with(
                [
                    'period_subject' => [
                        'questions.choices'
                    ]
                ]
            )
            ->get()
            // ->with
            //
        ;
        foreach ($psrs as $psr) {
            foreach ($psr->period_subject->questions as $question) {
                if ($question->type == 'essay') {
                    $answer = Answer::create(
                        [
                            'period_subject_registrar_id'   =>  $psr->id,
                            'question_id'                   =>  $question->id,
                            'extension'                     =>  'pdf',
                            'file'                          =>  'dummy/dummy.pdf',
                            'score'                         =>  $question->score - rand(0, 10),
                        ]
                    );
                } else {
                    $random = rand(0, 4);
                    $choice = $question->choices[$random];
                    $score = 0;
                    if ($choice->is_true) {
                        $score = $question->score;
                    }
                    $answer = Answer::create(
                        [
                            'period_subject_registrar_id'   =>  $psr->id,
                            'question_id'                   =>  $question->id,
                            'choice_id'                     =>  $choice->id,
                            'score'                         =>  $score,
                        ]
                    );
                }
            }
        }
    }
}
