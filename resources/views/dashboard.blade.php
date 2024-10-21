<x-app-layout>

    <div class="py-12">

        <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 flex flex-col-reverse items-center lg:justify-between lg:flex-row lg:items-start">

            {{-- barre right --}}
            <div class="w-[68vw] flex flex-col gap-[20px] px-[5px] py-[5px]  bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class=" bg-[url({{ asset('img/fe-ngo-bvx3G7RkOts-unsplash.jpg') }})] h-[350px] bg-fixed bg-contain sm:rounded-lg flex items-end px-[25px] py-[15px]">

                    <h3 class="text-[#fff] text-[20px] font-medium">
                        {{$user->name}} &

                        {{ $liste->partner }}
                    </h3>
                </div>
                <div class=" bg-[#9cc4b985] ring-1 ring-[#649D8C] h-auto sm:rounded-lg px-[20px] py-[10px]">

                    <p class="text-[#505050] text-[16px] font-medium py-[5px]">

                        {{ $liste->description }}
                    </p>
                </div>

                <div class="">
                    <div class="flex flex-row gap-[60px]">
                        <h4 class="btns  active" id="envies">Mes envies</h4>
                        <h4 class="btns " id="participants">Les participants</h4>
                        <h4 class="btns " id="indispensables">Mes indispensables</h4>
                    </div>

                    <div class="envies flex flex-row mt-[20px] gap-[40px] flex-wrap">



                        @if($liste && $liste->products->count() > 0)

                            @foreach($liste->products as $product)

                                <x-card-wish
                                    id="{{ $product->pivot->id }}"
                                    image="{{ $product->pivot->img }}"
                                    marque="{{ $product->pivot->brand }}"
                                    price="{{ $product->pivot->price }}"
                                    title="{{ $product->pivot->title }}"
                                    titleProduct="{{ substr($product->pivot->title ?? '', 0, 20) }}{{ strlen($product->pivot->title ?? '') > 20 ? '...' : '' }}"
                                    reserved="{{ $product->pivot->reserved }}"
                                />
                            @endforeach

                        @else
                            <p>Aucun produit dans la liste de naissance.</p>
                        @endif

                    </div>

                    <div class="participants hidden flex-row justify-center gap-[40px] flex-wrap">
                        @if($liste->reservations)
                            <ul>
                                @foreach($liste->reservations as $reservation)
                                    <li>
                                        Produit: {{ $reservation->product->title }} réservé par {{ $reservation->visitor_name }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Aucune réservation pour cette liste.</p>
                        @endif
                    </div>

                    <div class="indispensables flex flex-row justify-center gap-[40px] flex-wrap">

                    </div>

                </div>

            </div>


            {{-- barre left --}}
            <div class="w-[22vw] light:bg-gray-800 overflow-hidden sm:rounded-lg flex flex-row flex-wrap lg:flex-col lg:flex ">
                <div class=" text-gray-900 light:text-gray-100 flex flex-row lg:flex-col gap-[20px]">
                    <div class="bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <div class="flex flex-col items-center justify-center gap-[10px]">
                            <h2 class=" text-center text-[20px] text-[#9CC4B9] font-bold">
                                {{ $liste->title }}
                            </h2>
                            <h5 class="text-[15px] text-[#000] font-medium">Naissance prévue le</h5>
                            <h4 class="text-[18px] text-[#FF91B2] font-semibold">
                                {{ $liste->dateBirth->format('d/m/Y') }}

                            </h4>
                        </div>

                        <div class="flex justify-start mb-1 pt-[10px]">
                            <span class="text-sm font-medium text-[#9CC4B9] light:text-white">
                                {{ number_format($percentage, 2) }}%
                            </span>
                        </div>
                        <div class="w-full bg-[#F6F3EC] rounded-full h-2.5 light:bg-[#F6F3EC]">
                            <div class="bg-[#9CC4B9] h-2.5 rounded-full" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
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

                        @if(isset($liste) && $liste)

                            <input type="text" id="liste-url" value="{{ route('liste.showBySlug', $liste->uuid) }}" readonly class="hidden form-control mb-2">
                                <button
                                    id="copy-button"
                                    class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-white light:text-gray-400 light:hover:text-white light:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 light:focus:ring-gray-600"
                                    onclick="copyToClipboard()">
                                    @svg('share', ['width'=>'1.25rem', 'height'=>'1.25rem', 'fill'=>'#currentColor']) Partager ma liste
                                </button>

                        @endif

                    </div>

                    <div class=" flex flex-col gap-[10px] bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <p class="text-[#505050] text-[16px] font-medium ">
                            Nous avons choisi une liste de produit qui nous feront plaisir pour l’arrivée de notre princesse
                        </p>
                        {{-- <p>Montant collecté: {{ number_format($current_amount, 2, ',', ' ') }} € / Objectif: {{ number_format($total_amount, 2, ',', ' ') }} €</p> --}}


                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
