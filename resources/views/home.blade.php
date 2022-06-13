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
</head>
<body class="relative">
    <nav class="w-full fixed z-50 flex justify-between border items-center">
        <div class="px-3 py-2 flex items-center gap-2">
            <img src="{{ asset('images/download.jpg') }}" class="h-10 w-auto" alt="">
            <p class="text-sm bg-green-200 text-green-700 font-bold uppercase tracking-widest border">SISTEM INFORMASI <br> ASISTEN PRAKTIKUM</p>
        </div>
        <div class="bg-green-200 px-3 py-2">
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
        <nav class="bg-gray-200 p-2">
            <a href="" class="py-1 px-2 bg-green-300 text-green-800 uppercase rounded tracking-wide font-bold mr-2 hover:bg-green-500 hover:text-white duration-300">Home</a>
            <a href="" class="py-1 px-2 bg-green-300 text-green-800 uppercase rounded tracking-wide font-bold mr-2 hover:bg-green-500 hover:text-white duration-300">Pendaftaran Asisten Praktikum</a>
            <a href="" class="py-1 px-2 bg-green-300 text-green-800 uppercase rounded tracking-wide font-bold mr-2 hover:bg-green-500 hover:text-white duration-300">Pengumuman</a>
        </nav>
        <div class="min-h-[800px] bg-green-300">
            <h1>This is Landing Page</h1>
        </div>
    </div>
</body>
</html>
