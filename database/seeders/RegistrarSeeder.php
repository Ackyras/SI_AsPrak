<?php

namespace Database\Seeders;

use App\Models\Registrar;
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
    }
}
