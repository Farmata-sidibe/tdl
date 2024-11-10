<header class="fixed inset-x-0 top-0 z-30 mx-auto w-full max-w-screen-md border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-3xl lg:max-w-screen-lg">

    <div class="px-4">
        <div x-data="{ open: false }" class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex shrink-0">
                <a aria-current="page" class="flex items-center" href="/">
                    <x-application-logo class="h-7 w-auto" />
                    <p class="sr-only">Tableau de bord</p>
                </a>
            </div>


            <!-- Desktop Menu -->
            @if (Route::has('login'))
                @if (Auth::check())
                    @php
                        $liste = Auth::user()->listes()->first();
                        $cagnotte = $liste ? $liste->cagnotte()->first() : null;
                    @endphp

                    <div class="hidden md:flex md:items-center md:justify-center md:gap-5">
                        <a aria-current="page" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900" href="/">Accueil</a>
                        <a aria-current="page" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900" href="/product">Les indispensables</a>
                    </div>

                    @auth
                        <div class="flex items-center justify-end gap-3">
                            <a href="/cagnotte">
                                <div class="px-[10px] py-[3px] ring-1 ring-[#DCD9D2] rounded-[7px] flex flex-row items-center justify-center hover:text-vertPoudre hover:bg-white light:text-gray-400 light:hover:text-white light:hover:bg-gray-700 focus:ring-1 focus:ring-vertPoudre light:focus:ring-gray-600">
                                    <button type="button" data-dropdown-toggle="notification-dropdown" class="p-2 mr-1 text-gray-500 rounded-lg hover:text-vertPoudre light:text-gray-400 light:hover:text-white light:hover:bg-gray-700 light:focus:ring-gray-600">
                                        <span class="sr-only">Cagnotte</span>
                                        @svg('deposit', ['width' => '1.25rem', 'height' => '1.25rem', 'fill' => 'currentColor'])
                                    </button>
                                    <h3 class="text-[14px] text-gray-800">{{ $cagnotte ? $cagnotte->current_amount : '0' }}</h3>
                                </div>
                            </a>

                            <!-- Share button -->
                            <div>
                                <input type="text" id="liste-url" value="{{ route('liste.showBySlug', $liste->uuid ?? '') }}" readonly class="hidden form-control mb-2">
                                <button id="copy-button" class="p-2 mr-1 text-gray-500 rounded-lg hover:text-vertPoudre light:text-gray-400 light:hover:text-white light:hover:bg-gray-700 focus:ring-1 focus:ring-vertPoudre light:focus:ring-gray-600" onclick="copyToClipboard()">
                                    @svg('share', ['width' => '1.25rem', 'height' => '1.25rem', 'fill' => 'currentColor'])
                                </button>
                            </div>

                            <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-1 focus:ring-vertPoudre light:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                                <span class="sr-only">Open user menu</span>
                                @php
                                    $profileImage = Storage::url(Auth::user()->profile_image) ?? asset('profiles/default-profile.jpg');
                                @endphp
                                <img class="w-8 h-8 rounded-full" src="{{ $profileImage }}" alt="user photo">
                            </button>

                            <!-- Dropdown menu -->
                            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow light:bg-gray-700 light:divide-gray-600" id="dropdown">
                                <div class="py-3 px-4">
                                    <span class="block text-sm font-semibold text-rose light:text-white">{{ auth()->user()->name }}</span>
                                    <span class="block text-sm text-gray-500 truncate light:text-gray-400">{{ auth()->user()->email }}</span>
                                </div>
                                <ul class="py-1 text-gray-500 light:text-gray-400" aria-labelledby="dropdown">
                                    <li>
                                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-400 light:hover:text-white">Mon profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-400 light:hover:text-white">Paramètre</a>
                                    </li>
                                </ul>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Déconnexion') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>

                    @endauth
                    @else
                        <div class="hidden md:flex md:items-center md:justify-center md:gap-5">
                            <a aria-current="page" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900" href="/">Accueil</a>
                            <a aria-current="page" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900" href="/product">Les indispensables</a>
                        </div>
                        <div class="flex items-center justify-end gap-3">
                            <a class="items-center justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 transition-all duration-150 hover:bg-gray-50 sm:inline-flex" href="{{ route('register') }}">Créez ma liste</a>
                            <a class="inline-flex items-center justify-center rounded-xl bg-[#FF91B2] px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-[#FF91B2] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#FF91B2]" href="{{ route('login') }}">Connexion</a>
                        </div>
                @endif


                <!-- Mobile Menu Toggle -->
                <button @click="open = !open" id="menu-burger" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:bg-gray-100 focus:outline-none">
                    <svg x-show="!open" x-cloak class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" x-cloak class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Mobile Menu -->
                <div x-show="open" x-transition id="menu-burger" class="absolute inset-x-0 top-16 z-20 w-full bg-white shadow-md md:hidden">
                    <div class="flex flex-col items-center gap-4 py-4">
                        <a aria-current="page" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900" href="/">Accueil</a>
                        <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900" href="/product">Les indispensables</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</header>
