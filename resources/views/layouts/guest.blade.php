<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TDL') }}</title>
        <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('icon-tdl.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/scss/navUser.scss', 'resources/scss/product.scss'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

    </head>
    <body class="font-comfortaa text-gray-900 antialiased">
        @if (Route::has('login'))

            @auth
            <x-navbar/>
            @include('layouts.navigation')
            @else
            <x-navbar/>
            @endauth

        @endif
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[url({{asset('img/background.svg')}})] bg-no-repeat bg-fixed bg-cover">


            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-[0_15px_39px_-22px_rgba(0,0,0,0.3)] overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <x-footer/>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
</html>
