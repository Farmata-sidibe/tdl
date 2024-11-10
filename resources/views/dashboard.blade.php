@extends('layouts.app')
@section('content')

    <div class="py-12 bg-beige">

        <div
            class="max-w-[85rem] mx-auto sm:px-6 lg:px-8 flex flex-col-reverse items-center lg:justify-between lg:flex-row lg:items-start">
            <!-- Modal pour renseigner l'email PayPal -->
            @if ($showPaypalPopup)
                <x-modal name="Renseignez l'email de votre paypal" show="true">
                    <main id="content" role="main" class="w-full  max-w-md mx-auto p-6">
                        <div class="mt-7 bg-white  rounded-xl shadow-lg light:bg-gray-800 border-2 border-indigo-300">
                            <div class="p-4 sm:p-7">
                                <div class="text-center">
                                    <h1 class="block text-2xl font-bold text-gray-800">Renseignez votre email PayPal</h1>
                                </div>

                                <div class="mt-5">
                                    <form id="paypalForm" action="{{ route('savePayPalEmail') }}" method="POST">
                                        @csrf
                                        <div class="grid gap-y-4">
                                            <div>
                                                <label for="paypal_email" class="block text-sm font-bold ml-1 mb-2 ">Votre
                                                    adresse email</label>
                                                <div class="relative">
                                                    <input type="email" id="paypal_email" name="paypal_email"
                                                        class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                                        required aria-describedby="email-error">
                                                </div>
                                                <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include
                                                    a valid email address so we can get back to you</p>
                                            </div>

                                            <button type="submit"
                                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-[#FF91B2] text-white hover:bg-[black] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm light:focus:ring-offset-gray-800">
                                                Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                </x-modal>
            @endif
            <!-- barre left -->
            <div
                class="w-[100vw] lg:w-[68vw] flex flex-col gap-[20px] px-[5px] py-[5px] bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @php
                    $coverImage = Storage::url($user->cover_image)
                        ? asset('profiles/default-cover.jpg')
                        : Storage::url($user->cover_image);
                @endphp
                <div
                    class="bg-[url('{{ $coverImage }}')] h-[350px] bg-fixed bg-cover bg-center bg-no-repeat sm:rounded-lg flex items-end px-[25px] py-[15px]">
                    <h3 class="text-[#fff] text-[20px] font-medium">
                        {{ $user->name }} & {{ $liste->partner }}
                    </h3>
                </div>
                {{-- a afficher en mobile --}}
                <div class="flex flex-col  items-center justify-center gap-[10px] lg:hidden">
                    <h2 class=" text-center text-[20px] text-[#9CC4B9] font-bold">
                        {{ $liste->title }}
                    </h2>
                    <h5 class="text-[15px] text-[#000] font-medium">Naissance prévue le</h5>
                    <h4 class="text-[18px] text-[#FF91B2] font-semibold">
                        {{ $liste->dateBirth->format('d/m/Y') }}

                    </h4>
                </div>

                <div class="flex justify-between items-center pt-[10px] lg:hidden">
                    <!-- Affichage du pourcentage de progression -->
                    <span id="current-progress" class="text-sm font-medium text-[#9CC4B9] light:text-white">
                        {{ number_format($percentage, 2) }}%
                    </span>
                    <div class="relative flex items-center">
                        <!-- Bouton de décrément -->
                        <button type="button" id="decrement-button" class="flex-shrink-0 bg-vertPoudre hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                            <svg class="w-2.5 h-2.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                        </button>

                        <!-- Input pour le total_amount -->
                        <input type="number" id="total_amount" class="flex-shrink-0 text-vertPoudre border-0 bg-transparent text-sm font-medium focus:outline-none focus:ring-0 max-w-[5rem] text-center" value="{{ $cagnotte->total_amount ?? 3000 }}" min="0" required />

                        <!-- Bouton d'incrément -->
                        <button type="button" id="increment-button" class="flex-shrink-0 bg-vertPoudre hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                            <svg class="w-2.5 h-2.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Barre de progression -->
                <div class="w-full bg-[#F6F3EC] rounded-full h-2.5 light:bg-[#F6F3EC] lg:hidden">
                    <div class="progress-bar bg-[#9CC4B9] h-2.5 rounded-full" style="width: {{ $percentage }}%;"></div>
                </div>

                <div class="flex flex-row flex-wrap items-center gap-[10px] justify-center lg:hidden">
                    @if (isset($liste) && $liste)
                        <input type="text" id="liste-url" value="{{ route('liste.showBySlug', $liste->uuid) }}" readonly
                            class="hidden form-control mb-2">
                        <x-primary-button id="copy-button" class="bg-vertPoudre" onclick="copyToClipboard()">
                            Partager ma liste
                        </x-primary-button>
                    @endif
                    <a href="/product" class="">
                        <x-primary-button class="bg-[black]">Voir nos sélections de produits</x-primary-button>
                    </a>
                </div>
                {{--  --}}
                <div class="bg-[#9cc4b985] ring-1 ring-[#649D8C] h-auto sm:rounded-lg px-[20px] py-[10px]">

                    @if (!empty($liste->description))
                        <p class="text-[#505050] text-[16px] font-medium py-[5px]">
                            {{ $liste->description }}
                        </p>
                    @else
                        <p>Ajoutez un petit texte d'annonce pour vos proches.</p>
                    @endif
                </div>


                <div class="">
                    <div class="flex flex-row gap-[60px]">
                        <h4 class="btns active text-xl" id="envies">Mes envies</h4>
                        <h4 class="btns text-xl" id="donateurs">Les donateurs</h4>
                    </div>

                    <div class="envies flex flex-row mt-[20px] gap-[40px] flex-wrap">
                        @if ($liste && $liste->products->count() > 0)
                            @foreach ($liste->products as $product)
                                <x-card-wish id="{{ $product->pivot->id }}" image="{{ $product->pivot->img }}"
                                    marque="{{ $product->pivot->brand }}" price="{{ $product->pivot->price }}"
                                    title="{{ $product->pivot->title }}"
                                    titleProduct="{{ substr($product->pivot->title ?? '', 0, 20) }}{{ strlen($product->pivot->title ?? '') > 20 ? '...' : '' }}"
                                    reserved="{{ $product->pivot->reserved }}" />
                            @endforeach
                        @else
                            <a href="/product" class="text-center">
                                <x-primary-button class="bg-[black]">Ajoutez des produits dans votre
                                    liste</x-primary-button>
                            </a>
                        @endif
                    </div>

                    <div class="donateurs hidden flex-row justify-center gap-[40px] flex-wrap">

                        <section class="relative flex flex-col overflow-hidden">
                            <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-1">
                                <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-1">

                                    <div class="w-full max-w-3xl mx-auto">

                                        <!-- Vertical Timeline #1 -->
                                        <div class="-my-6">
                                            @if ($historique->count() > 0)
                                                @foreach ($historique as $entry)
                                                    <!-- Item #1 -->
                                                    {{-- Only show participant if status is paid or if it's a reservation --}}
                                                    @if (!isset($entry->status) || $entry->status === 'paid')
                                                        <div class="relative pl-8 sm:pl-32 py-6 group">
                                                            <!-- Purple label -->
                                                            <div class="font-medium text-rose mb-1 sm:mb-0">
                                                                @if (isset($entry->name))
                                                                    {{ $entry->name }}
                                                                @elseif(isset($entry->visitor_name))
                                                                    {{ $entry->visitor_name }}
                                                                @endif
                                                            </div>
                                                            <!-- Vertical line and timeline elements -->
                                                            <div
                                                                class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-0 before:h-full before:px-px before:bg-slate-300 sm:before:ml-[6.5rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-0 after:w-2 after:h-2 after:bg-rose after:border-4 after:box-content after:border-slate-50 after:rounded-full sm:after:ml-[6.5rem] after:-translate-x-1/2 after:translate-y-1.5">
                                                                <time
                                                                    class="sm:absolute left-0 translate-y-0.5 inline-flex items-center justify-center text-xs font-semibold uppercase w-20 h-6 mb-3 sm:mb-0 text-vertPoudre bg-emerald-100 rounded-full">
                                                                    {{ \Carbon\Carbon::parse($entry->date_contribution ?? $entry->due_date)->format('d/m/Y') }}
                                                                </time>
                                                                <div class="text-md font-bold text-slate-900">
                                                                    @if (isset($entry->amount))
                                                                        {{ number_format($entry->amount, 2) }} € contribué
                                                                    @elseif(isset($entry->product->title))
                                                                        Produit réservé : {{ $entry->product->title }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <!-- Content -->
                                                            <div class="text-slate-500">
                                                                @if (isset($entry->amount))
                                                                    {{ $entry->name }} a contribué un montant de
                                                                    {{ number_format($entry->amount, 2) }} € à la cagnotte.
                                                                @elseif(isset($entry->visitor_name))
                                                                    {{ $entry->visitor_name }} a réservé le produit
                                                                    "{{ $entry->product->title }}".
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p>Aucune réservation ni contribution.</p>
                                            @endif
                                        </div>
                                        <!-- End: Vertical Timeline #1 -->

                                    </div>

                                </div>
                            </div>
                        </section>

                    </div>

                    <div class="indispensables flex flex-row justify-center gap-[40px] flex-wrap"></div>
                </div>
            </div>

            <!-- barre right -->
            <div
                class="w-[22vw] hidden lg:block light:bg-gray-800 overflow-hidden sm:rounded-lg flex flex-row flex-wrap lg:flex-col lg:flex">
                <div class="text-gray-900 light:text-gray-100 flex flex-row lg:flex-col gap-[20px]">
                    <div class="bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <div class="flex flex-col items-center justify-center gap-[10px]">
                            <h2 class="text-center text-[20px] text-[#9CC4B9] font-bold">{{ $liste->title }}</h2>
                            <h5 class="text-[15px] text-[#000] font-medium">Naissance prévue le</h5>
                            <h4 class="text-[18px] text-[#FF91B2] font-semibold">{{ $liste->dateBirth->format('d/m/Y') }}
                            </h4>
                        </div>

                        <div class="flex justify-between items-center pt-[10px]">
                            <!-- Affichage du pourcentage de progression -->
                            <span id="current-progress" class="text-sm font-medium text-[#9CC4B9] light:text-white">
                                {{ number_format($percentage, 2) }}%
                            </span>
                            <div class="relative flex items-center">
                                <!-- Bouton de décrément -->
                                <button type="button" id="decrement-button" class="flex-shrink-0 bg-vertPoudre hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                    <svg class="w-2.5 h-2.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>

                                <!-- Input pour le total_amount -->
                                <input type="number" id="total_amount" class="flex-shrink-0 text-vertPoudre border-0 bg-transparent text-sm font-medium focus:outline-none focus:ring-0 max-w-[5rem] text-center" value="{{ $cagnotte->total_amount ?? 3000 }}" min="0" required />

                                <!-- Bouton d'incrément -->
                                <button type="button" id="increment-button" class="flex-shrink-0 bg-vertPoudre hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                    <svg class="w-2.5 h-2.5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Barre de progression -->
                        <div class="w-full bg-[#F6F3EC] rounded-full h-2.5 light:bg-[#F6F3EC]">
                            <div class="progress-bar bg-[#9CC4B9] h-2.5 rounded-full" style="width: {{ $percentage }}%;"></div>
                        </div>

                        <div class="text-center pt-[10px]">
                            @if (isset($liste) && $liste)
                                <input type="text" id="liste-url"
                                    value="{{ route('liste.showBySlug', $liste->uuid) }}" readonly
                                    class="hidden form-control mb-2">
                                <x-primary-button id="copy-button" class="bg-vertPoudre" onclick="copyToClipboard()">
                                    Partager ma liste
                                </x-primary-button>
                            @endif
                        </div>
                    </div>

                    <div
                        class="flex flex-col gap-[10px] bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <h2 class="text-center text-[20px] text-[#9CC4B9] font-bold">Gestion de ma liste</h2>
                        {{-- <a href="#" class="flex flex-row items-center gap-[10px] text-[#505050] text-[16px]">@svg('addLink', ['width'=>25, 'height'=>25, 'fill'=>'#505050']) Ajouter un produit via un lien</a> --}}
                        <a href="/product"
                            class="flex flex-row items-center gap-[10px] text-[#505050] text-[16px]">@svg('fav', ['width' => 25, 'height' => 25, 'fill' => '#505050']) Voir
                            les produits</a>
                        <a href="/cagnotte"
                            class="flex flex-row items-center gap-[10px] text-[#505050] text-[16px]">@svg('deposit', ['width' => 25, 'height' => 25, 'fill' => '#505050']) Ma
                            Cagnotte</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
      document.getElementById('total_amount').addEventListener('input', function (event) {
    const totalAmount = event.target.value;

    fetch("{{ route('dashboard.updateTotalAmount') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ total_amount: totalAmount })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.querySelector('.progress-bar').style.width = data.percentage + '%';
            document.querySelector('#current-progress').textContent = `${data.percentage.toFixed(2)}% atteint`;
        }
    })
    .catch(error => console.error('Erreur:', error));
});
        </script>

@endsection
