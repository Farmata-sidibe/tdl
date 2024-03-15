<nav class="nav_user  w-[100%] h-[50px]   mx-auto">
    <div class="containe_nav_user flex justify-between items-center px-[50px] pt-[10px]">
        <img src="{{asset('img/jonathan-borba-RWgE9_lKj_Y-unsplash.jpg')}}" class="w-[40px] h-[40px] object-cover rounded-[50%]" alt="pp user">
        <div class="link bg-[#fff] h-[40px] px-[15px] rounded-[30px] flex flex-row justify-centen items-center gap-[30px]">
            <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050]">
                @svg('deposit', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                Cagnotte
            </a>
            <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050]">
                @svg('addLink', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                Ajouter un produit
            </a>
            <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050]">

                @svg('share', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])

                Partager ma liste
            </a>
        </div>
        <div class="link bg-[#fff] h-[40px] px-[15px] rounded-[30px] flex flex-row justify-centen items-center gap-[20px]">
            <div class="flex flex-row items-center bg-[#F6F3EC] rounded-[20px] px-[10px] h-[30px]">
            @svg('search', ['fill'=>'#9E9C9C', 'width'=>18, 'height'=>18])
                <input type=search name=q aria-label="Rechercher un produit" placeholder="Rechercher un prooduit" class="text-[#9E9C9C] bg-[#F6F3EC] rounded-[20px] text-[12px]"/>
            </div>

            <div class="flex flex-row items-center gap-[20px]">
                @svg('notif', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                @svg('fav', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])
                @svg('params', ['width'=>25, 'height'=>25, 'fill'=>'#505050'])

            </div>
        </div>
    </div>

    <div class="containe_responsive flex flex-col gap-[12px] px-[50px] pt-[10px]">
        <div class=" flex flex-row justify-between">

            <div class="link  flex flex-row justify-centen items-center w-[125px] justify-between">

                <a href="#" class=" text-[#505050] bg-[#fff] px-[5px] py-[5px] rounded-[50%]">
                    @svg('deposit', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a>
                <a href="#" class="text-[#505050] bg-[#fff] px-[5px] py-[5px] rounded-[50%]">
                    @svg('addLink', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a>
                <a href="#" class="text-[#505050] bg-[#fff] px-[5px] py-[5px] rounded-[50%]">

                    @svg('share', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])

                </a>
            </div>


            <div class="flex flex-row items-center w-[125px] justify-between">
                <a href="#" class="text-[#505050] bg-[#fff] px-[5px] py-[5px] rounded-[50%]">
                    @svg('notif', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a>
                <a href="#" class="text-[#505050] bg-[#fff] px-[5px] py-[5px] rounded-[50%]">
                    @svg('fav', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a> <a href="#" class="text-[#505050] bg-[#fff] px-[5px] py-[5px] rounded-[50%]">
                    @svg('params', ['width'=>'1em', 'height'=>'1em', 'fill'=>'#505050'])
                </a>

            </div>
        </div>

        <div class="flex flex-row items-center bg-[#fff] rounded-[20px] px-[10px] h-[30px] w-[100%]">
            @svg('search', ['fill'=>'#9E9C9C', 'width'=>18, 'height'=>18])
                <input type=search name=q aria-label="Rechercher un produit" placeholder="Rechercher un prooduit" class="text-[#9E9C9C] rounded-[20px] text-[12px] w-[100%]"/>
        </div>
    </div>
</nav>
