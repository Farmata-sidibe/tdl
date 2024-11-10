<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('icon-tdl.svg') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <title>{{ config('app.name', 'Tout doux liste') }}</title> --}}
    <title>{{ $title ?? 'Tout Doux Liste' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Créez et partagez votre liste de naissance avec simplicité ! Permettez à vos proches de contribuer directement via PayPal, sans complication. Découvrez une sélection de produits bébés et simplifiez la préparation de l’arrivée de votre enfant.' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- Scripts -->

    {{-- @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/script.js','resources/js/dashboard.js', 'resources/scss/navUser.scss', 'resources/scss/product.scss', 'resources/css/app.css']) --}}

    @vite('resources/scss/navUser.scss')
    @vite('resources/scss/product.scss')
    @vite('resources/scss/app.scss')
    @vite('resources/css/app.css')

</head>

<body class="font-comfortaa antialiased">
    @include('layouts.navigation')
    <div class="mt-[6%] min-h-screen">

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
            @yield('content')
        </main>
    </div>
    <x-footer/>
    {{ CookieConsent::getCookieConsentPopup() }}

        @vite('resources/js/app.js')
        @vite('resources/js/dashboard.js')
        @vite('resources/js/script.js')

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

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </body>
    </html>
