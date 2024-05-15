<nav class="nav_user  w-[100%] h-[59px]   mx-auto">
    <div class="containe_nav_user flex justify-between items-center px-[50px] pt-[10px]">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <img src="{{asset('img/jonathan-borba-RWgE9_lKj_Y-unsplash.jpg')}}" class="w-[40px] h-[40px] object-cover rounded-[50%]" alt="pp user">
        </x-nav-link>
        <div class="link bg-[#fff] h-[40px] px-[15px] rounded-[30px] flex flex-row justify-centen items-center gap-[30px]">
            <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050]">
                @svg('deposit', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                Cagnotte
            </a>
            <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050]">
                @svg('addLink', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                Ajouter un produit
            </a>
            <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050]">

                @svg('share', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])

                Partager ma liste
            </a>
        </div>
        <div class="link bg-[#fff] h-[40px] px-[15px] rounded-[30px] flex flex-row justify-centen items-center gap-[20px]">
            <div class="flex flex-row items-center bg-[#F6F3EC] rounded-[20px] px-[10px] h-[30px]">
            @svg('search', ['fill'=>'#9E9C9C', 'width'=>18, 'height'=>18])
                <input type=search name=q aria-label="Rechercher un produit" placeholder="Rechercher un prooduit" class="text-[#9E9C9C] bg-[#F6F3EC] rounded-[20px] text-[12px]"/>
            </div>

            <div class="flex flex-row items-center gap-[20px]">
                @svg('notif', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                @svg('fav', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                {{-- @svg('params', ['width'=>25, 'height'=>25, 'fill'=>'#505050']) --}}
                <div class=" sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-[2px] py-[10px] border border-transparent text-sm leading-4 font-medium rounded-[50%] text-gray-500 dark:text-gray-400  dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>@svg('params', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <a href="/params" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                Paramêtre</a>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

            </div>
        </div>
    </div>

    <div class="containe_responsive flex flex-col gap-[12px] px-[50px] pt-[10px]">
        <div class=" flex flex-row justify-between">

            <div class="link  flex flex-row justify-centen items-center w-[125px] justify-between">

                <a href="#" class=" text-[#505050] bg-[#fff] px-[10px] py-[10px] rounded-[50%]">
                    @svg('deposit', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a>
                <a href="#" class="text-[#505050] bg-[#fff] px-[10px] py-[10px] rounded-[50%]">
                    @svg('addLink', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a>
                <a href="#" class="text-[#505050] bg-[#fff] px-[10px] py-[10px] rounded-[50%]">

                    @svg('share', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])

                </a>
            </div>


            <div class="flex flex-row items-center w-[125px] justify-between">
                <a href="#" class="text-[#505050] bg-[#fff] px-[10px] py-[10px] rounded-[50%]">
                    @svg('notif', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a>
                <a href="#" class="text-[#505050] bg-[#fff] px-[10px] py-[10px] rounded-[50%]">
                    @svg('fav', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a>


                <div class=" sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-[2px] py-[10px] border border-transparent text-sm leading-4 font-medium rounded-[50%] text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>@svg('params', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>


            </div>
        </div>

        <div class="flex flex-row items-center bg-[#fff] rounded-[20px] px-[10px] h-[30px] w-[100%]">
            @svg('search', ['fill'=>'#9E9C9C', 'width'=>18, 'height'=>18])
                <input type=search name=q aria-label="Rechercher un produit" placeholder="Rechercher un prooduit" class="text-[#9E9C9C] rounded-[20px] text-[12px] w-[100%]"/>
        </div>
    </div>
</nav>
