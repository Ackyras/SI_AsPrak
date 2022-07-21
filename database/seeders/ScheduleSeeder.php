<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\PeriodSubject;
use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $classrooms = Classroom::all();
        foreach ($classrooms as $classroom) {
            $room = Room::inRandomOrder()->first();
            $schedule = Schedule::factory()->create(
                [
                    'classroom_id'              =>  $classroom->id,
                    'room_id'                   =>  $room->id,
                    'number_of_lab_assistant'   =>  1,
                ]
            );
        };
    }
}
