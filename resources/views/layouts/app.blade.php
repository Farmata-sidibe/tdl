<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('icon-tdl.svg') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'TDL') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- Scripts -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/script.js', 'resources/scss/navUser.scss', 'resources/scss/product.scss'])

</head>

<body class="font-comfortaa antialiased">
    @if (Route::has('login'))

                @auth
                <x-navbar/>
                @include('layouts.navigation')
                @else
                <x-navbar/>
                @endauth

        @endif
    <div class="min-h-screen bg-[#F6F3EC]">

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white light:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        @if (session('success'))
            <div class="bg-vertPoudre rounded-lg text-black px-[10px] py-[5px] w-[600px]">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red rounded-lg text-black px-[10px] py-[5px] w-[600px]">{{ session('error') }}</div>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <x-footer/>
        @vite('resources/js/app.js')
        @vite('resources/js/dashboard.js')

        <script src="https://js.stripe.com/v3/"></script>
        <script>
            // copy link slug to liste

            function copyToClipboard() {
                var copyText = document.getElementById("liste-url");
                copyText.classList.remove('hidden');
                copyText.select();
                copyText.setSelectionRange(0, 99999); // Pour les mobiles

                document.execCommand("copy");
                copyText.classList.add('hidden');
                alert("Lien copié: " + copyText.value);
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>

    </html>
