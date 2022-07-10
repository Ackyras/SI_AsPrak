<?php

namespace Database\Seeders;

use App\Models\Qr;
use App\Models\Period;
use Illuminate\Support\Str;
use App\Models\PeriodSubject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QrCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $period = Period::query()
            ->where('is_active', true)
            ->with(
                [
                    'subjects',
                ],
            )
            ->first()
            //
        ;
        foreach ($period->subjects as $subject) {
            $period_subject = PeriodSubject::query()
                ->where('id', $subject->pivot->id)
                ->with('classrooms.schedule')
                ->first()
                //
            ;
            foreach ($period_subject->classrooms as $classroom) {
                $token = '';
                do {
                    $token = Str::random(16);
                } while (Qr::where('token', $token)->first() instanceof Qr);
                $qr = Qr::create(
                    [
                        'token'         =>  $token,
                        'end_date'      =>  now()->addDay(),
                        'schedule_id'   =>  $classroom->schedule->id,
                    ]
                );
            }
        }
        // $qr = Qr::create()
        $period_subject = PeriodSubject::query()
            ->where('id', $period->subjects[0]->pivot->id)
            ->with('classrooms.schedule')
            ->first()
            //
        ;
        $token = 'tokentest';
        $qr = Qr::create(
            [
                'token'         =>  $token,
                'end_date'      =>  now()->addDay(),
                'schedule_id'   =>  $period_subject->classrooms[0]->schedule->id,
            ]
        );
    }
}
