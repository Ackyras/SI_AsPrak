<?php

namespace Database\Factories;

use App\Models\Choice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //

        ];
    }

    public function essayAnswer($type, $question_id)
    {
        return $this->state(function (array $attributes) use ($type, $question_id) {
            if ($type == 'essay') {
                return [
                    'file'          => '/dummy/dummy.pdf',
                    'extension'     =>  'pdf'
                ];
            } else {
                $choice = Choice::find($question_id);
            }
        });
    }
}
