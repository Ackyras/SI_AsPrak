<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subjects = [
            [
                'name'  =>  'Algoritma Pemrograman 2',
            ],
            [
                'name'  =>  'Algoritma Pemrograman 1',
            ],
            [
                'name'  =>  'PKS 1',
            ],
            [
                'name'  =>  'PKS 2',
            ],
            [
                'name'  =>  'Algoritma dan Struktur Data',
            ],
            [
                'name'  =>  'Pemrograman Berbasis Objek',
            ],
            [
                'name'  =>  'Basis Data',
            ],
            [
                'name'  =>  'Manajemen Basis Data',
            ],
            [
                'name'  =>  'Dasar Rekayasa Perangkat Lunak',
            ],
            [
                'name'  =>  'Rekayasa Perangkat Lunak',
            ],
            [
                'name'  =>  'Manajemen Proyek Teknologi Informasi',
            ],
            [
                'name'  =>  'Proyek Teknologi Informasi',
            ],
            [
                'name'  =>  'Interaksi Manusia dan Komputer',
            ],
        ];
        foreach ($subjects as $key => $value) {
            Subject::create($value);
        }
    }
}
