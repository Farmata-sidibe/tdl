<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TDL</title>
    <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('icon-tdl.svg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">


    <!-- Styles -->

    <!-- Script -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/scss/navUser.scss'])
</head>

<body class="bg-[#F6F3EC]">
    {{-- <x-navbar /> --}}

    <div class="header">
        <!-- if the is not login we don't show the user nav -->
        @if (Auth::check())
            <x-nav-user />
        @endif

    </div>

    <div class="p-[60px] flex flex-col gap-[40px] items-start">
        <x-primary-button>Voir ma liste</x-primary-button>

        <div class="flex flex-row flex-wrap gap-[20px]">
            <div class="w-[20vw] mb-[10px] px-[10px] py-[20px] bg-white shadow-sm dark:bg-gray-800 overflow-hidden  sm:rounded-lg">
                <h3 class="text-[25px] font-semibold flex flex-row items-center gap-[10px]">
                    @svg('params', ['width'=>'1.3em', 'height'=>'1.3em', 'fill'=>'#000'])
                    Paramêtre</h3>
                <div class="flex flex-col gap-[10px]">
                    <h4 class="btns active profile">Mon profil</h4>
                    <h4 class="btns description">Description de la liste</h4>
                    <h4 class="btns bancaire">Information bancaire</h4>
                    <h4 class="btns historique">Historique</h4>
                </div>
            </div>

            <div class="w-[70vw] bg-white shadow-sm dark:bg-gray-800 overflow-hidden  sm:rounded-lg">
                <h2>Paramêtre</h2>

            </div>
        </div>
    </div>
</body>

</html>
