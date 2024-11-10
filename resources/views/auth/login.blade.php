

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="text-[#FF91B2] text-[30px] text-center">Connexion</h1>
        <!-- Email Address -->
        <div>
            {{-- <x-input-label for="email" :value="__('Email')" /> --}}
            <x-text-input placeHolder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            {{-- <x-input-label for="password" :value="__('Password')" /> --}}

            <x-text-input id="password" class="block mt-1 w-full"
                            placeHolder="Password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded light:bg-gray-900 border-gray-300 light:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 light:focus:ring-indigo-600 light:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 light:text-gray-400">{{ __('Se souvenir') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline-none text-sm text-gray-600 light:text-gray-400 hover:text-gray-900 light:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 light:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif

        </div>



        <div class="flex flex-row flex-wrap items-center justify-end mt-4 z-[2]">
            <span class="ms-2 text-sm text-gray-600 light:text-gray-400">{{ __('Pas encore membre? ') }}</span>
            @if (Route::has('register'))
                <a class="z-[2] underline text-sm text-[#FF91B2] light:text-[#9CC4B9] hover:text-[#f8799f] light:hover:text-[#9CC4B9] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 light:focus:ring-offset-gray-800" href="{{ route('register') }}">
                    {{ __('S\'inscrire') }}
                </a>
            @endif

            <x-primary-button class=" ms-3">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>


    </form>

</x-guest-layout>
