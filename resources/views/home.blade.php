<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TDL</title>
    <link rel="icon" type="image/svg" sizes="32x32" href="{{ asset('icon-tdl.svg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">


    <!-- Styles -->

    <!-- Script -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>


    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>

            {{-- <div class="">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">

                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 light:text-gray-400 light:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 light:text-gray-400 light:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 light:text-gray-400 light:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
       --}}
    <x-navbar/>

    <header class="container_header">
        <div class="header_text">
            <h1 class="text-black">Créez et partagez <br> votre <span class="text-[#FF91B2]">liste de <br> naissance</span> </h1>
            <p class="text-black">Des envies comblées pour une naissance inoubliable</p>
            <div class="group_btn">
                {{-- <button class="bg-[#FF91B2] text-white px-7 py-2 rounded-[15px] hover:bg-[#9CC4B9]">Créer ma liste de
                    naissance</button> --}}
                <x-btn-style>Créer ma liste de naissance</x-btn-style>
                <x-btn-style2>Un exemple</x-btn-style2>


            </div>


        </div>
        <div class="header_img">
            <img src="{{ asset('img/circle header.png') }}" alt="img header">

        </div>

    </header>

    <section class="mySection">

        <div class="section_one">
            <div class="cards_img">
                <img src="{{ asset('img/nihal-karkala-M5aSbOXeDyo-unsplash.jpg') }}" class="imgFirst" alt="img kids">

                <div class="imgBottom">
                    <img src="{{ asset('img/kids-me-germany-Zzgmde4_lYU-unsplash.jpg') }}" alt="img peluche">
                    <img src="{{ asset('img/taisiia-shestopal-k1tgnIUZ_CM-unsplash.jpg') }}" alt="img jogging kids">
                </div>


            </div>

            <div class="card_text">
                <h2>Faites votre liste de souhait</h2>
                <p>Cherchez et ajoutez les articles bébé dans le <br> boutique de votre choix</p>
            </div>


        </div>
    </section>

    <section id="one" class="section_two">
        <h2>Comment ça marche ?</h2>
        <p>Toutes vos envies sur une seule liste tout doux </p>
        <div class="content_two flex flex-row flex-wrap justify-between p-[60px]">

            <x-card-style1 color="#F3C6A7" >

                <h3 class="text-[20px] font-bold leading-[3rem]">Créez votre liste</h3>

                <p class="text-start text-[13px]">
                    En un clic vous avez  accès tous les options mis en place pour vous permettre de <span class="text-[#FF91B2]">créez vos listes</span>.
                    <br> <br>
                    Rendez votre liste de naissance <span class="text-[#FF91B2]">unique</span>  en personnalisant le thème, les couleurs, la photo de couverture, votre photo de profil
                </p>
                <span class="hover:bg-[#020817]  p-[8px] rounded-lg flex items-center">
                    @svg('TaskList', ['width'=>30, 'height'=>30, 'fill'=>'#ff91b2'])
                </span>
            </x-card-style1>

            <x-card-style1 color="#9cc4b9">

                <h3 class="text-[20px] font-bold leading-[3rem]">Ajoutez vos envies vous</h3>

                <p class="text-start text-[13px]">
                    Ajoutez des produits des <span class="text-[#FF91B2]">boutiques de votre choix</span>. Vous avez une larges choix sur la marque et <span class="text-[#FF91B2]">vos envies</span>  alors profitez en.
                </p>

                <span class="bg-[#9cc4b9] p-[8px] rounded-lg flex items-center">
                    @svg('wishList', ['width'=>30, 'height'=>30])
                </span>
            </x-card-style1>

            <x-card-style1 color="#FF91B2">

                <h3 class="text-[20px] font-bold leading-[3rem]">Partagez votre liste</h3>

                <p class="text-start text-[13px]">
                Puis <span class="text-[#FF91B2]">partagez la à votre entourage</span>, avec la <span class="text-[#FF91B2]">cagnotte</span>  en ligne mis en place.
                <br> <br> Vos proches peuvent participer facilement sans quitter votre liste à l'achat
                des produits et <span class="text-[#FF91B2]">financer</span>  à plusieurs les gros achats. C'est simple pour eux comme pour vous.
                </p>
                <span class="bg-[#FF91B2] p-[8px] rounded-lg flex items-center">
                    @svg('share', ['width'=>30, 'height'=>30])
                </span>
            </x-card-style1>



        </div>
    </section>

    <div class="section_three relative">
        <div class="barr w-[100px] h-[807px] bg-[#FF91B2] absolute origin-center rotate-45 top-[-29%] left-[15%]"></div>

        <div class="content_three flex flex-row pl-[60px] pr-[60px] justify-between items-center ">
            <div class="text  z-[1]">
                <h2 class="mb-[20px]">Une liste intuitive pour tous</h2>
                <p>Chacun de nous s’est une fois posé ces questions, que vais je acheter pour  <strong>l’arriver</strong> de mon bébé? quels <strong>marques</strong>  est le mieux? est ce que mon <strong>budget</strong>  me permet de faire tous ces achats? Et <strong> si j’ai des produits en doublons?</strong> <br> <br>

                    avec <strong> Tout Doux Liste</strong> vous n’aurez plus à vous posez ces questions, c’est le site qui vous <strong> permet d’organiser l’arriver de votre futur boutchou en regroupant vos envies sur une seule liste </strong> , avec les marques de votre choix. <br> <br>
                    Grâce à l’option <strong> cagnotte en ligne </strong> , vos proches pourront y participer soit sur l’achat d’un article ou en participant à la cagnotte. Ceci les permettra de ne plus se prendre la tête sur quel cadeau acheter et plus de risque de doublon.

                    Ce site est fait pour vous les parents afin de vous accompagner dans cette nouvelle aventure.</p>
            </div>

            <img src="{{asset("img/jigsaw-puzzle.png")}}" class="w-[35em]" alt="">
        </div>


    </div>

    <div class="section_four pt-[60px] pb-[60px]">
        <h2 class="text-center">Comment fonctionne la cagnotte</h2>

        <div class=" content_four flex flex-row items-center pr-[60px]">

                @svg("cagnotte", ['width'=>'85em'])



            <div class=" text_four flex flex-col items-start gap-[40px]">
                <p>Vos proche participe facilement à votre liste de naissance par carte bancaire ou <span class="text-[#FF91B2]">PayPal</span> vous permettant d’augmenter les contributions que vous recevez. <br> <br>

                    Vous restez maître de vos achats en disposant de l’argent comme vous le souhaitez.

                    Le retrait de la cagnotte se fait par<span class="text-[#FF91B2]"> virement</span> sur votre compte en banque (gratuitement) et autant de fois que vous le souhaitez. <br> <br>

                    Avec la cagnotte de naissance, fini les distributions quasi quotidiennes de
                    paquets à votre domicile ou le stress de ne pas savoir si l'une de vos envies a vraiment été achetée.</p>

                <x-btn-style>Créer ma liste maintenant</x-btn-style>

            </div>
        </div>

    </div>

    <div class="section_five flex flex-row p-[60px] gap-[20px] flex-wrap">
        <div class="flex flex-col gap-[20px]">
            <h3 class="text-[#9cc4b9] text-[25px] font-bold">L’essentiel pour votre <br> <span class="text-[#FF91B2]">futur bébé</span> en un seul <br> endroit</h3>
            <p>Composer une liste c'est aussi l'assurance de ne <br> pas se voir offrir des cadeaux inutiles.</p>
        </div>

            <div class=" flex flex-row justify-center gap-[28px] flex-wrap">
                <img src="{{asset('img/taisiia-shestopal-8IIZAnpRX30-unsplash.jpg')}}" alt="" class="w-[220px] h-[250px] rounded-[20px] object-cover">
                <img src="{{asset('img/olimpia-campean-H3DAAAtF670-unsplash.jpg')}}" alt="" class="w-[220px] h-[250px] rounded-[20px] object-cover">
                <img src="{{asset('img/taisiia-shestopal-4CBQolocROI-unsplash.jpg')}}" alt="" class="w-[220px] h-[250px] rounded-[20px] object-cover">

            </div>



    </div>





    <x-footer/>


    <script>
        const navLinks = document.querySelector('.nav-links');

        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu';
            navLinks.classList.toggle('top-[9%]');
        }
    </script>


</body>

</html>
