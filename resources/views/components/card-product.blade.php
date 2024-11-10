

     <!--   ✅ Product card 1 - Starts Here 👇 -->
     <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <label for="{{ $titleProduct }}" class="open" onclick="openPopup(event, '{{ $titleProduct }}')">
            <img src="{{ $image }}"
                alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">{{ $marque }}</span>
                <p class="text-lg font-bold text-black truncate block capitalize">{{ $titleProduct }}</p>
                <div class="flex items-center">
                    <p class="text-lg font-semibold text-black cursor-auto my-3">{{ $price }}</p>
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
                                <span class=" light:text-gray-300 text-xl font-bold text-rose">{{ $price }}</span>
                            </div>
                        </div>
                        {{$slot}}
                        <div class="flex -mx-2 mb-4">
                            <div class="w-1/2 px-2">

                                <form action="{{ route('dashboard.addProductWish', ['title' => $title]) }}" method="POST">
                                    @csrf
                                    <x-primary-button type="submit" >Ajouter à mes envies</x-primary-button>
                                </form>
                            </div>
                            <div class="w-1/2 px-2">
                                <a href="{{ $url }}">
                                    <button
                                        class="flex flex-row inline-flex items-center gap-[10px] bg-[#F6F3EC] font-semibold text-xs text-[#FF91B2] px-4 py-2 rounded-md transform active:scale-x-75 transition-transform">
                                        @svg('shop', ['width' => '20px', 'height' => '20px', 'stroke' => '#FF91B2']) Acheter directement
                                    </button>
                                </a>
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
