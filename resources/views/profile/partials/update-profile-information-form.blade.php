<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 light:text-gray-100">
            {{ __('Profil Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 light:text-gray-400 text-left">
            {{ __("Mettez à jour les informations de profil et l'adresse électronique de votre compte.") }}
        </p>
    </header>
    {{-- update profile --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form action="{{ route('profile.update') }}" method="POST" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <!-- Profile Image -->
        <div>
            <x-input-label for="profile_image" value="Profile Image" />
            <input type="file" name="profile_image" id="profile_image" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
            @if ($user->profile_image)
                <div class="mt-2">
                    <img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image"
                        class="h-20 w-20 object-cover rounded-full">
                </div>
            @endif
        </div>

        <!-- Cover Image -->
        <div class="mt-4">
            <x-input-label for="cover_image" value="Cover Image" />
            <input type="file" name="cover_image" id="cover_image" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('cover_image')" />
            @if ($user->cover_image)
                <div class="mt-2">
                    <img src="{{ Storage::url($user->cover_image) }}" alt="Cover Image"
                        class="h-32 w-full object-cover">
                </div>
            @endif
        </div>
        <h2 class="text-xl">Information profil</h2>
        <div>
            <x-text-input placeHolder="Nom" id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-text-input placeHolder="Adresse email" id="email" name="email" type="email"
                class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 light:text-gray-200">
                        {{ __('Votre adresse mail n\'est pas vérifiée.') }}

                        <button form="send-verification"
                            class=" text-left underline text-sm text-gray-600 light:text-gray-400 hover:text-gray-900 light:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 light:focus:ring-offset-gray-800">
                            {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-left mt-2 font-medium text-sm text-green-600 light:text-green-400">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse électronique.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <h2 class="text-xl">Information Liste</h2>
        {{-- update adresse mail paypal --}}
        <div>
            <x-text-input placeHolder="Adresse email paypal" id="paypal_email" name="paypal_email" type="email"
                class="mt-1 block w-full" :value="old('paypal_email', $user->paypal_email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        {{-- update liste informtion --}}
        <div>
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $liste?->title)"
                placeHolder="Title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>
        <div>
            <x-text-textarea placeHolder="Petite intro pour vos proches" id="description" name="description"
                class="mt-1 block w-full"> {{ $liste?->description }} </x-text-textarea>
        </div>
        <div>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker id="dateBirth" :value="old('dateBirth', $liste?->dateBirth)" type="text"
                    name="dateBirth"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="{{ $liste?->dateBirth }}" autocomplete="dateBirth">
            </div>
        </div>
        <div>
            <x-text-input id="partner" name="partner" type="text" class="mt-1 block w-full" :value="old('partner', $liste?->partner)"
                placeHolder="partner" />
            <x-input-error class="mt-2" :messages="$errors->get('partner')" />
        </div>
        {{-- update information liste --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Valider') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 light:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    {{-- update liste --}}
    {{-- <form action="{{ route('profile.update') }}" method="POST" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('patch')

                <div>

                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $liste?->title)"
                     placeHolder="Title" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>

                    <x-text-textarea placeHolder="Petite intro pour vos proches" id="description" name="description" class="mt-1 block w-full"> {{ $liste?->description }} </x-text-textarea>
                </div>
                <div>


                     <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                          </svg>
                        </div>
                        <input datepicker id="dateBirth" :value="old('dateBirth', $liste?->dateBirth)" type="text" name="dateBirth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder={{$liste?->dateBirth}} autocomplete="dateBirth">
                    </div>


                </div>
                <div>
                    <x-text-input id="partner" name="partner" type="text" class="mt-1 block w-full" :value="old('partner', $liste?->partner)"
                        placeHolder="partner" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>


            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Valider') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 light:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form> --}}
</section>
