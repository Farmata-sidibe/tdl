@extends('layouts.app')
@section('content')

    <div class="bg-beige p-[60px] flex flex-col gap-[40px] items-start">
        <a href="/dashboard">
            <x-primary-button>Voir ma liste</x-primary-button>
        </a>

        <div class="flex flex-row flex-wrap gap-[20px]">

            <div
                class="w-[20vw] mb-[10px] px-[10px] py-[20px] bg-white shadow-sm light:bg-gray-800 overflow-hidden  sm:rounded-lg">
                <h3 class="text-[25px] font-semibold flex flex-row items-center gap-[10px]">
                    @svg('params', ['width' => '1.3em', 'height' => '1.3em', 'fill' => '#000'])
                    Paramêtre</h3>
                <div class="flex flex-col gap-[10px]">

                    <a href="{{route('profile.edit')}}" class="hover:text-[#FF91B2] focus:text-[#FF91B2] active:text-[#FF91B2]"  id="profile">Mon profil</a>
                    {{-- <a href="{{route('liste.edit')}}" class="hover:text-[#FF91B2] focus:text-[#FF91B2] active:text-[#FF91B2] " id="description">Ma liste</a> --}}
                    {{-- <a href="#" class="hover:text-[#FF91B2] focus:text-[#FF91B2] active:text-[#FF91B2]" id="cagnotte">Ma cagnotte</a> --}}
                    <a href="/cagnotte" class="hover:text-[#FF91B2] focus:text-[#FF91B2] active:text-[#FF91B2]" id="bancaire">Ma cagnotte</a>
                    <a href="#" class="hover:text-[#FF91B2] focus:text-[#FF91B2] active:text-[#FF91B2]" id="historique">Historique</a>
                </div>
            </div>

            <div class="w-[60vw] bg-white shadow-sm light:bg-gray-800 overflow-hidden sm:rounded-lg">

                {{$slot}}

            </div>
    </div>


@endsection
