<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 light:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 flex flex-row flex-wrap justify-between">

            {{-- barre right --}}
            <div class="w-[68vw] flex flex-col gap-[20px] px-[5px] py-[5px]  bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class=" bg-[url({{ asset('img/fe-ngo-bvx3G7RkOts-unsplash.jpg') }})] h-[350px] bg-fixed bg-contain sm:rounded-lg flex items-end px-[25px] py-[15px]">
                    {{-- <img src="{{asset('img/fe-ngo-bvx3G7RkOts-unsplash.jpg')}}" class="sm:rounded-lg w-[100%] h-[350px] object-cover" alt=""> --}}
                    <h3 class="text-[#fff] text-[20px] font-medium">
                        {{$user->name}} &
                        {{-- @foreach($liste as $item)
                            {{ $item->patner }}
                        @endforeach --}}
                        {{ $liste->patner }}
                    </h3>
                </div>
                <div class=" bg-[#9cc4b985] ring-1 ring-[#649D8C] h-auto sm:rounded-lg px-[20px] py-[10px]">

                    <p class="text-[#505050] text-[16px] font-medium py-[5px]">
                        {{-- @foreach($liste as $item)
                            {{ $item->description }}
                        @endforeach --}}
                        {{ $liste->description }}
                    </p>
                </div>

                <div class="">
                    <div class="flex flex-row gap-[60px]">
                        <h4 class="btns envies active">Mes envies</h4>
                        <h4 class="btns participants">Les participants</h4>
                        <h4 class="btns indispensables">Mes indispensables</h4>
                    </div>

                    <div class="envies flex flex-row justify-center gap-[40px] flex-wrap">

                    </div>

                    <div class="participants flex flex-row justify-center gap-[40px] flex-wrap">

                    </div>

                    <div class="indispensables flex flex-row justify-center gap-[40px] flex-wrap">

                    </div>

                </div>

            </div>


            {{-- barre left --}}
            <div class="w-[22vw] light:bg-gray-800 overflow-hidden  sm:rounded-lg">
                <div class=" text-gray-900 light:text-gray-100 flex flex-col gap-[20px]">
                    <div class="bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <div class="flex flex-col items-center justify-center gap-[10px]">
                            <h2 class=" text-center text-[20px] text-[#9CC4B9] font-bold">
                                {{-- @foreach($liste as $item)
                                    {{ $item->title }}

                                @endforeach --}}
                                {{ $liste->title }}
                            </h2>
                            <h5 class="text-[15px] text-[#000] font-medium">Naissance prévue le</h5>
                            <h4 class="text-[18px] text-[#FF91B2] font-semibold">
                                {{-- @foreach($liste as $item)
                                    {{ $item->dateBirth->format('d/m/y') }}

                                @endforeach --}}
                                {{ $liste->dateBirth->format('d/m/Y') }}
                            </h4>
                        </div>

                        <div class="flex justify-start mb-1 pt-[10px]">
                            <span class="text-sm font-medium text-[#9CC4B9] light:text-white">
                                45%
                            </span>
                        </div>
                        <div class="w-full bg-[#F6F3EC] rounded-full h-2.5 light:bg-[#F6F3EC]">
                            <div class="bg-[#9CC4B9] h-2.5 rounded-full" style="width: 45%"></div>
                        </div>

                        <div class="text-center pt-[10px]">
                            <x-primary-button>Partager</x-primary-button>
                        </div>

                    </div>

                    <div class=" flex flex-col gap-[10px] bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <h2 class="text-center text-[20px] text-[#9CC4B9] font-bold">Gestion de ma liste</h2>

                        <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050] text-[16px]">
                            @svg('addLink', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                            Ajouter un produit via un lien
                        </a>

                        <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050] text-[16px]">
                            @svg('fav', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                            Voir les essentiels bébé
                        </a>

                        <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050] text-[16px]">
                            @svg('deposit', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                            Ma Cagnotte
                        </a>

                    </div>

                    <div class=" flex flex-col gap-[10px] bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <p class="text-[#505050] text-[16px] font-medium ">
                            Nous avons choisi une liste de produit qui nous feront plaisir pour l’arrivée de notre princesse
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
