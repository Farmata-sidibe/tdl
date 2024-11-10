@extends('layouts.app')
@section('content')

        <div class="py-12 sm:py-24 flex flex-row justify-center items-center">
            <div class=" item_img flex flex-col items-end">
                <img src="{{ asset('img/omid-armin-UXnO_ZRgKXA-unsplash-removebg-preview.png') }}" class="hidden lg:block" alt="">
                <img src="{{ asset('img/train.png') }}" class="w-[7em]" alt="">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mb-8 flex justify-center">
                    <p
                        class="relative rounded-full px-4 py-1.5 text-sm leading-6 text-gray-600 ring-1 ring-inset ring-gray-900/10 hover:ring-gray-900/20">
                        <span class="hidden md:inline">Préparez votre</span>
                        <a href="#product" target="_blank" class="font-semibold text-vertPoudre">
                            <span class="absolute inset-0" ></span>valise de maternité ici <span>→</span>
                        </a>
                    </p>
                </div>
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                        Les indispensables pour bébé
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Découvrez notre petite sélections de produits et accessoires de bébé pour
                    vous aider à la préparation de votre liste de naissance
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        @if (Auth::check())
                            @auth
                                <a href="/dashboard"
                                    class="rounded-md bg-rose px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-rose focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose">
                                    Visite
                                </a>
                            @endauth
                            @else
                                <a href="/register"
                                class="rounded-md bg-rose px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-rose focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose">
                                Créez ma liste
                                </a>
                        @endif
                        <a href="#product" class="text-sm font-semibold leading-6 text-gray-900">
                            les produits
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class=" item_img flex flex-col">
                <img src="{{ asset('img/yoyo-diabolo.png') }}" class="w-[7em]" alt="">
                <img src="{{ asset('img/juan-encalada-_ENQdIjyPcA-unsplash-removebg-preview.png') }}" class="hidden lg:block" alt="">

            </div>
        </div>



    <section class="">
        <h2 class="mb-[50px] text-center text-[2em] lg:text-[3em] mt-10 font-bold">Nos Categories</h2>
        <div class="bg-white">
            <div class="py-4 px-2 mx-auto max-w-screen-xl sm:py-4 lg:px-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 h-full">
                    <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-gray-50 h-auto md:h-full flex flex-col">
                        <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow">
                            <img src="{{ asset('img/pexels-nicolette-attree-8000848.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                            <h3 class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">Soins Toilette</h3>
                        </a>
                    </div>
                    <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-stone-50">
                        <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 mb-4">
                            <img src="{{ asset('img/yuri-tasso-RjCs9ywcnz8-unsplash.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                            <h3 class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">Vêtements</h3>
                        </a>
                        <div class="grid gap-4 grid-cols-2 sm:grid-cols-2 lg:grid-cols-2">
                            <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40">
                                <img src="{{ asset('img/pexels-polina-tankilevitch-3875085.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                                <h3 class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">Chambre</h3>
                            </a>
                            <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40">
                                <img src="{{ asset('img/pexels-cottonbro-studio-3661454.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                                <h3 class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">Eveils</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1 md:col-span-1 bg-sky-50 h-auto md:h-full flex flex-col">
                        <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow">
                            <img src="{{asset('img/family-autumn-park-man-black-jacket-cute-little-girl-with-parents.jpg')}}" alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                            <h3 class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">Balade</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section_product px-[60px] mt-10">
        <div class="btnCategory flex flex-row flex-wrap items-center justify-around">
            <button class="btn-link active text-[#505050] px-[17px] py-[9px]" id="mode">Mode</button>
            <button class="btn-link text-[#505050] px-[17px] py-[9px]" id="poussette">Poussette</button>
            <button class=" btn-link text-[#505050] px-[17px] py-[9px]" id="chambre">Chambre</button>
            <button class="btn-link text-[#505050] px-[17px] py-[9px]" id="allaitement">Allaitement</button>
            <button class="btn-link text-[#505050] px-[17px] py-[9px]" id="toilettes">Toilette</button>
            <button class=" btn-link text-[#505050] px-[17px] py-[9px]" id="eveil">Eveil</button>
            <button class="btn-link text-[#505050] px-[17px] py-[9px]" id="autres">Portage</button>
        </div>

        <div id="product" class="product_list w-[100%] py-[40px] flex flex-col items-center justify-center gap-[40px]">
            <div class="category mode bloc flex flex-row justify-center gap-[40px] flex-wrap ">
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
                                    {{-- <input type="hidden" name="size[]" value="{{ $size }}"> --}}
                                    <div class="mb-4">
                                        <span class="font-bold text-gray-700 light:text-gray-300">Select Size:</span>
                                        <div class="flex items-center mt-2">
                                            @foreach($mode['size'] as $size)
                                                <button class="bg-gray-300 light:bg-gray-700 text-gray-700 light:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 light:hover:bg-gray-600">{{ $size }}</button>
                                            @endforeach
                                        </div>
                                    </div>

                                @endif

                            </x-card-product>
                        @endif
                    @endforeach
                @endif

            </div>

            <div class="category poussette bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
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

            <div class="category chambre bloc hidden flex-row gap-[40px] justify-center flex-wrap ">
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

            <div class="category allaitement bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
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

            <div class="category toilettes bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
                @if (isset($message))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @elseif(isset($toilettes))
                    @foreach ($toilettes as $toilette)
                        @if (isset($toilette['img']))
                            <x-card-product
                                image="{{ $toilette['img'] ?? '' }}"
                                marque="{{ $toilette['brand'] ?? '' }}"
                                price="{{ $toilette['price'] ?? '' }}"
                                title="{{ $toilette['title'] ?? '' }}"
                                url="{{$toilette['link'] ?? '' }}"
                                titleProduct="{{ substr($toilette['title'] ?? '', 0, 20) }}{{ strlen($toilette['title'] ?? '') > 20 ? '...' : '' }}"
                                />
                        @endif
                    @endforeach
                @endif


            </div>

            <div class="category eveil bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
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

            <div class="category autres bloc hidden flex-row justify-center gap-[40px] flex-wrap ">
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
@endsection
