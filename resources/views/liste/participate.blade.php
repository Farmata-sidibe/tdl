<x-app-layout>

    <div class="py-12">
        <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 flex flex-row flex-wrap justify-between">

            {{-- barre right --}}
            <div class="w-[68vw] flex flex-col gap-[20px] px-[5px] py-[5px]  bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class=" bg-[url({{ asset('img/fe-ngo-bvx3G7RkOts-unsplash.jpg') }})] h-[350px] bg-fixed bg-contain sm:rounded-lg flex items-end px-[25px] py-[15px]">
                    {{-- <img src="{{asset('img/fe-ngo-bvx3G7RkOts-unsplash.jpg')}}" class="sm:rounded-lg w-[100%] h-[350px] object-cover" alt=""> --}}
                    <h3 class="text-[#fff] text-[20px] font-medium">Laurent & vincent</h3>
                </div>
                <div class=" bg-[#9cc4b985] ring-1 ring-[#649D8C] h-[350px] sm:rounded-lg flex items-center px-[20px] py-[40px]">

                    <p class="text-[#505050] text-[16px] font-medium py-[5px]">
                        Hello ! <br> <br>
                        J'ai une grande nouvelle a vous annoncer! Notre famille va bientôt s'agrandir! Un immense bonheur que nous souhaitions partager avec vous!

                       <br> <br>D'après l'équation mathématique: 1+1=2 mais chez nous 1+1=3!
                        Le 26 mai prochain, Vincent et moi deviendrons parents! C'est avec une immense joie que nous attendons notre futur bébé!

                        <br> <br>Si vous vous sentez l'envie de faire partie de cette joyeuse préparation, nous avons concocté une petite liste de naissance juste ici.
                        Nous avons essayé au maximum de sélectionner des produits fabriqués de manière éthique, à partir de matériaux naturels et sains. 🌳
                        Mille mercis à vous tous, on a hâte de vous revoir lorsque nous serons trois !

                        <br> <br>Laura & Vincent
                    </p>
                </div>

                <div class="">
                    <div class="flex flex-row gap-[60px]">
                        <h4 class="btns envies active">Nos envies</h4>

                    </div>

                    <div class="envies flex flex-row justify-center gap-[40px] flex-wrap">

                    </div>

                </div>

            </div>


            {{-- barre left --}}
            <div class="w-[22vw] light:bg-gray-800 overflow-hidden  sm:rounded-lg">
                <div class=" text-gray-900 light:text-gray-100 flex flex-col gap-[20px]">
                    <div class="bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <div class="flex flex-col items-center justify-center gap-[10px]">
                            <h2 class=" text-center text-[20px] text-[#9CC4B9] font-bold">Liste de naissance de la princesse Alba</h2>
                            <h5 class="text-[15px] text-[#000] font-medium">Naissance prévue le</h5>
                            <h4 class="text-[18px] text-[#FF91B2] font-semibold">01/04/2024</h4>
                        </div>

                        <div class="flex justify-start mb-1 pt-[10px]">
                            <span class="text-sm font-medium text-[#9CC4B9] light:text-white">45%</span>
                        </div>
                        <div class="w-full bg-[#F6F3EC] rounded-full h-2.5 light:bg-[#F6F3EC]">
                            <div class="bg-[#9CC4B9] h-2.5 rounded-full" style="width: 45%"></div>
                        </div>

                        <div class="text-center pt-[10px]">
                            <x-primary-button>Contribuer</x-primary-button>
                        </div>

                    </div>

                    <div class=" flex flex-col gap-[10px] bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <h2 class="text-center text-[20px] text-[#9CC4B9] font-bold">Contibution libre</h2>
                        <p class="text-[#505050] text-[16px] font-medium">Vous pouvez contribuez à la cagnotte avec le montant de votre choix</p>

                        <div class="flex flex-row justify-between">
                            {{-- <input type="number" class="w-[100px] rounded-[7px] bg-beige border-1 border-[#DCD9D2] ring-inset " name="amount_contribute" id="amount_contribute" placeholder="50€"> --}}
                            <div class="relative">
                                <input autocomplete="off" inputmode="numeric" placeholder="40" class="h-10 input block pr-7 w-[100px] rounded-[7px] bg-beige border-1 border-[#DCD9D2]">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm">€</span>
                                </div>
                            </div>
                            <x-primary-button>Contribuer</x-primary-button>
                        </div>
                    </div>

                    <div class=" flex flex-col gap-[10px] bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <p class="text-[#505050] text-[16px] font-medium ">
                            <span class="text-vertPoudre">Laura et Nico</span>

                            ont choisi une liste de produit qui leur fera plaisir vous pouvez contribuer sur les produits de votre choix                        </p>

                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
