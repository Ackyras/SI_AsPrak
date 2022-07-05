<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $buildings = [
            'Gedung A',
            'Gedung B',
            'Gedung C',
            'Gedung D',
            'Gedung E',
            'Gedung F',
            'GKU 1',
            'GKU 2',
            'GKU 3',
            'Labtek 1',
            'Labtek 2',
            'Labtek 3',
        ];
        foreach ($buildings as $building) {
            $rooms = Room::factory()->count(15)->create(
                [
                    'building'  =>  $building
                ]
            );
        }
    }
}
