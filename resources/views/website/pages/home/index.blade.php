<?php
    $pengumuman = array(
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022",
        ],
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022"
        ],
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022"
        ],
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022"
        ],
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022"
        ],
    );
?>

@extends('website.layouts.master')

@section('content')
<div class="grid bg-emerald-400 grid-cols-2 lg:grid-cols-5 p-2 gap-2 min-h-[600px]">
    <div class="hidden lg:block bg-white"></div>
    <div class="col-span-1 lg:col-span-3 bg-white p-2">
        <div class="mb-3">
            <p class="text-3xl font-bold tracking-wide">Berita & Pengumuman</p>
            @forelse ($periods as $period)
            <hr>
            <p class="text-2xl font-bold tracking-wide">{{ $period->name }}</p>
            @if ($period->is_exam_selection_over)
            <div class="p-2 bg-gray-100 rounded mb-3">
                <p class="text-lg font-semibold tracking-wide mb-1">Daftar Mahasiswa Lulus Menjadi Asisten Praktikum {{
                    $period->name }}
                </p>
                <p class="text-sm font-light text-gray-600 mb-2">{{ $period->is_exam_selection_over_date }}</p>
                <p>
                    Selamat kepada mahasiswa yang dinyatakan lulus sebagai asisten praktikum...
                </p>
                <hr>
                <div class="d-flex">
                    <a class="float-end" href="{{ route('website.news.exam_selection_over',$period) }}">Lihat lebih
                        lanjut
                        <sub>>></sub></a>
                </div>
            </div>
            @endif
            @if ($period->is_file_selection_over)
            <div class="p-2 bg-gray-100 rounded mb-3">
                <p class="text-lg font-semibold tracking-wide mb-1">Hasil Seleksi Berkas Asisten Praktikum {{
                    $period->name }}
                </p>
                <p class="text-sm font-light text-gray-600 mb-2">{{ $period->is_file_selection_over_date }}</p>
                <p>
                    Selamat kepada mahasiswa yang dinyatakan lulus seleksi berkas! Silakan...
                </p>
                <hr>
                <div class="d-flex">
                    <a class="float-end" href="{{ route('website.news.file_selection_over',$period) }}">Lihat lebih
                        lanjut
                        <sub>>></sub></a>
                </div>
            </div>
            @endif
            @if ($period->is_open_for_selection)
            <div class="p-2 bg-gray-100 rounded mb-3">
                <p class="text-lg font-semibold tracking-wide mb-1">Pembukaan Seleksi Asisten Praktikum {{
                    $period->name }} Telah Hadir
                </p>
                <p class="text-sm font-light text-gray-600 mb-2">{{ $period->is_open_for_selection_date }}</p>
                <p>
                    Seleksi asisten praktikum {{ $period->name }} telah dimulai...
                </p>
                <hr>
                <div class="d-flex">
                    <a class="float-end" href="{{ route('website.news.open_for_selection', $period) }}">Lihat lebih
                        lanjut
                        <sub>>></sub></a>
                </div>
            </div>
            @endif
            @empty
            @endforelse
        </div>
        {{-- <div class="">
            <p class="text-2xl font-bold tracking-wide">Informasi Penerimaan Asisten Praktikum</p>
            <div class="bg-gray-500 p-2 relative duration-500 group">
                <img class="w-full h-auto" src="{{ asset('images/Poster.jpeg') }}" alt="">
                <div
                    class="hidden group-hover:flex absolute top-0 left-0 w-full h-full bg-[#00000060]  flex-col justify-center">
                    <button
                        class="block w-40 py-2 px-3 rounded-md m-auto bg-emerald-600 hover:bg-emerald-500 text-center text-lg text-white font-semibold">Unduh
                        Poster</button>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="bg-white"></div>
</div>
@endsection
