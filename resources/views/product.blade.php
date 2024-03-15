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
<body >
    <x-navbar/>
    <div class="header">
        <x-nav-user/>

        <div class="header_product bg-[#F6F3EC] px-[60px] py-[20px] w-[100%] flex flex-row justify-center items-center">

                <div class=" item_img flex flex-col items-end">
                    <img src="{{asset('img/omid-armin-UXnO_ZRgKXA-unsplash-removebg-preview.png')}}" alt="">
                    <img src="{{asset('img/train.png')}}" class="w-[7em]" alt="">
                </div>
                <div class=" item_text flex flex-col items-center">
                    <h1 class="text-[3em] font-bold">Les indispensables</h1>
                    <h2 class="text-[2em] text-[#FF91B2] font-bold ">Pour bébé</h2>
                    <p class="text-center">Découvrez notre petite sélections de produits et <br> accessoires de bébé pour vous aider à la préparation de votre liste de naissance</p>
                </div>
                <div class=" item_img flex flex-col">
                    <img src="{{asset('img/yoyo-diabolo.png')}}" class="w-[7em]" alt="">
                    <img src="{{asset('img/juan-encalada-_ENQdIjyPcA-unsplash-removebg-preview.png')}}" alt="">

                </div>


        </div>
    </div>

    <section class="p-[60px]">
        <h2>Nos Categories</h2>

        <div class="flex flex-row justify-between">
            <x-card-category url="{{asset('img/purnachandra-rao-podilapu-YwFS_ZpVZ2Q-unsplash.jpg')}}" category="Soin Toilette" />
            <x-card-category url="{{asset('img/yuri-tasso-RjCs9ywcnz8-unsplash.jpg')}}" category="Vêtement" />
            <x-card-category url="{{asset('img/omurden-cengiz--G2iJF_aUws-unsplash.jpg')}}" category="Chambre" />

        </div>
    </section>


    <x-footer/>
</body>
</html>
