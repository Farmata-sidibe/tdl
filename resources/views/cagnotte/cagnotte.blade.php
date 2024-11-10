
@extends('layouts.app')
@section('content')

    <div class="py-12 px-[60px] ">
        <a href="/dashboard" class="mt-[100px]">
            <x-primary-button>Voir ma liste</x-primary-button>
        </a>

        <div class="w-full max-w-lg mx-auto p-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-lg text-rose font-bold mb-6 flex flex-row gap-[20px] items-center">
                    @svg('deposit', ['width'=>35, 'height'=>35, 'fill'=>'#FF91B2'])
                Montant total des contributions
                </h2>

                    <div class="">
                        <p>Chaque contribution est virée directement dans votre compte paypal.</p>

                    </div>
                    <div class="mt-8 ring-1 ring-[#DCD9D2] rounded-[7px] flex flex-col items-center">
                        <h6 class="text-[1em]">Disponible</h6>
                        <h3 class="text-[1.5em] text-vertPoudre">{{ $cagnotte->current_amount }}€</h3>
                    </div>

            </div>
        </div>

    </div>




@endsection







