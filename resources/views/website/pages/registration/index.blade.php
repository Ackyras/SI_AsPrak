@php
    $subjects = array(
        (object)[
            "id" => 1,
            "name" => "Algoritma Pemrograman 2",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 2,
            "name" => "Algoritma Pemrograman 1",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 3,
            "name" => "PKS 1",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 4,
            "name" => "PKS 2",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 5,
            "name" => "Algoritma dan Struktur Data",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 6,
            "name" => "Pemrograman Berbasis Objek",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 7,
            "name" => "Basis Data",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 8,
            "name" => "Manajemen Basis Data",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 9,
            "name" => "Dasar Rekayasa Perangkat Lunak",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 10,
            "name" => "Rekayasa Perangkat Lunak",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 11,
            "name" => "Manajemen Proyek Teknologi Informasi",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 12,
            "name" => "Proyek Teknologi Informasi",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
            "id" => 13,
            "name" => "Interaksi Manusia dan Komputer",
            "number_of_lab_assistant" => 4,
            "exam_start" => "2022/02/15 00:00:00",
            "exam_end" => "2022/02/22 23:59:00",
        ],
    );
@endphp
@extends('website.layouts.master')

@section('content')
    <div class="w-full lg:w-2/3 m-auto bg-white p-4">
        <div class="border mb-4">
            <p class="text-2xl lg:text-3xl text-center text-emerald-600 font-serif font-bold tracking-wider">Form Pendaftaran <br class="lg:hidden">Asisten Praktikum</p>
        </div>
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="border">
                <div class="border mb-4">
                    <label class="block w-full text-gray-700 text-xl font-semibold" for="name">Nama Lengkap</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                </div>
                <div class="border mb-4">
                    <label class="block w-full text-gray-700 text-xl font-semibold" for="nim">Nomor Induk Mahasiswa</label>
                    <input type="text" name="nim" id="nim" autocomplete="off" required>
                </div>
                <div class="border mb-4">
                    <label class="block w-full text-gray-700 text-xl font-semibold" for="email">Alamat Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="border mb-4">
                    <label class="block w-full text-gray-700 text-xl font-semibold" for="password">Kata Sandi</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="border mb-4">
                    <label class="block w-full text-gray-700 text-xl font-semibold" for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="border mb-4">
                    <p class="block w-full text-gray-700 text-xl font-semibold mb-2">Pilihan Mata Kuliah</p>

                    @foreach ($subjects as $subject)
                        <input type="checkbox" id="subject{{ $subject->id }}" name="subject{{ $subject->id }}" value="{{ $subject->id }}" class="subject-checkbox">
                        <label for="subject{{ $subject->id }}" class="text-lg">{{ $subject->name }}</label><br>
                    @endforeach
                </div>
                <div class="border mb-4">
                    <label class="block w-full text-gray-700 text-xl font-semibold" for="cv">Curriculum Vitae</label>
                    <input type="file" name="cv" id="cv">
                </div>
                <div class="border mb-4">
                    <label class="block w-full text-gray-700 text-xl font-semibold" for="khs">Kartu Hasil Studi</label>
                    <input type="file" name="khs" id="khs">
                </div>
                <div class="border mb-4">
                    <label class="block w-full text-gray-700 text-xl font-semibold" for="transkrip">Transkrip Nilai Terbaru</label>
                    <input type="file" name="transkrip" id="transkrip">
                </div>
            </div>
            <div class="border">
                <button type="submit" class="text-2xl py-2 block w-full text-center bg-emerald-500 text-white font-extrabold font-serif tracking-wider uppercase">Daftar</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var limit = 3;
            $('input.subject-checkbox').on('change', function(evt) {
                if($(this).siblings(':checked').length >= limit) {
                    this.checked = false;
                }
            });
        });
    </script>
@endsection