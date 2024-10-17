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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />

    <!-- Styles -->

    <!-- Script -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/script.js', 'resources/js/loadMoreProducts.js', 'resources/scss/navUser.scss'])
</head>

<body>


    <div class="header">
        @auth
        @include('layouts.navigation')
        @else
        <x-navbar />
        @endauth

        <div class=" header_product bg-[#F6F3EC] px-[60px] py-[20px] w-[100%] flex flex-row justify-center items-center">

            <div class=" item_img flex flex-col items-end">
                <img src="{{ asset('img/omid-armin-UXnO_ZRgKXA-unsplash-removebg-preview.png') }}" alt="">
                <img src="{{ asset('img/train.png') }}" class="w-[7em]" alt="">
            </div>
            <div class=" item_text flex flex-col items-center">
                <h1 class="text-[3em] font-bold">Les indispensables</h1>
                <h2 class="text-[2em] text-[#FF91B2] font-bold ">Pour bébé</h2>
                <p class="text-center">Découvrez notre petite sélections de produits et <br> accessoires de bébé pour
                    vous aider à la préparation de votre liste de naissance</p>
            </div>
            <div class=" item_img flex flex-col">
                <img src="{{ asset('img/yoyo-diabolo.png') }}" class="w-[7em]" alt="">
                <img src="{{ asset('img/juan-encalada-_ENQdIjyPcA-unsplash-removebg-preview.png') }}" alt="">

            </div>


        </div>
    </div>



    <section class="px-[60px] h-[100vh]">
        <h2 class="mb-[50px]">Nos Categories</h2>

        <div class="flex flex-row justify-between">
            <x-card-category url="{{ asset('img/pexels-nicolette-attree-8000848.jpg') }}" category="Soin Toilette" />
            <x-card-category url="{{ asset('img/yuri-tasso-RjCs9ywcnz8-unsplash.jpg') }}" category="Vêtement" />
            <x-card-category url="{{ asset('img/pexels-polina-tankilevitch-3875085.jpg') }}" category="Chambre" />
            <x-card-category url="{{ asset('img/pexels-cottonbro-studio-3661454.jpg') }}" category="Eveil et Balade" />
        </div>
    </section>

    <section
        class="px-[60px] bg-[url({{ asset('img/pexels-singkham-1174589.jpg') }})] h-[80vh] bg-fixed bg-cover flex flex-row items-center justify-center">
        <div class="bg-[#ffffff] px-[100px] py-[80px] rounded-[15px] flex flex-col items-center gap-[20px]">
            <h2>Vous avez un lien ?</h2>
            <p>Vous pouvez ajouter le lien de l’article que vous <br> voulez ajouter dans la liste de vos envies.</p>
            <button
                class="bg-[#9CC4B9] text-[#ffffff] rounded-[20px] px-[20px] py-[7px] flex flex-row items-center gap-[10px] font-[700]">
                @svg('addLink', ['width' => 20, 'height' => 20, 'fill' => '#ffffff'])
                Ajoutez un lien
            </button>
        </div>
    </section>

    <section class="section_product px-[60px]">
        <h2>Les indispensables pour bébé</h2>
        <div class="btnCategory flex flex-row items-center justify-between">
            <button class="btn-link active text-[#505050] px-[17px] py-[9px]" id="mode">Mode</button>
            <button class="btn-link text-[#505050] px-[17px] py-[9px]" id="poussette">Poussette</button>
            <button class=" btn-link text-[#505050] px-[17px] py-[9px]" id="chambre">Chambre</button>
            <button class="btn-link text-[#505050] px-[17px] py-[9px]" id="allaitement">Allaitement</button>
            <button class=" btn-link text-[#505050] px-[17px] py-[9px]" id="eveil">Eveil</button>
            <button class="btn-link text-[#505050] px-[17px] py-[9px]" id="autres">Autres</button>
        </div>

        <div class="product_list w-[100%] py-[60px]  flex flex-col items-center justify-center gap-[50px]">
            <div class="mode bloc flex flex-row justify-center gap-[40px] flex-wrap ">
                @if (isset($message))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @elseif(isset($modes))
                    @foreach ($modes as $mode)
                        @if (isset($mode['img']))
                            <x-card-product
                                {{-- titleProduct="{{ $mode['title'] ?? ''}}" --}}
                                image="{{ $mode['img'] ?? '' }}"
                                marque="{{ $mode['brand'] ?? '' }}"
                                price="{{ $mode['price'] ?? '' }}"
                                title="{{ $mode['title'] ?? '' }}"
                                url="{{$mode['link'] ?? '' }}"
                                titleProduct="{{ substr($mode['title'] ?? '', 0, 20) }}{{ strlen($mode['title'] ?? '') > 20 ? '...' : '' }}"
                                >
                                @if(isset($mode['size']))
                                    @foreach($mode['size'] as $size)
                                        <input type="hidden" name="size[]" value="{{ $size }}">
                                    @endforeach
                                @endif

                            </x-card-product>
                        @endif
                    @endforeach
                @endif

                <!-- Pagination -->
                {{-- @if (isset($totalPagesMode) && $totalPagesMode > 1)
                <nav>
                    <ul class="pagination flex justify-center mt-6">
                        @for ($i = 1; $i <= $totalPagesMode; $i++)
                            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                <a class="page-link border px-4 py-2 {{ $i == $currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }}"
                                   href="{{ request()->fullUrlWithQuery(['page' => $i]) }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endfor
                    </ul>
                </nav> --}}
                @endif

            </div>

            <div class="poussette bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
                @if (isset($message))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @elseif(isset($poussettes))
                    @foreach ($poussettes as $poussette)
                        @if (isset($poussette['img']))
                            <x-card-product
                                url="{{ $poussette['link'] ?? '' }}"
                                image="{{ $poussette['img'] ?? '' }}"
                                marque="{{ $poussette['brand'] ?? '' }}"
                                price="{{ $poussette['price'] ?? '' }}"
                                title="{{ $poussette['title'] ?? '' }}"
                                titleProduct="{{ substr($poussette['title'] ?? '', 0, 20) }}{{ strlen($poussette['title'] ?? '') > 20 ? '...' : '' }}" />
                        @endif
                    @endforeach
                @endif

            </div>

            <div class="chambre bloc hidden flex-row gap-[40px] justify-center flex-wrap ">
                @if (isset($message))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @elseif(isset($rooms))
                    @foreach ($rooms as $room)
                        @if (isset($room['img']))
                            <x-card-product
                                url="{{ $room['link'] ?? '' }}"
                                image="{{ $room['img'] ?? '' }}"
                                marque="{{ $room['brand'] ?? '' }}"
                                price="{{ $room['price'] ?? '' }}"
                                title="{{ $room['title'] ?? '' }}"
                                titleProduct="{{ substr($room['title'] ?? '', 0, 20) }}{{ strlen($room['title'] ?? '') > 20 ? '...' : '' }}" />
                        @endif
                    @endforeach
                @endif

            </div>

            <div class="allaitement bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
                @if (isset($message))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @elseif(isset($allaitements))
                    @foreach ($allaitements as $allaitement)
                        @if (isset($allaitement['img']))
                            <x-card-product
                                url="{{ $allaitement['link'] ?? '' }}"
                                image="{{ $allaitement['img'] ?? '' }}"
                                marque="{{ $allaitement['brand'] ?? '' }}"
                                price="{{ $allaitement['price'] ?? '' }}"
                                title="{{ $allaitement['title'] ?? '' }}"
                                titleProduct="{{ substr($allaitement['title'] ?? '', 0, 20) }}{{ strlen($allaitement['title'] ?? '') > 20 ? '...' : '' }}" />
                        @endif
                    @endforeach
                @endif

            </div>

            <div class="eveil bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
                @if (isset($message))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @elseif(isset($eveils))
                    @foreach ($eveils as $eveil)
                        @if (isset($eveil['img']))
                            <x-card-product
                                url="{{ $eveil['link'] ?? '' }}"
                                image="{{ $eveil['img'] ?? '' }}"
                                marque="{{ $eveil['brand'] ?? '' }}"
                                price="{{ $eveil['price'] ?? '' }}"
                                title="{{ $eveil['title'] ?? '' }}"
                                titleProduct="{{ substr($eveil['title'] ?? '', 0, 20) }}{{ strlen($eveil['title'] ?? '') > 20 ? '...' : '' }}"
                                 />

                        @endif
                    @endforeach
                @endif

            </div>

            <div class="autres bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
                @if (isset($message))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @elseif(isset($others))
                    @foreach ($others as $other)
                        @if (isset($other['img']))
                            <x-card-product
                                image="{{ $other['img'] ?? '' }}"
                                marque="{{ $other['brand'] ?? '' }}"
                                price="{{ $other['price'] ?? '' }}"
                                title="{{ $other['title'] ?? '' }}"
                                url="{{$other['link'] ?? '' }}"
                                titleProduct="{{ substr($other['title'] ?? '', 0, 20) }}{{ strlen($other['title'] ?? '') > 20 ? '...' : '' }}"
                                />
                        @endif
                    @endforeach
                @endif


            </div>

        </div>
    </section>
    <x-footer />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></scrip>
</body>

</html>
