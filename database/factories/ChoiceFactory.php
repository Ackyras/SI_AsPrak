<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Choice>
 */
class ChoiceFactory extends Factory
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
            'text'      =>  $this->faker->sentence(6, true),
            'option'    =>  $this->faker->word(),
            'image'     =>  'dummy/Poster.jpeg'
        ];
    }
}
