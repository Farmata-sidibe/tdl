<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @if ($errors->any())
            <div class="bg-red text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="createUser">
            <h1 class="text-[#FF91B2] text-[30px] text-center">Inscription</h1>

            <!-- Name -->
            <div>
                {{-- <x-input-label for="name" :value="__('Nom complet')" /> --}}
                <x-text-input placeHolder="Nom complet" id="name" class="block mt-1 w-full" type="text"
                    name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                <x-text-input placeHolder="Email" id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                {{-- <x-input-label for="password" :value="__('Password')" /> --}}

                <x-text-input placeHolder="Password" id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                {{-- <x-input-label for="password_confirmation" :value="__('Confirmation du Password')" /> --}}

                <x-text-input placeHolder="Confirmation du password" id="password_confirmation"
                    class="block mt-1 w-full" type="password" name="password_confirmation" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 light:text-gray-400 hover:text-gray-900 light:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 light:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Déja membre ? ') }}
                </a>
                <a href="#createListe" class="z-[2] btnnext ml-[10px] inline-flex items-center px-4 py-2 bg-[#FF91B2] border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">S'inscrire</a>
                </a>
            </div>
        </div>

        <div class="createListe hidden gap-[10px] flex-col" id="#createListe">
            <h2 class="text-[#FF91B2] text-[30px] text-center">Création de ma liste</h2>
            <div>

                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                    autocomplete="title" placeHolder="Title" required />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>

                <x-text-textarea placeHolder="Petite intro pour vos proches" id="description" name="description"
                    type="text" class="mt-1 block w-full" autocomplete="description">
                </x-text-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>
            <div>
                <x-text-input datepicker id="dateBirth" name="dateBirth" type="text"
                    class="mt-1 block w-full" autocomplete="dateBirth" placeHolder="DateBirth" required/>
                

                {{-- <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                          </svg>
                        </div>
                        <input datepicker id="dateBirth" type="text" name="dateBirth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder={{$liste?->dateBirth}} autocomplete="dateBirth">
                </div> --}}
            </div>
            <div>
                <x-text-input id="partner" name="partner" type="text" class="mt-1 block w-full"
                    autocomplete="partner" placeHolder="partner" />
                <x-input-error class="mt-2" :messages="$errors->get('partner')" />
            </div>
        </div>

        <div class="flex items-center justify-center mt-4">

            <x-primary-button class="submitAccount ms-4 hidden">
                {{ __('Céer ma liste') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        let btncreateuser = document.querySelector(".btnnext");
        let btnSubmit = document.querySelector(".submitAccount");

        let blocCreateuser = document.querySelector(".createUser");
        let blocCreateliste = document.querySelector(".createListe");

        btncreateuser.onclick = function () {
            blocCreateliste.style.display = "flex";
            blocCreateuser.style.display = "none";
            btnSubmit.style.display = "flex";
        };


    </script>
</x-guest-layout>
