<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Period>
 */
class PeriodFactory extends Factory
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
            'name'                  =>  $this->faker->numerify('Semester TA 20##/20##'),
            'registration_start'    =>  Carbon::now(),
            'registration_end'      =>  Carbon::now()->addDays(7),
            'is_active'             =>  true,
        ];
    }
}
