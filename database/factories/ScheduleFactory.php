<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $days = [
            'Senin',
            'Seleasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'minggu',
        ];
        return [
            //
            'day'           =>  array_rand($days),
            'start_time'    =>  $this->faker->time('H:i'),
            'end_time'      =>  $this->faker->time('H:i'),
        ];
    }
}
