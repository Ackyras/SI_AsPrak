<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laboratorium Multimedia ITERA') }}</title>
    <!-- WEBSITE ICON -->
    <link rel="icon" type="image/png" href="{{ asset('images/ICON.png') }}" sizes="16x16">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="relative">
        <div class="fixed w-full h-screen bg-[url('/images/LAB.png')] bg-cover bg-center top-0 left-0 z-[1]"></div>
        <div class="fixed w-full h-screen bg-white bg-opacity-75 top-0 left-0 z-[2]"></div>
        <div class="absolute top-0 left-0 z-[3] w-full h-screen flex flex-col items-center justify-center">
            <div class="w-11/12 md:w-2/3 xl:w-1/3 2xl:w-1/4 bg-black bg-opacity-75 drop-shadow rounded-md">
                <a class="text-lg lg:text-xl font-bold text-white hover:text-green-300 text-center block m-0 w-full pt-4" 
                    href="/">
                    {{ config('app.name', 'SIAP Terpadu') }}
                </a>
                @yield('content')
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" 
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" 
        crossorigin="anonymous">
    </script>
</body>
</html>
