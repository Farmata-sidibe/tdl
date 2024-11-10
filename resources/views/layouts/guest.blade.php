<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('icon-tdl.svg') }}">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <title>{{ config('app.name', 'TDL') }}</title> --}}
        <title>{{ $title ?? 'Rejoignez-nous !' }}</title>

        <meta name="description" content="{{ $metaDescription ?? 'Simplifiez la création de votre liste de naissance : réservez des produits, collectez des contributions et partagez facilement avec vos proches pour préparer
        la venue de bébé.' }}">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <!-- Scripts -->
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('path/to/flowbite/dist/datepicker.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
        @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/script.js', 'resources/scss/navUser.scss', 'resources/scss/product.scss'])

    </head>
    <body class="font-comfortaa text-gray-900 antialiased">


                    @include('layouts.navigation')

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[url({{asset('img/background.svg')}})] bg-no-repeat bg-fixed bg-cover">
            <!-- Conteneur du formulaire et du bouquet -->
            <div class="relative w-full sm:max-w-md mt-10 px-10 pt-[3em] pb-[6em] bg-white shadow-[0_15px_39px_-22px_rgba(0,0,0,0.3)] overflow-hidden sm:rounded-lg">
                <!-- Le formulaire de connexion -->
                {{ $slot }}

                <!-- L'image du bouquet attachée au coin bas-droit du formulaire -->
                <div class="absolute bottom-0 right-[-36px]">
                    <img src="{{ asset('img/Bouquet.png') }}" class="w-[150px] sm:w-[200px] md:w-[250px] lg:w-[300px]" alt="bouquet fleur 3d">
                </div>
            </div>
        </div>

        <x-footer/>
        {{ CookieConsent::getCookieConsentPopup() }}

        @vite('resources/js/app.js')
        @vite('resources/js/dashboard.js')

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
