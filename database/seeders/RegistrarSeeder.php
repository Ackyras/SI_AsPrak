<?php

namespace Database\Seeders;

use App\Models\Period;
use App\Models\PeriodSubject;
use App\Models\Registrar;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $period = Period::where('is_active', true)->first();
        $period_subject = PeriodSubject::inRandomOrder()->where('period_id', $period->id)->limit(3)->get();
        $user = User::where('email', 'user@user')->first();
        $registrars = Registrar::factory()->count(1)->for($user)->hasAttached($period_subject, [], 'period_subjects')->create();
    }
}
