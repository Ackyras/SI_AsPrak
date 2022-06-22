<?php

namespace Database\Seeders;

use App\Models\PeriodSubject;
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

        $this->call([
            SubjectSeeder::class,
            PeriodSeeder::class,
            PeriodSubjectSeeder::class,
        ]);
    }
}
