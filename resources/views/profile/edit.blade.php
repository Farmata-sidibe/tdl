<x-componentEdit routeListeEdit="{{ route('listes.edit', $liste->id) }}">

    <div class="py-12 profile">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-[10px] sm:p-[15px] bg-white light:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white light:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white light:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

</x-componentEdit>




{{-- <x-app-layout>

    <div class="p-[60px] flex flex-col gap-[40px] items-start">
        <a href="/dashboard">
            <x-primary-button>Voir ma liste</x-primary-button>
        </a>

        <div class="flex flex-row flex-wrap gap-[20px]">

            <x-sidebar routeListeEdit="{{ route('listes.edit', $liste->id) }}"></x-sidebar>

            <div class="w-[60vw] bg-white shadow-sm light:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="py-12 profile">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white light:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white light:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white light:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-12 description hidden p-[30px] flex-col">

                    <form method="post" action="{{ route('profile.updateListe', $liste->id) }}" class="flex flex-col gap-[20px] items-start">
                        @csrf
                        @method('patch')
                            <div class="">
                                <h3 class=" text-[18px] mb-[10px]">Titre de la liste de naissance</h3>

                                <x-input placeholder="Ex: liste de naissance de Marco&Camille"
                                    :value="old('title', $liste?->title)"></x-input>
                            </div>

                            <div class="">
                                <h3 class=" text-[18px] mb-[10px]">Nom de votre partenaire</h3>

                                <x-input placeholder="Ex: Paul" :value="old('partner', $liste?->partner)"></x-input>
                            </div>

                            <div class="">
                                <h3 class="text-[18px]">Petite description pour vos proche</h3>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-[700px] text-sm text-gray-900 bg-gray-20 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500"
                                    placeholder="petite introduction ou annonce...">{{ $liste?->description }}</textarea>
                            </div>



                            <div class="">
                                <h3 class=" text-[18px]">Date prévue de votre terme</h3>
                                <div class="relative max-w-sm">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        @svg('calendar', ['width' => 30, 'height' => 30])
                                    </div>
                                    <input datepicker type="text"
                                        placeholder="{{$liste?->dateBirth}}"
                                        class="w-[700px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block ps-10 p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500"
                                         :value="old('dateBirth', $liste?->dateBirth)">

                                </div>
                            </div>

                            <div class="">
                                <h3 class=" text-[18px]">Nom d'utlisateur</h3>

                                <x-input placeholder="Ex: Marcocamille"></x-input>

                                <p class="text-[#757575] text-[14px]">https://www.toutdouxliste.fr/Marcocamille</p>
                            </div>
                            <button type="submit">Enregister</button>
                    </form>

                </div>

                <div class="py-12 bancaire hidden p-[30px] flex-col">
                    <div class="flex flex-col gap-[20px] items-start">
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
                            <h3 class="text-[18px]">Nom Prénom du bénéficiare</h3>

                            <x-input placeholder="Nom complet" />
                        </div>

                        <div class="">
                            <h3 class="text-[18px]">IBAN</h3>

                            <x-input placeholder="FR00 0000 0000 0000 0000 0000 000" />
                        </div>
                        <x-primary-button>Ajouter</x-primary-button>


                    </div>


                </div>

                <div class="py-12 cagnotte hidden p-[30px] flex-col">
                    <div class="flex flex-col gap-[20px] items-start">
                        <div class="">
                            <h2 class="text-[20px] ">Montant de ma cagnotte disponible</h2>
                            <button class="ring-2 ring-[#DCD9D2] rounded-[10px] flex flex-col gap-[10px] p-[8px]">
                                Disponible
                                <h4 class="text-[#9CC4B9] text-[18px]">0.00€</h4>
                            </button>

                        </div>
                        <div class="flex flex-col gap-[20px]">
                            <h3 class=" text-[#FF91B2] text-[18px] ">Faire un virement</h3>
                            <p class="text-[14px]">Effectuer le virement de la cagnotte sur votre compte bancaire</p>

                            <div class="">
                                <x-input-radio label="Laura Dupont" text="LA BANQUE POSTALE ...2H43" />
                            </div>
                        </div>

                        <div class="flex flex-row gap-[20px] flex-wrap">
                            <x-primary-button>Changer de compte</x-primary-button>
                            <x-primary-button>Virement de <span>0.00€</span> </x-primary-button>
                        </div>




                    </div>


                </div>

                <div class="py-12 historique hidden p-[30px] flex-col">
                    <div class="flex flex-col gap-[20px] items-start">

                        <h2 class="text-[20px] text-[#FF91B2]">Historique de mes virements</h2>

                        <div class="flex flex-row gap-[20px]">
                            @svg('euro', ['width' => 25, 'height' => 25])
                            <div class="flex flex-col gap-[10px]">
                                <p class="text-[16px]">
                                    Vous avez effectué un virement de <span>100€</span> vers votre compte
                                    <span>XXX1H23</span>
                                </p>
                                <p class="text-[14px] text-[#636262]">le <span>20/12/2023</span></p>
                            </div>

                        </div>

                        <div class="flex flex-row gap-[20px]">
                            @svg('euro', ['width' => 25, 'height' => 25])
                            <div class="flex flex-col gap-[10px]">
                                <p class="text-[16px]">
                                    Vous avez effectué un virement de <span>100€</span> vers votre compte
                                    <span>XXX1H23</span>
                                </p>
                                <p class="text-[14px] text-[#636262]">le <span>20/12/2023</span></p>
                            </div>

                        </div>

                    </div>


                </div>


            </div>
        </div>


</x-app-layout> --}}
