<x-app-layout>

    <div class="py-12">

        <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 flex flex-col-reverse items-center lg:justify-between lg:flex-wrap lg:flex-row lg:items-start">

            <!-- {{-- barre right --}} -->
            <div class="w-[68vw] flex flex-col gap-[20px] px-[5px] py-[5px]  bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class=" bg-[url({{ asset('img/fe-ngo-bvx3G7RkOts-unsplash.jpg') }})] h-[350px] bg-fixed bg-contain sm:rounded-lg flex items-end px-[25px] py-[15px]">

                    <h3 class="text-[#fff] text-[20px] font-medium">
                        {{$liste->user->name}} &

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
                        <h4 class="btns envies active">Mes envies</h4>
                        <h4 class="btns participants">Les participants</h4>
                        <h4 class="btns indispensables">Mes indispensables</h4>
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
                                />
                            @endforeach

                        @else
                            <p>Aucun produit dans la liste de naissance.</p>
                        @endif

                    </div>

                    <div class="participants flex flex-row justify-center gap-[40px] flex-wrap">

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
                            <x-primary-button>Je contribue</x-primary-button>
                        </div>

                    </div>

                    <div class=" flex flex-col gap-[10px] bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <h2 class="text-center text-[20px] text-[#9CC4B9] font-bold">Contribution libre</h2>

                       <p>
                        Vous pouvez contribuez à la cagnotte avec le montant de votre choix
                       </p>

                        <!-- {{-- <form action="{{ route('liste.participate', $liste->uuid) }}" method="POST" class="flex flex-col gap-[10px]">
                            @csrf
                            <div class="flex flex-col justify-between gap-[10px]">
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" placeHolder="Nom" required/>

                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" autocomplete="email" placeHolder="Email" required/>

                                <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" autocomplete="amount" placeHolder="Montant" required/>
                            </div>

                            <div class="flex flex-col items-center">
                                <x-primary-button>Contribuer</x-primary-button>

                            </div>
                        </form> --}} -->

                        <form action="{{ route('liste.showBySlug') }}" method="POST">
                            @csrf
                            <!-- {{-- <button type="submit" id="checkout-button">Pay</button> --}} -->
                            <x-primary-button type="submit" id="checkout-button">Contribuer</x-primary-button>
                        </form>





                    </div>

                    <div class=" flex flex-col gap-[10px] bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <p class="text-[#505050] text-[16px] font-medium ">
                            Nous avons choisi une liste de produit qui nous feront plaisir pour l’arrivée de notre princesse
                        </p>
                        <!-- {{-- <p>Montant collecté: {{ number_format($current_amount, 2, ',', ' ') }} € / Objectif: {{ number_format($total_amount, 2, ',', ' ') }} €</p> --}} -->


                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
