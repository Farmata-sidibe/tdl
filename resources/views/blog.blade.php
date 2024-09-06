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
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <!-- Styles -->

    <!-- Script -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>



    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

</head>
<body>
    <div class="">
        <form action="">
            <h1>inscrivez vous</h1>
            <div class="createUser">
                <div>
                    <label for="nom">Votre nom complet</label>
                    <input type="text">
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="email">
                </div>

                <div>
                    <label for="password">Votre mot de passe</label>
                    <input type="password">
                </div>
                <a href="#crealite" class="btnnext">deuxieme étape créer ma liste</a>
            </div>
            <div class="createListe hidden" id="crealite">
            <h2>Creer votre liste</h2>

                <div>
                    <label for="titre">titre liste</label>
                    <input type="text">
                </div>
                <div>
                    <label for="date-terme">Date du terme</label>
                    <input type="text">
                </div>

                <div>
                    <label for="conjoint">Votre conjoint</label>
                    <input type="text">
                </div>
            </div>
            <button class="submitAccount hidden">envoyer</button>
        </form>
    </div>

    <script>
        let btncreateuser = document.querySelector(".btnnext");
        let btnSubmit = document.querySelector(".submitAccount");

        let blocCreateuser = document.querySelector(".createUser");
        let blocCreateliste = document.querySelector(".createListe");

        btncreateuser.onclick = function () {
            blocCreateliste.style.display = "flex";
            blocCreateuser.style.display = "none";
            btnSubmit.style.display = "flex";
        };


    </script>
</body>
</html>
