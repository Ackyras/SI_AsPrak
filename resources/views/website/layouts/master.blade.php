<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laboratorium Multimedia ITERA') }}</title>
    <!-- WEBSITE ICON -->
    <link rel="icon" type="image/png" href="{{ asset('images/ICON.png') }}" sizes="16x16">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important
        }
    </style>

    @yield('styles')
</head>

<body class="relative" x-data="{ opensidebar: false, openBM: true, openCM: false }">

    @include('website.layouts.navigation')

    <div class="absolute top-12 lg:top-14 w-full min-h-[calc(100vh-3rem)] lg:min-h-[calc(100vh-3.5rem)] relative p-[10px] lg:py-[16px]">
        <div class="fixed w-full h-screen bg-[url('/images/CPS.png')] bg-cover bg-center top-0 left-0"></div>
        @include('website.layouts.alert')
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>


    @yield('scripts')
</body>

</html>
