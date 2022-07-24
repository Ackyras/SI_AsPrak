<?php

namespace Database\Seeders\Testing;

use App\Models\Qr;
use App\Models\Schedule;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $schedules = Schedule::query()
            ->whereRelation('classroom.period_subject.period', 'is_active', true)
            ->get();
        foreach ($schedules as $schedule) {
            $token = '';
            do {
                $token = Str::random(16);
            } while (Qr::where('token', $token)->first() instanceof Qr);
            $qr = Qr::create(
                [
                    'token'         =>  $token,
                    'end_date'      =>  now()->addDay(),
                    'schedule_id'   =>  $schedule->id,
                ]
            );
        }
    }
}
