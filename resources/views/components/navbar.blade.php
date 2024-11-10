<nav class="flex justify-between items-center w-[92%]  mx-auto bg-white">
    <div>
        <a href="/" class="h-8 w-auto">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 light:text-gray-200" />
        </a>
    </div>
    <div class="flex gap-[20px] items-center">
        <div
            class="nav-links duration-500 lg:static absolute bg-white lg:min-h-fit min-h-[60vh] left-0 top-[-100%] lg:w-auto  w-full flex items-center px-5">
            <ul class="flex lg:flex-row flex-col lg:items-center lg:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-[#9CC4B9] hover:border-b-2 hover:divide-y hover:border-[#FF91B2] inline-block "
                        href="#one">Comment ça marche ?</a>
                </li>
                <li>
                    <a class="hover:text-[#9CC4B9] hover:border-b-2 hover:divide-y hover:border-[#FF91B2] inline-block "
                        href="/product">Les indispensables</a>
                </li>
                <li>
                    <a class="hover:text-[#9CC4B9] hover:border-b-2 hover:divide-y hover:border-[#FF91B2] inline-block "
                        href="#">Créez ma liste</a>
                </li>
                <li>
                    <a class="hover:text-[#9CC4B9] hover:border-b-2 hover:divide-y hover:border-[#FF91B2] inline-block "
                        href="blog">Blog</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-6 bg-red-800">
        </div>
        <div>
            @if (Route::has('login'))
                <button class="">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-[#FF91B2] text-white px-4 py-2 rounded-[16px] hover:bg-[#9CC4B9]">Compte</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-[#FF91B2] text-white px-4 py-2 rounded-[16px] hover:bg-[#9CC4B9]">Connexion</a>
                    @endauth
                </button>
            @endif


        </div>
        <ion-icon onclick="onToggleMenu(this)" name="menu" class="menu-mobile text-3xl cursor-pointer lg:hidden">
        </ion-icon>
    </div>
    </div>
    <script>
        const navLinks = document.querySelector('.nav-links');

        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu';
            navLinks.classList.toggle('top-[9%]');
        }
    </script>
</nav>
