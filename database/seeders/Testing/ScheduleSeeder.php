<?php

namespace Database\Seeders\Testing;

use App\Models\Room;
use App\Models\Schedule;
use App\Models\Classroom;
use App\Models\PeriodSubject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $period_subjects = PeriodSubject::query()
            ->whereRelation('period', 'is_active', true)
            ->with('classrooms')
            ->get();
        foreach ($period_subjects as $period_subject) {
            foreach ($period_subject->classrooms as $classroom) {
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
}
