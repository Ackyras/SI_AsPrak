<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registrar>
 */
class RegistrarFactory extends Factory
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
            'name'          =>  $this->faker->name(),
            'email'         =>  $this->faker->email(),
            'nim'           =>  $this->faker->randomNumber(9, true),
            'cv'            =>  'dummy/CV.pdf',
            'khs'           =>  'dummy/KHS.pdf',
            'transkrip'     =>  'dummy/dummy.pdf',
        ];
    }
}
