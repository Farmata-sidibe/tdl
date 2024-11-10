<div class="absolute bg-[#020817] w-[100%] flex flex-col p-[60px] gap-[20px] ">
    <div class="flex flex-col gap-[20px] items-center">
        <h3 class="text-[#ffffff] text-[25px] font-bold">La parfaite liste de naissance</h3>
        <p class="text-[#ffffff] text-[0.90em]" >Tout Doux Liste pour les futurs parents qui savent ce qu’ils veulent et ceux qui ne le savent pas encore. <br> Ne perdez plus de temps créez dés maintenant votre liste rapidement et en toutes sécurité</p>
        <button class="rounded-[30px] ring-2 ring-[#FF91B2] text-[#FF91B2] px-[20px] py-[10px]">Les indispensables d'une liste de naissance</button>

    </div>

    <div class="w-[100%] h-[.5px] bg-[gray]"></div>
    <div class="flex flex-row flex-wrap justify-between items-center gap-[20px]">
        <a href="/" class="">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 light:text-gray-200" />
        </a>

        <div class="flex flex-col items-start">
            <h3 class="text-[1.3em] text-rose font-semibold">Info pratiques</h3>
            <a href="/" class="text-[white] hover:text-rose text-[0.90em]">Qui sommes nous ?</a>
            <a href="#" class="text-[white] hover:text-rose text-[0.90em]">Exemple de liste</a>
            <a href="#" class="text-[white] hover:text-rose text-[0.90em]">Contactez-nous</a>
        </div>

        <div class="flex flex-col items-start">
            <h3 class="text-[1.3em] text-rose font-semibold">Conditions</h3>
            <a href="/mentions-legales" class="text-[white] hover:text-rose text-[0.90em]">Les mentions légales</a>
            <a href="/politique-confidentialite" class="text-[white] hover:text-rose text-[0.90em]">Politique de confidentialités</a>
            <a href="#" class="text-[white] hover:text-rose text-[0.90em]">Conditions Générales d’Utilisation</a>

        </div>

        <div class="flex flex-row flex-wrap gap-[10px] items-center">
            @svg('facebook', ['fill'=>'white'])
            @svg('linkedin', ['fill'=>'white'])
            @svg('twitter', ['fill'=>'white'])

        </div>

    </div>
    <div class="text-center">
        <p class="text-[#ffffff] text-[0.90em]">© 2024 Farmata SIDIBE. Tous droits réservés.</p>
    </div>

</div>
