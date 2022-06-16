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
        [x-cloak] { display: none !important }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="relative">
    <nav class="w-full fixed z-50 flex justify-between border items-center bg-white">
        <div class="px-3 py-2 flex items-center gap-2">
            <p class="text-3xl tracking-widest uppercase font-black">LOGO</p>
            <p class="text-sm bg-green-200 text-green-700 font-bold uppercase tracking-widest border">SISTEM INFORMASI <br> ASISTEN PRAKTIKUM</p>
        </div>
        <div class="bg-green-200 px-3 py-2 mr-2">
            @auth
                <a href={{ auth()->user()->is_admin ? route('admin.dashboard') : route('user.dashboard') }} class="text-sm text-gray-700 ">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700  ">Log in</a>
            @endauth
        </div>
    </nav>

    <div class= "absolute top-16 w-full">
        <nav class="bg-gray-200 p-2" >
            <a href="{{ route('home') }}" class="py-1 px-2 bg-green-300 text-green-800 uppercase rounded tracking-wide font-bold mr-2 hover:bg-green-500 hover:text-white duration-300">Home</a>
            <a href="" class="py-1 px-2 bg-green-300 text-green-800 uppercase rounded tracking-wide font-bold mr-2 hover:bg-green-500 hover:text-white duration-300">Pendaftaran Asisten Praktikum</a>
            <div class="relative inline-block" x-data="{ openPengumuman : false }">
                <a role="button" @click="openPengumuman = ! openPengumuman" class="py-1 px-2 bg-green-300 text-green-800 uppercase rounded tracking-wide font-bold mr-2 hover:bg-green-500 hover:text-white duration-300">Pengumuman</a>
                <div x-cloak x-show="openPengumuman" class="absolute top-full w-full bg-purple-400">
                    <a href="">Hasil Seleksi Berkas</a>
                    <a href="">Hasil Seleksi Tes</a>
                </div>
            </div>
            
        </nav>
        <div class="grid bg-green-400 grid-cols-2 lg:grid-cols-5 p-2 gap-2 min-h-[600px]">
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
                        <div class="hidden group-hover:flex absolute top-0 left-0 w-full h-full bg-[#00000060]  flex-col justify-center">
                            <button class="block w-40 py-2 px-3 rounded-md m-auto bg-green-600 hover:bg-green-500 text-center text-lg text-white font-semibold">Unduh Poster</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white"></div>
        </div>
    </div>
</body>
</html>
