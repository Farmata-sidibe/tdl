@extends('layouts.app')
@section('content')
    {{-- <div class="mb-4 text-sm text-gray-600 light:text-gray-400">
        {{ __('Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer ? Si vous n\'avez pas reçu l\'e-mail, nous vous en enverrons un autre avec plaisir.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 light:text-green-400">
            {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse électronique que vous avez fournie lors de votre inscription.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Renvoyer l\'email de vérification') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('Déconnexion') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 light:text-gray-400 hover:text-gray-900 light:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 light:focus:ring-offset-gray-800">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div> --}}

    <!-- Boîte de bienvenue -->
<div class="flex justify-center items-center h-screen bg-[#F3B9C0]">
    <!-- Boîte de contenu -->
    <div class="relative bg-white rounded-lg shadow-lg flex w-full max-w-3xl">
        <!-- Bloc blanc (texte) -->
        <div class="w-2/3 p-16">
            <h2 class="text-2xl font-bold mb-4">Merci de vous être inscrit !</h2>
            <p class="mb-4">
                Avant de commencer, pourriez-vous vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer ?
                Si vous n'avez pas reçu l'e-mail, nous vous en enverrons un autre avec plaisir.
            </p>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 light:text-green-400">
                    {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse électronique que vous avez fournie lors de votre inscription.') }}
                </div>
            @endif
            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button class="bg-black z-[2] text-white py-2 px-4 rounded">
                            {{ __('Renvoyer l\'email de vérification') }}
                        </x-primary-button>

                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="z-[2] underline text-sm text-gray-600 light:text-gray-400 hover:text-gray-900 light:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 light:focus:ring-offset-gray-800">
                        {{ __('Se déconnecter') }}
                    </button>
                </form>
            </div>

            <div class="absolute z-[2] bottom-[-35%] right-[-49%] p-4">
                <img src="{{ asset('img/baby.png') }}" alt="bébé qui dort" class="w-[50%] h-auto">
            </div>
        </div>

        <!-- Bloc rose -->
        <div class="z-[1] w-1/3 bg-[#F3B9C0] mt-[5px] relative rounded-r-lg">

        </div>
    </div>
</div>

@endsection
