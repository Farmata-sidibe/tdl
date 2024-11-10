@props(['image', 'marque', 'price', 'title', 'liste_id', 'titleProduct', 'reserved'])

{{-- <div class="card-wish bg-[#FFF] hover:shadow-xl p-2">
    @if($reserved > 0)
        <div class="ruban left"><span class="bg-vertPoudre">Réservé</span></div>
    @endif
    <img src="{{ $image }}" class="mb-[10px] h-[18em] w-[16em] object-cover" alt="">

    <div class="flex flex-row justify-between items-center">
        <div class="flex flex-col gap-[10px]">

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

</div> --}}

     <!--   ✅ Product card 1 - Starts Here 👇 -->
     <div class="card-wish w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <label for="{{ $titleProduct }}" class="open" onclick="openPopup(event, '{{ $titleProduct }}')">
            @if($reserved > 0)
                <div class="ruban left"><span class="bg-vertPoudre">Réservé</span></div>
            @endif
            <img src="{{ $image }}"
                alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">{{ $marque }}</span>
                <p class="text-lg font-bold text-black truncate block capitalize">{{ $titleProduct }}</p>
                <div class="flex items-center">
                    <p class="text-lg font-semibold text-black cursor-auto my-3">{{ $price }}€</p>
                    <div class="ml-auto open" onclick="openPopup(event, '{{ $titleProduct }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </label>
    </div>

    <!-- Popup content -->
    <div id="{{ $titleProduct }}" class="popup-overlay z-10">

        <div class="popup-content bg-white light:bg-gray-800 py-8">
            <button onclick="closePopup(event, '{{ $titleProduct }}')" class="close bg-rose rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-vertPoudre focus:outline-none focus:ring-2 focus:ring-inset focus:ring-vertPoudre">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="title"> Information du produit </h2>
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row -mx-4">

                    <div class="md:flex-1 px-4">
                        <div class="h-[460px] rounded-lg bg-gray-300 light:bg-gray-700 mb-4">
                            <img class="w-full h-full object-cover" src="{{ $image }}" alt="Product Image">
                        </div>
                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="text-2xl font-bold text-gray-800 light:text-white mb-2">{{ $marque }}</h2>
                        <p class="text-gray-600 light:text-gray-300 font-bold text-xl mb-4 text-start">
                            {{ $title }}
                        </p>
                        <div class="flex mb-4">
                            <div class="mr-4">
                                <span class=" light:text-gray-300 text-xl font-bold text-rose">{{ $price }}€</span>
                            </div>
                        </div>

                        <div class="flex -mx-2 mb-4">
                            {{$slot}}
                            <div class="w-1/2 px-2">

                                <form action="#" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-[#FF91B2] text-[#FFF] text-[10px] px-[15px] py-[10px] rounded-[20px]">Produit déjà Acheter</button>
                                </form>
                            </div>
                            <div class="w-1/2 px-2">
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
                </div>
            </div>
        </div>

    </div>

    <script>
        function closePopup(event, popupId) {
            event.preventDefault();
            const popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = 'none';
            }
        }

        function openPopup(event, popupId) {
            event.preventDefault();
            const popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = 'flex';
            }
        }
    </script>
