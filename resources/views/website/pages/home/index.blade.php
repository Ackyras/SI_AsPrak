{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SIAP Terpadu</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        [x-cloak] {
            display: none !important
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="relative" x-data="{ opensidebar : false, openBM : true, openCM : false }">
    <nav class="w-full fixed z-50 flex justify-between drop-shadow-md items-center bg-white p-2 lg:py-2 lg:px-3">
        <div class="flex items-center gap-4 ">
            <a href="{{ route('website.home') }}" class="flex gap-2 items-center group">
                <img src="{{ asset('images/letter-s.png') }}" alt="SIAP Terpadu Logo"
                    class="w-8 lg:w-10 h-auto border-4 border-gray-600 rounded-full group-hover:border-emerald-600"
                    style="opacity: .8">
                <span class="text-lg lg:text-2xl text-gray-600 group-hover:text-emerald-600 font-black">SIAP
                    Terpadu</span>
            </a>
            <div class="relative hidden lg:block" x-data="{ openPengumuman : false, openCD : true, openCU : false }">
                <a role="button" @click="
                        openPengumuman = ! openPengumuman,
                        openCD =! openCD,
                        openCU =! openCU
                    "
                    class="text-gray-600 text-lg uppercase tracking-wider font-thin hover:text-emerald-600 duration-[375ms] flex gap-1 items-center">
                    <span>Pengumuman</span>
                    <svg x-show="openCD" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    <svg x-cloak x-show="openCU" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <div x-cloak x-show="openPengumuman"
                    class="absolute top-full left-0 w-[200px] bg-white py-3 drop-shadow">
                    <a href=""
                        class="block font-semibold w-full uppercase py-1 px-2 text-gray-600 hover:text-white hover:bg-emerald-500 mb-3">Hasil
                        Seleksi Berkas</a>
                    <a href=""
                        class="block font-semibold w-full uppercase py-1 px-2 text-gray-600 hover:text-white hover:bg-emerald-500">Hasil
                        Seleksi Tes</a>
                </div>
            </div>
            <a href=""
                class="hidden lg:block text-gray-600 text-lg uppercase tracking-wider font-thin hover:text-emerald-600 duration-[375ms]">
                <span>Pendaftaran</span>
            </a>
        </div>
        @auth
        <a href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('user.dashboard') }}"
            class="hidden lg:flex items-center text-base font-bold border-2 hover:bg-emerald-600 border-emerald-600 hover:border-white text-emerald-600 hover:text-white rounded-md py-2 px-3 gap-2 ease-in-out duration-[375ms]">
            <span>Dashboard</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        @else
        <a href="{{ route('login') }}"
            class="hidden lg:flex items-center text-base font-bold border-2 hover:bg-emerald-600 border-emerald-600 hover:border-white text-emerald-600 hover:text-white rounded-md py-2 px-3 gap-2 ease-in-out duration-[375ms]">
            <span>Login</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
        </a>
        @endauth
        <div class="border lg:hidden" @click="
                opensidebar = ! opensidebar,
                openCM =! openCM,
                openBM =! openBM
            ">
            <svg x-show="openBM" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-cloak x-show="openCM" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </nav>
    <div x-cloak x-show="opensidebar" @click.outside="opensidebar = false"
        class="fixed z-50 top-12 right-0 border bg-white w-2/3 md:w-2/5 h-screen py-4 flex flex-col justify-between">
        <div x-data="{ openPengumuman : false, openCD : true, openCU : false }">
            <div class="px-4 mb-4">
                @auth
                <a href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('user.dashboard') }}"
                    class="flex items-center text-base font-bold border-2 hover:bg-emerald-600 border-emerald-600 hover:border-white text-emerald-600 hover:text-white rounded-md py-2 px-3 justify-between ease-in-out duration-[375ms]">
                    <span>Dashboard</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="flex items-center text-base font-bold border-2 hover:bg-emerald-600 border-emerald-600 hover:border-white text-emerald-600 hover:text-white rounded-md py-2 px-3 justify-between ease-in-out duration-[375ms]">
                    <span>Login</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </a>
                @endauth
            </div>
            <a role="button" @click="
                    openPengumuman = ! openPengumuman,
                    openCD =! openCD,
                    openCU =! openCU
                "
                class="text-gray-600 text-lg uppercase tracking-wider px-4 mb-2 font-thin hover:text-emerald-600 duration-[375ms] flex justify-between items-center">
                <span>Pengumuman</span>
                <svg x-show="openCD" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                <svg x-cloak x-show="openCU" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <div x-cloak x-show="openPengumuman" class="mt-2 py-1 bg-emerald-50 border-y border-emerald-500">
                <a href=""
                    class="block font-semibold w-full uppercase py-1 px-7 text-emerald-500 hover:text-white hover:bg-emerald-500 mb-2">Hasil
                    Seleksi Berkas</a>
                <a href=""
                    class="block font-semibold w-full uppercase py-1 px-7 text-emerald-500 hover:text-white hover:bg-emerald-500">Hasil
                    Seleksi Tes</a>
            </div>
            <a href=""
                class="block text-gray-600 text-lg uppercase tracking-wider px-4 mt-4 font-thin hover:text-emerald-600 duration-[375ms]">
                <span>Pendaftaran</span>
            </a>
        </div>
        <p>Copyright &copy; 2022 SIAP Terpadu</p>
    </div>

    <div class="absolute top-12 lg:top-14 w-full">
        <div class="grid bg-emerald-400 grid-cols-2 lg:grid-cols-5 p-2 gap-2 min-h-[600px]">
            <div class="hidden lg:block bg-white"></div>
            <div class="col-span-1 lg:col-span-3 bg-white p-2">
                <div class="mb-3">
                    <p class="text-2xl font-bold tracking-wide">Berita & Pengumuman</p>
                    @foreach ($pengumuman as $p)
                    <div class="p-2 bg-gray-100 rounded mb-3">
                        <p class="text-lg font-semibold tracking-wide mb-1">{{ $p->title }}</p>
                        <p class="text-sm font-light text-gray-600 mb-2">{{ $p->date }}</p>
                        <p>{{ $p->content }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="">
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
                </div>
            </div>
            <div class="bg-white"></div>
        </div>
    </div>
</body>

</html> --}}

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
