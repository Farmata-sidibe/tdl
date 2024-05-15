<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('icon-tdl.svg') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{ config('app.name', 'TDL') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

    <!-- Scripts -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/scss/navUser.scss', 'resources/scss/product.scss'])

</head>

<body class="font-comfortaa antialiased">
    <div class="min-h-screen bg-[#F6F3EC] ">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>



    @vite('resources/js/app.js')
</body>

</html>
