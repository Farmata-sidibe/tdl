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

    <!-- Styles -->

    <!-- Script -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>



    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

</head>
<body>
    {{-- <div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">

            <div>
                <label for="tw-modal" class="cursor-pointer rounded bg-black px-8 py-4 text-white active:bg-slate-400">
                    Open modal1
                </label>
            </div>


            <input type="checkbox" id="tw-modal" class="peer fixed appearance-none opacity-0">


            <label for="tw-modal" class="pointer-events-none invisible fixed inset-0 flex cursor-pointer
            items-center justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0
            transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible
            peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


            <label for="" class="max-h-[calc(100vh - 5em)] h-fit max-w-lg scale-90 overflow-y-auto
            overscroll-contain rounded-md bg-white p-6 text-black shadow-2xl transition">
                <h3 class="text-lg font-bold">Modal opened 1</h3>
                <p class="py-4">consectetur adipisicing elit. Deserunt ipsum delectus rerum provident quasi consequuntur obcaecati harum est possimus iste accusantium officiis debitis illum itaque vel modi animi, tenetur id. </p>
            </label>
            </label>
    </div> --}}

    {{-- <div class="">

        <div>
            <label for="tw1-modal" class="cursor-pointer rounded bg-black px-8 py-4 text-white active:bg-slate-400">
                Open modal2
            </label>
        </div>


        <input type="checkbox" id="tw1-modal" class="peer fixed appearance-none opacity-0">


        <label for="tw1-modal" class="pointer-events-none invisible fixed inset-0 flex cursor-pointer
        items-center justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0
        transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible
        peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">


        <label for="tw1-modal" class="max-h-[calc(100vh - 5em)] h-fit max-w-lg scale-90 overflow-y-auto
        overscroll-contain rounded-md bg-white p-6 text-black shadow-2xl transition">
            <h3 class="text-lg font-bold">Modal opened 2</h3>
            <p class="py-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ipsum delectus rerum provident quasi consequuntur obcaecati harum est possimus iste accusantium officiis debitis illum itaque vel modi animi, tenetur id. </p>
        </label>
        </label>
    </div> --}}

   {{-- <x-sidebar listeId="{{ route('listes.edit', $liste->id) }}" /> --}}



</body>
</html>
