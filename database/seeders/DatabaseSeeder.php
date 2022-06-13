<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'a@a',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@user',
            'is_admin' => 0
        ]);

        \App\Models\Period::create([ "name" => "Ganjil 2018/2019", ]);
        \App\Models\Period::create([ "name" => "Genap 2018/2019", ]);
        \App\Models\Period::create([ "name" => "Ganjil 2019/2020", ]);
        \App\Models\Period::create([ "name" => "Genap 2019/2020", ]);
        \App\Models\Period::create([ "name" => "Ganjil 2020/2021", ]);
        \App\Models\Period::create([ "name" => "Genap 2020/2021", ]);
    }
}
