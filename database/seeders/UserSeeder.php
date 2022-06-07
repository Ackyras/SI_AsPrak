<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users=[
            [
                'name'      =>  'admin',
                'email'     =>  'a@a',
                'password'  =>  bcrypt(1)
            ]
        ];
        foreach ($users as $key => $value) {
            # code...
            User::create($value);
        }
    }
}
