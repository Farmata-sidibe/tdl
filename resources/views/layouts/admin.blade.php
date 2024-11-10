<!DOCTYPE html>
<html>
<head>
    <title>Admin - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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




</head>
<body>

    <header class="fixed inset-x-0 top-0 z-30 mx-auto w-full max-w-screen-md border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-3xl lg:max-w-screen-lg">
        <div class="px-4">
            <div x-data="{ open: false }" class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex shrink-0">
                    <a aria-current="page" class="flex items-center" href="/">
                        <x-application-logo class="h-7 w-auto" />
                        <p class="sr-only">Tableau de bord</p>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:justify-center md:gap-5">
                    <a aria-current="page"
                        class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                        href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                    <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                        href="{{ route('admin.users.index') }}">Gérer les utilisateurs</a>
                    <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                        href="{{ route('admin.listes.index') }}">Gérer les listes</a>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a class="items-center justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 transition-all duration-150 hover:bg-gray-50 sm:inline-flex"
                        href="/login">Statistique</a>
                    <a class="inline-flex items-center justify-center rounded-xl bg-[#FF91B2] px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-[#FF91B2] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#FF91B2]"
                        href="{{ route('logout') }}">Déconnexion</a>
                </div>

                <!-- Hamburger Icon for Mobile -->
                <button @click="open = !open" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:bg-gray-100 focus:outline-none">
                    <!-- Icone hamburger -->
                    <svg x-show="!open" x-cloak class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!-- Icone croix -->
                    <svg x-show="open" x-cloak class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Mobile Menu -->
                <div x-show="open" x-transition class="absolute inset-x-0 top-16 z-20 w-full bg-white shadow-md md:hidden">
                    <div class="flex flex-col items-center gap-4 py-4">
                        <a aria-current="page"
                            class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                            href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                        <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                            href="{{ route('admin.users.index') }}">Gérer les utilisateurs</a>
                        <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                            href="{{ route('admin.listes.index') }}">Gérer les listes</a>
                        <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                            href="#">Statistique</a>
                        <a class="inline-flex items-center justify-center rounded-xl bg-[#FF91B2] px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-[#FF91B2] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#FF91B2]"
                            href="{{ route('logout') }}">Déconnexion</a>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <main class="mt-40 flex flex-col items-center justify-center">
        @yield('content')
    </main>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
