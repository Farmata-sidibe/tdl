@props(['id', 'image', 'marque', 'price', 'title', 'liste_id', 'titleProduct'])
<div class="bg-[#F9F8F8] rounded-[15px]">

    <img src="{{ $image }}" class="h-[18em] w-[16em] object-cover rounded-t-[15px]" alt="">


    <div class="flex flex-row justify-around items-center">
        <div class="">
            <h4 class="font-[900] text-[1em]"> {{ $marque }} </h4>
            <h4 class="font-[900] text-[1em]">{{ $price }} </h4>
            <p class="text-[#919090] text-[12px]">
                {{ $titleProduct }}
            </p>

        </div>

        <div>
            <label for="{{ $titleProduct }}"
                class="cursor-pointer rounded bg-black px-4 py-2 text-white active:bg-slate-400">
                voir
            </label>
        </div>

        <input type="checkbox" id="{{ $titleProduct }}" class="peer fixed appearance-none opacity-0">


        <label for="{{ $titleProduct }}"
            class="pointer-events-none invisible fixed inset-0 flex cursor-pointer
        items-center justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0
        transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible
        peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


            <label for="{{ $titleProduct }}"
                class="flex flex-col p-[20px] gap-[20px] max-h-[calc(100vh - 5em)] h-fit scale-90 overflow-y-auto
            overscroll-contain rounded-md bg-white p-6 text-black shadow-2xl transition">


                <h2 class="title"> Information du produit </h2>
                <hr>

                <div class="productInfo flex flex-col gap-[40px]">

                    <div class="flex flex-row flex-wrap gap-[40px]">

                        <div class="img flex flex-col gap-[20px]">
                            <img src="{{ $image }}" class="rounded-[10px] w-[200px]" alt="image product">
                        </div>

                        <div class="infoText flex flex-col gap-[20px]">
                            <h3 class="text-[#FF91B2] text-[20px] font-[700]">{{ $marque }}</h3>
                            <h3 class="text-[#000] text-[18px] font-[700]">{{ $title }}</h3>
                            <h3 class="text-[#FF4242] text-[25px] font-[700]">{{ $price }}</h3>

                        </div>

                    </div>


                    <form action="{{ route('reservations.store') }}" method="POST" class="">
                        <h2 class="text-[#FF91B2] text-[20px] font-[700]">Réservation</h2>

                        @csrf
                        <div class="flex flex-col gap-[20px] justify-center mb-[20px]">

                            <input type="hidden" name="product_id" value="{{ $id }}">
                            <input type="hidden" name="liste_id" value="{{ $liste_id }}">

                            <div>
                                {{-- <label for="visitor_name">Votre nom:</label>
                                <input type="text" id="visitor_name" name="visitor_name" required> --}}
                                <x-text-input id="visitor_name" name="visitor_name" type="text" class="mt-1 block w-full" required placeHolder="Votre nom" />
                            </div>

                            <div>
                                {{-- <label for="visitor_email">Votre email:</label>
                                <input type="email" id="visitor_email" name="visitor_email" required> --}}
                                <x-text-input id="visitor_email" name="visitor_email" type="text" class="mt-1 block w-full" required placeHolder="Votre adresse email" />

                            </div>
                        </div>

                        <x-primary-button type="submit">Réserver ce produit</x-primary-button>
                    </form>
                </div>

            </label>
        </label>

    </div>

</div>
