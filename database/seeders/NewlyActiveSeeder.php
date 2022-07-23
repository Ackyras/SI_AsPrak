<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Choice;
use App\Models\Period;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Registrar;
use App\Models\PeriodSubject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewlyActiveSeeder extends Seeder
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
        $subjects = Subject::inRandomOrder()->limit(5)->get();
        foreach ($subjects as $key => $subject) {
            $period->subjects()->attach(
                $subject,
                [
                    'exam_start'                =>  Carbon::now()->addDays(5)->addHours($key),
                    'exam_end'                  =>  Carbon::now()->addDays(5)->addHours($key + 2),
                    'number_of_lab_assistant'   =>  rand(3, 6),
                ]
            );
        }
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
        $registrars = Registrar::factory()->count(20)->create();
        foreach ($registrars as $registrar) {
            $registrar->period_subjects()->attach($period_subject->random(3));
        }
        $period_subjects->load('registrars');
        foreach ($period_subjects as $period_subject) {
            foreach ($period_subject->registrars as $registrar) {
                $state = rand(0, 2);
                switch ($state) {
                    case 1:
                        # code...
                        $registrar->pivot->is_pass_file_selection = true;
                        $user = User::create(
                            [
                                'email'         =>  'siap' . $period->id . $registrar->nim . '@siap.terpadu',
                                'password'      =>  bcrypt('password'),
                            ]
                        );
                        break;
                    case 2:
                        # code...
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
    }
}
