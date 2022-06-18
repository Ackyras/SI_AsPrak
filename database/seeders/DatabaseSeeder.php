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

        \App\Models\Period::create([ "name" => "Ganjil 2018/2019", "registration_start" => "2018-08-15 00:00:00", "registration_end" => "2018-08-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Genap 2018/2019", "registration_start" => "2019-02-15 00:00:00", "registration_end" => "2019-02-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Ganjil 2019/2020", "registration_start" => "2019-08-15 00:00:00", "registration_end" => "2019-08-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Genap 2019/2020", "registration_start" => "2020-02-15 00:00:00", "registration_end" => "2020-02-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Ganjil 2020/2021", "registration_start" => "2020-08-15 00:00:00", "registration_end" => "2020-08-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Genap 2020/2021", "registration_start" => "2021-02-15 00:00:00", "registration_end" => "2021-02-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Ganjil 2021/2022", "registration_start" => "2021-08-15 00:00:00", "registration_end" => "2021-08-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Genap 2021/2022", "registration_start" => "2022-02-15 00:00:00", "registration_end" => "2022-02-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Ganjil 2022/2023", "registration_start" => "2022-08-15 00:00:00", "registration_end" => "2022-08-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Genap 2022/2023", "registration_start" => "2023-02-15 00:00:00", "registration_end" => "2023-02-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Ganjil 2023/2024", "registration_start" => "2023-08-15 00:00:00", "registration_end" => "2023-08-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Genap 2023/2024", "registration_start" => "2024-02-15 00:00:00", "registration_end" => "2024-02-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Ganjil 2024/2025", "registration_start" => "2024-08-15 00:00:00", "registration_end" => "2024-08-22 00:00:00" ]);
        \App\Models\Period::create([ "name" => "Genap 2024/2025", "registration_start" => "2025-02-15 00:00:00", "registration_end" => "2025-02-22 00:00:00" ]);
    }
}
