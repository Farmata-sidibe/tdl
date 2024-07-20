<x-app-layout>



    <div class="py-12 px-[60px]">
        <a href="/dashboard" class="mt-[100px]">
            <x-primary-button>Voir ma liste</x-primary-button>
        </a>
        <div class="mt-[20px] bg-[#fff] h-[200px] rounded-[20px] max-w-[55rem] mx-auto sm:px-6 lg:px-8 flex flex-col items-center justify-around">
            <h2 class="flex flex-row gap-[20px] items-center text-[1.8em]">
                @svg('deposit', ['width'=>35, 'height'=>35, 'fill'=>'#505050'])
                Montant de ma cagnotte disponible
            </h2>
            <div class="px-[15px] py-[10px] ring-1 ring-[#DCD9D2] rounded-[7px] flex flex-col items-center">
                <h6 class="text-[1em]">Disponible</h6>
                <h3 class="text-[1.5em] text-vertPoudre">{{ $cagnotte->current_amount }}€</h3>
            </div>
        </div>

        <div class="mt-[20px] bg-[#fff] h-[200px] rounded-[20px] max-w-[55rem] mx-auto sm:px-6 lg:px-8 flex flex-col gap-[10px] justify-center items-start">
            <h2 class="flex flex-row gap-[20px] text-[1.3em] text-[#FF91B2]">
                Faire un virement
            </h2>
            <div class="flex flex-col gap-[20px] justify-between">
                <p class="text-[14px]">Effectuer le virement de votre cagnotte sur votre compte bancaire</p>

                <x-input-radio label="Laura Dupont" text="LA BANQUE POSTALE ...2H43"/>

                <div class="flex items-center gap-4">
                    <x-primary-button>Changer de compte</x-primary-button>
                    <x-primary-button>Virement de {{ $cagnotte->current_amount }}€</x-primary-button>
                </div>

            </div>
        </div>

    </div>

</x-app-layout>







