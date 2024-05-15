<div class="bg-[#F9F8F8] rounded-[15px]">

    <img src="{{$image}}" class="h-[18em] w-[16em] object-cover rounded-t-[15px]" alt="">


    <div class="flex flex-row justify-around items-center">
        <div class="">
            <h4 class="font-[900] text-[1em]"> {{$marque}} </h4>
            <h4 class="font-[900] text-[1em]">{{$price}} </h4>
            <p class="text-[#919090] text-[12px]">
                {{$titleProduct}}
            </p>

        </div>

        <div>
            <label for="{{$titleProduct}}" class="cursor-pointer rounded bg-black px-4 py-2 text-white active:bg-slate-400">
                voir
            </label>
        </div>

        <input type="checkbox" id="{{$titleProduct}}" class="peer fixed appearance-none opacity-0">


        <label for="{{$titleProduct}}" class="pointer-events-none invisible fixed inset-0 flex cursor-pointer
        items-center justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0
        transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible
        peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


        <label
            for="{{$titleProduct}}"
            class="flex flex-col p-[20px] gap-[20px] max-h-[calc(100vh - 5em)] h-fit scale-90 overflow-y-auto
            overscroll-contain rounded-md bg-white p-6 text-black shadow-2xl transition">


            <h2 class="title"> {{$title}} </h2>

            <div class="btnGroup flex flex-row flex-wrap gap-[20px]">
                <button class="ring-1 ring-[#FF91B2] text-[#FF91B2] px-[10px] py-[5px] rounded-[5px]">General info</button>
                <button class=" text-[#9A9CA5] px-[10px] py-[5px] rounded-[5px]">Description</button>
                <button class=" text-[#9A9CA5] px-[10px] py-[5px] rounded-[5px]">Composition</button>

            </div>
            <hr>

            <div class="productInfo flex flex-row flex-wrap gap-[40px]">
                <div class="img flex flex-col gap-[20px]">
                    <img src="{{$image}}" class="rounded-[10px] w-[300px]"
                        alt="image product">
                    <div class="minImg flex flex-row gap-[20px]">
                        <img src="{{$image}}"
                            class="rounded-[7px] w-[80px] h-[80px] ring-1 ring-[#FF91B2] object-cover" alt="">
                    </div>

                </div>

                <div class="infoText flex flex-col gap-[20px]">
                    <h3 class="text-[#FF91B2] text-[20px] font-[700]">{{$marque}}</h3>
                    <h3 class="text-[#000] text-[18px] font-[700]">{{$title}}</h3>

                    <h3 class="text-[#FF4242] text-[25px] font-[700]">{{$price}}</h3>
                    {{-- <div class="otherProduct flex flex-col gap-[10px]">
                        <p>Couleur: Rose</p>
                        <div class="minImg flex flex-row flex-wrap gap-[20px]">
                            <img src="{{ asset('img/0426123_800.jpg') }}"
                                class="rounded-[7px] w-[90px] h-[90px] ring-1 ring-[#FF91B2] object-cover" alt="">
                            <img src="{{ asset('img/0426125_800.jpg') }}"
                                class="rounded-[7px] w-[90px] h-[90px] object-cover" alt="">
                            <img src="{{ asset('img/0426124_800.jpg') }}"
                                class="rounded-[7px] w-[90px] h-[90px] object-cover " alt="">
                        </div>
                    </div> --}}

                    {{-- <div class="size flex flex-col gap-[10px]">
                        <p>Size</p>
                        <select name="" id=""
                            class="rounded-[4px] h-[40px] ring-1 ring-[#D7DADD] text-[#9A9CA5]">
                            <option value="">taille naissance</option>
                        </select>
                    </div> --}}

                    <div class="btnFinish flex flex-row flex-wrap gap-[20px]">
                        <a href="#">
                            <button class="bg-[#FF91B2] text-[#FFF] text-[10px] px-[15px] py-[10px] rounded-[20px]">Ajouter à ma
                                liste
                            </button>
                        </a>

                        <a href="{{$url}}">
                            <button
                                class="flex flex-row gap-[10px] bg-[#F6F3EC] text-[10px] text-[#FF91B2] px-[15px] py-[10px] rounded-[20px]">
                                @svg('shop', ['width' => '20px', 'height' => '20px', 'stroke' => '#FF91B2']) Acheter directement
                            </button>
                        </a>

                        <a href="#">
                            <button
                                class="flex flex-row gap-[10px] ring-1 ring-[#FF91B2] text-[10px] text-[#FF91B2] px-[15px] py-[10px] rounded-[20px]">@svg('fav', ['width' => '20px', 'height' => '20px', 'stroke' => '#FF91B2'])
                                Favori
                            </button>
                        </a>
                    </div>

                </div>
            </div>

        </label>
        </label>

    </div>

</div>







