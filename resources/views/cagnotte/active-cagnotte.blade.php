<x-componentEdit routeListeEdit="{{ route('listes.edit', $liste->id) }}">

    <div class="py-12 p-[30px] flex-col">
        <div class="flex flex-col gap-[20px]">
            <div class=" flex flex-col gap-[20px]">
                <h2 class="text-[#FF91B2] text-[20px] ">Activer ma cagnotte</h2>
                <p class="text-[14px]">
                    En ajoutant votre piece d’identité nous pourrons vérifier votre identité (obligation
                    légale).
                    <br>
                    Ajouter votre compte bancaire pour faire votre virement de la cagnotte vers ce dernier.
                </p>
            </div>
            <div class="">
                <h3 class=" text-[18px]">Vérification d'identité</h3>
                <div class=" flex flex-row gap-[40px]">
                    <x-input-file face="recto" />
                    <x-input-file face="verso" />

                </div>
            </div>

            <h2 class="text-[#FF91B2]">Information bancaire</h2>

            <div class="">

                <x-text-input id="fullName" name="fullName" type="fullName" class="mt-1 block w-full" :value="old('fullName', '')"
                autocomplete="fullName" placeHolder="Nom Prénom" />
                {{-- <x-input placeholder="Nom complet" /> --}}
            </div>

            <div class="">

                <x-text-input id="iban" name="iban" type="iban" class="mt-1 block w-full" :value="old('iban', '')"
                    autocomplete="iban" placeHolder="Iban" />

                {{-- <x-input placeholder="FR00 0000 0000 0000 0000 0000 000" /> --}}
            </div>
            <div>
            <x-primary-button>Ajouter</x-primary-button>

            </div>


        </div>


    </div>

</x-componentEdit>
