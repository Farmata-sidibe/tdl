@props(['image', 'marque', 'price', 'title', 'liste_id', 'titleProduct', 'reserved'])

<div class="bg-[#FFF] hover:shadow-xl p-2">

    <img src="{{ $image }}" class="mb-[10px] h-[18em] w-[16em] object-cover" alt="">

    <div class="flex flex-row justify-between items-center">
        <div class="flex flex-col gap-[10px]">
            @if($reserved > 0)
                <div class="">
                    <span class="border-1 border-[#ff0000] text-[#fffffff1] bg-[#ff0000] px-3 py-1">
                        {{$reserved}}
                    </span>
                </div>
            @endif
            <h4 class="font-[900] text-[1em]"> {{ $marque }} </h4>
            <h4 class="font-[900] text-[1em]">{{ $price }} </h4>
            <p class="text-[#242424] text-[14px]">
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

                <div class="productInfo flex flex-row flex-wrap gap-[40px]">
                    <div class="img flex flex-col gap-[20px]">
                        <img src="{{ $image }}" class="rounded-[10px] w-[200px]" alt="image product">
                    </div>

                    <div class="infoText flex flex-col gap-[20px]">
                        <h3 class="text-[#FF91B2] text-[20px] font-[700]">{{ $marque }}</h3>
                        <h3 class="text-[#000] text-[18px] font-[700]">{{ $title }}</h3>
                        <h3 class="text-[#FF4242] text-[25px] font-[700]">{{ $price }}</h3>

                        {{$slot}}

                        <div class="btnFinish flex flex-row flex-wrap gap-[20px]">

                            <form action="#" method="POST">
                                @csrf
                                <button type="submit" class="bg-[#FF91B2] text-[#FFF] text-[10px] px-[15px] py-[10px] rounded-[20px]">Produit déjà Acheter</button>
                            </form>

                            <form action="{{ route('dashboard.deleteProductWish') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="title" value="{{ $title }}">
                                <button
                                    type="submit"
                                    class="flex flex-row gap-[10px] bg-[#000000] text-[10px] text-[#fff] px-[15px] py-[10px] rounded-[20px]">
                                    Supprimer de mes envies
                                </button>
                            </form>


                        </div>

                    </div>
                </div>

            </label>
        </label>

    </div>

</div>
