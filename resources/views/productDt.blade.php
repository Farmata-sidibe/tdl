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


    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/scss/product.scss'])
</head>

<body>

    <x-navbar />
    <x-nav-user />

    <div class="containeDtProduct flex flex-col p-[60px] gap-[30px]">
        <h2 class="title">Dors-bien jersey de coton cerises (lot de 3) rose naissance</h2>

        <div class="btnGroup flex flex-row flex-wrap gap-[20px]">
            <button class="ring-1 ring-[#FF91B2] text-[#FF91B2] px-[10px] py-[5px] rounded-[5px]">General info</button>
            <button class=" text-[#9A9CA5] px-[10px] py-[5px] rounded-[5px]">Description</button>
            <button class=" text-[#9A9CA5] px-[10px] py-[5px] rounded-[5px]">Composition</button>

        </div>
        <hr>

        <div class="productInfo flex flex-row flex-wrap justify-between">
            <div class="img flex flex-col gap-[20px]">
                <img src="{{ asset('img/0426123_800.jpg') }}" class="rounded-[10px] w-[400px] h-[500px] object-cover"
                    alt="image product">
                <div class="minImg flex flex-row gap-[20px]">
                    <img src="{{ asset('img/0426123_800.jpg') }}"
                        class="rounded-[7px] w-[90px] h-[90px] ring-1 ring-[#FF91B2] object-cover" alt="">
                </div>

            </div>

            <div class="infoText flex flex-col gap-[40px]">
                <h3 class="text-[#FF4242] text-[25px] font-[700]">19€40</h3>
                <div class="otherProduct flex flex-col gap-[10px]">
                    <p>Couleur: Rose</p>
                    <div class="minImg flex flex-row flex-wrap gap-[20px]">
                        <img src="{{ asset('img/0426123_800.jpg') }}"
                            class="rounded-[7px] w-[90px] h-[90px] ring-1 ring-[#FF91B2] object-cover" alt="">
                        <img src="{{ asset('img/0426125_800.jpg') }}"
                            class="rounded-[7px] w-[90px] h-[90px] object-cover" alt="">
                        <img src="{{ asset('img/0426124_800.jpg') }}"
                            class="rounded-[7px] w-[90px] h-[90px] object-cover " alt="">
                    </div>
                </div>

                <div class="size flex flex-col gap-[10px]">
                    <p>Size</p>
                    <select name="" id=""
                        class="rounded-[4px] h-[40px] ring-1 ring-[#D7DADD] text-[#9A9CA5]">
                        <option value="">taille naissance</option>
                    </select>
                </div>

                <div class="btnFinish flex flex-row flex-wrap gap-[20px]">
                    <button class="bg-[#FF91B2] text-[#FFF] px-[20px] py-[10px] rounded-[20px]">Ajouter à ma
                        liste</button>
                    <button
                        class="flex flex-row gap-[10px] bg-[#F6F3EC] text-[#FF91B2] px-[20px] py-[10px] rounded-[20px]">
                        @svg('shop', ['width' => '20px', 'height' => '20px', 'stroke' => '#FF91B2']) Acheter directement</button>
                    <button
                        class="flex flex-row gap-[10px] ring-1 ring-[#FF91B2] text-[#FF91B2] px-[20px] py-[10px] rounded-[20px]">@svg('fav', ['width' => '20px', 'height' => '20px', 'stroke' => '#FF91B2'])
                        Favori</button>
                </div>

            </div>
        </div>
    </div>



</body>

</html>
