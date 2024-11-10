
@extends('layouts.app')
@section('content')

    <header class=" bg-white relative overflow-hidden">
    <div class="bg-white flex relative z-20 items-center overflow-hidden">
        <div class="container mx-auto px-6 flex relative py-16">
            <div class="sm:w-2/3 lg:w-4/5 flex flex-col justify-center relative z-20">
                <span class="w-20 h-2 bg-rose mb-12">
                </span>
                <h1
                    class=" uppercase text-6xl sm:text-8xl font-bold flex flex-col items-start leading-none text-gray-800">
                    Créez,
                    <span class="text-5xl sm:text-7xl ">
                        Partagez
                    </span>
                </h1>
                <p class="text-sm sm:text-base text-gray-700">
                    votre liste de naissance. Des envies comblées pour une naissance inoubliable
                </p>
                <div class="flex mt-8">
                    <a href="/register"
                        class=" font-semibold py-2 px-4 rounded-lg bg-rose border-2 border-transparent text-white text-md mr-4 hover:bg-rose">
                        Créez ma liste
                    </a>
                    <a href="#"
                        class="font-semibold py-2 px-4 rounded-lg bg-transparent border-2 border-rose text-rose hover:bg-rose hover:text-white text-md">
                        Un exemple
                    </a>
                </div>
            </div>
            <div class="hidden lg:block lg:w-3/5 relative">
                <img src="{{ asset('img/circle header.png') }}" class="max-w-xs md:max-w-sm m-auto"/>
            </div>
        </div>
    </div>
