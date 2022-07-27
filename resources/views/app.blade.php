<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laboratorium Multimedia ITERA') }}</title>
    <!-- WEBSITE ICON -->
    <link rel="icon" type="image/png" href="{{ asset('images/ICON.png') }}" sizes="16x16">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia

    @env ('local')
        {{-- <script src="http://localhost:8080/js/bundle.js"></script> --}}
    @endenv
    <script src="https://kit.fontawesome.com/6f7572d348.js" crossorigin="anonymous"></script>
</body>

</html>
