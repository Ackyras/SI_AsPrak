<?php

namespace Database\Seeders;

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
        $registrars = Registrar::factory()->count(50)->create();
        $user = User::where('email', 'user@user')->first();
        $registrars = Registrar::factory()->count(1)->for($user)->create();
    }
}