</header>

    <section class="bg-beige ">
        <div class="max-w-screen-xl 2xl:max-w-screen-3xl px-8 md:px-12 mx-auto py-16 lg:py-32 space-y-24 flex flex-col justify-center">
         <div class="flex flex-col sm:flex-row mx-auto">
          <!--- Starts component -->
          <a href="#_">
            <img src="https://images.unsplash.com/photo-1615766553246-9147b6d50e90?q=80&amp;w=2670&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl  rotate-6 hover:rotate-0 duration-500 hover:-translate-y-12 h-full w-full object-cover hover:scale-150 transform origin-bottom" alt="#_">
          </a>
          <a href="#_">
            <img src="https://images.pexels.com/photos/27661864/pexels-photo-27661864/free-photo-of-mignon-jouer-colore-creativite.jpeg?q=80&amp;w=2672&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D " class="rounded-xl  -rotate-12 hover:rotate-0 duration-500 hover:-translate-y-12 h-full w-full object-cover hover:scale-150 transform origin-bottom" alt="#_">
            </a>
            <a href="#_">
                <img src="https://images.pexels.com/photos/4964482/pexels-photo-4964482.jpeg?q=80&amp;w=2670&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl  rotate-6 hover:rotate-0 duration-500 hover:-translate-y-12 h-full w-full object-cover hover:scale-150 transform origin-bottom" alt="#_">
            </a>
            <a href="#_">
                <img src="https://images.pexels.com/photos/9214902/pexels-photo-9214902.jpeg?q=80&amp;w=2574&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl  -rotate-12 hover:rotate-0 duration-500 hover:-translate-y-12 h-full w-full object-cover hover:scale-150 transform origin-bottom" alt="#_">
            </a>
          <!--- Ends component -->
         </div>
        </div>
    </section>

    <section id="one" class="section_two">
        <h2 class="text-center text-[2em] lg:text-[3em] mt-10 font-bold">Comment ça marche ?</h2>
        <p class="text-center">Toutes vos envies sur une seule liste tout doux </p>
        <div class="content_two flex flex-row flex-wrap gap-[20px] justify-between p-[60px]">

            <x-card-style1 color="#F3C6A7" >

                <span class="grid h-20 w-20 place-items-center rounded-full bg-[#F3C6A7] transition-all duration-300 group-hover:bg-[#F3C6A7]">
                    @svg('TaskList', ['width'=>30, 'height'=>30, 'fill'=>'#fff'])
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                    <p class="text-justify">En un clic vous avez  accès tous les options mis en place pour vous permettre de <span class="font-bold">créez vos listes</span>.
                        Rendez votre liste de naissance <span class="font-bold">unique</span>  en personnalisant le thème, les couleurs, la photo de couverture, votre photo de profil.</p>
                </div>
            </x-card-style1>

            <x-card-style1 color="#9cc4b9">

                <span class="grid h-20 w-20 place-items-center rounded-full bg-[#9cc4b9] transition-all duration-300 group-hover:bg-[#9cc4b9]">
                    @svg('wishList', ['width'=>30, 'height'=>30, 'fill'=>'#fff'])
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                    <p class="text-justify">Ajoutez des produits des <span class="font-bold">boutiques de votre choix</span>. Vous avez une larges choix sur la marque et <span class="font-bold">vos envies</span>  alors profitez en.</p>
                </div>
            </x-card-style1>

            <x-card-style1 color="#FF91B2">

                <span class="grid h-20 w-20 place-items-center rounded-full bg-[#FF91B2] transition-all duration-300 group-hover:bg-[#FF91B2]">
                    @svg('share', ['width'=>30, 'height'=>30, 'fill'=>'#fff'])
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                    <p class="text-justify">
                        Puis <span class="font-bold">partagez la à votre entourage</span>, avec la <span class="font-bold">cagnotte</span>  en ligne mis en place.
                        Vos proches peuvent participer facilement sans quitter votre liste à l'achat
                        des produits et <span class="font-bold">financer</span>  à plusieurs les gros achats. C'est simple pour eux comme pour vous.
                    </p>
                </div>
            </x-card-style1>



        </div>
    </section>

    <section>
        <div class="section_three sticky top-0 h-[100vh] z-1">
            <div class="barr w-[100px] h-[960px] bg-[#FF91B2] absolute origin-center rotate-45 top-[-32%] left-[15%]"></div>

            <div class="flex flex-col-reverse lg:flex-row lg:px-[60px] px-5  justify-between items-center ">
                <div class="text  z-[1]">
                    <h2 class="mb-[20px] text-[2em] lg:text-[3em] mt-10 font-bold">Une liste intuitive pour tous</h2>
                    <p>Chacun de nous s’est une fois posé ces questions, que vais je acheter pour  <strong>l’arriver</strong> de mon bébé? quels <strong>marques</strong>  est le mieux? est ce que mon <strong>budget</strong>  me permet de faire tous ces achats? Et <strong> si j’ai des produits en doublons?</strong> <br> <br>

                        avec <strong> Tout Doux Liste</strong> vous n’aurez plus à vous posez ces questions, c’est le site qui vous <strong> permet d’organiser l’arriver de votre futur boutchou en regroupant vos envies sur une seule liste </strong> , avec les marques de votre choix. <br> <br>
                        Grâce à l’option <strong> cagnotte en ligne </strong> , vos proches pourront y participer soit sur l’achat d’un article ou en participant à la cagnotte. Ceci les permettra de ne plus se prendre la tête sur quel cadeau acheter et plus de risque de doublon.

                        Ce site est fait pour vous les parents afin de vous accompagner dans cette nouvelle aventure.</p>
                </div>

                <div class="">
                    <img src="{{asset("img/jigsaw-puzzle.png")}}" class=" w-[50vw] lg:w-[100vw]" alt="">
                </div>
            </div>


        </div>

        <div class="z-2 section_four pt-5 lg:pt-[60px] lg:pb-[60px] sticky top-0 h-[100vh] bg-white justify-between items-center">
            <h2 class="text-center text-[2em] lg:text-[3em] mt-10 font-bold">Comment fonctionne la cagnotte</h2>

            <div class="flex flex-col lg:flex-row items-center lg:pr-[60px] justify-center">
                <div class="hidden md:block lg:block">
                    @svg("cagnotte", ['width'=>'50vw'])
                </div>

                <div class=" flex flex-col items-start gap-[40px] px-5 w-full lg:w-3/4">
                    <p>Vos proche participe facilement à votre liste de naissance par carte bancaire ou <span class="text-[#FF91B2]">PayPal</span> vous permettant d’augmenter les contributions que vous recevez. <br> <br>

                        Vous restez maître de vos achats en disposant de l’argent comme vous le souhaitez.

                        Le retrait de la cagnotte se fait par<span class="text-[#FF91B2]"> virement</span> sur votre compte en banque (gratuitement) et autant de fois que vous le souhaitez. <br> <br>

                        Avec la cagnotte de naissance, fini les distributions quasi quotidiennes de
                        paquets à votre domicile ou le stress de ne pas savoir si l'une de vos envies a vraiment été achetée.</p>

                    <x-btn-style>Créer ma liste maintenant</x-btn-style>

                </div>
            </div>

        </div>
        <!-- z-3 section_five flex flex-col lg:flex-row p-[60px] gap-40 lg:gap-[20px] justify-between md:justify-between lg:justify-between flex-wrap sticky top-0 h-[100vh] bg-beige -->
        <div class="z-3 section_five flex flex-col lg:flex-row p-[60px] justify-between md:justify-between lg:justify-between flex-wrap sticky top-0 h-[100vh] bg-beige">
            <div class="flex flex-col gap-[20px]">
                <h3 class="text-[#9cc4b9] text-[1.8em] lg:text-[2em] mt-10 font-bold">L’essentiel pour votre <br> <span class="text-[#FF91B2]">futur bébé</span> en un seul <br> endroit</h3>
                <p>Composer une liste c'est aussi l'assurance de ne <br> pas se voir offrir des cadeaux inutiles.</p>
            </div>

            <div class="container3D">
                <input type="radio" name="slide" id="c1" checked>
                <label for="c1" class="card3D bg-[url('{{asset('img/anime5.jpg')}}')]">
                    <div class="row">
                        <div class="icon">1</div>
                        <div class="description">
                            <h4>Winter</h4>
                            <p>Winter has so much to offer -
                             creative activities</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c2" >
                <label for="c2" class="card3D bg-[url('{{asset('img/anime1.jpg')}}')]">
                    <div class="row">
                        <div class="icon">2</div>
                        <div class="description">
                            <h4>Digital Technology</h4>
                            <p>Gets better every day -
                             stay tuned</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c3" >
                <label for="c3" class="card3D bg-[url('{{asset('img/anime3.jpg')}}')]">
                    <div class="row">
                        <div class="icon">3</div>
                        <div class="description">
                            <h4>Globalization</h4>
                            <p>Help people all over the world</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c4" >
                <label for="c4" class="card3D bg-[url('{{asset('img/anime8.jpg')}}')]">
                    <div class="row">
                        <div class="icon">4</div>
                        <div class="description">
                            <h4>New technologies</h4>
                            <p>Space engineering becomes
                             more and more advanced</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c5" >
                <label for="c5" class="card3D bg-[url('{{asset('img/anime6.jpg')}}')]">
                    <div class="row">
                        <div class="icon">5</div>
                        <div class="description">
                            <h4>New technologies</h4>
                            <p>Space engineering becomes
                             more and more advanced</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c6" >
                <label for="c6" class="card3D bg-[url('{{asset('img/anime2.jpg')}}')]">
                    <div class="row">
                        <div class="icon">6</div>
                        <div class="description">
                            <h4>New technologies</h4>
                            <p>Space engineering becomes
                             more and more advanced</p>
                        </div>
                    </div>
                </label>
                <input type="radio" name="slide" id="c7" >
                <label for="c7" class="card3D bg-[url('{{asset('img/anime7.jpg')}}')]">
                    <div class="row">
                        <div class="icon">7</div>
                        <div class="description">
                            <h4>New technologies</h4>
                            <p>Space engineering becomes
                             more and more advanced</p>
                        </div>
                    </div>
                </label>
            </div>
        </div>


    <div class="bg-White h-[20vh] z-4 w-full"></div>
    </section>





@endsection
