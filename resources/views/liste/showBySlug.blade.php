@extends('layouts.app')
@section('content')

    <div class="py-12 bg-beige">

        <div class="max-w-[85rem] mx-auto gap-10 sm:px-6 lg:px-8 flex flex-col-reverse items-center lg:justify-between lg:flex-row lg:items-start">
            <!-- barre left -->
            <div class="w-[100vw] lg:w-[68vw] flex flex-col gap-[20px] px-[5px] py-[5px] bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @php
                $coverImage = Storage::url($liste->user->cover_image) ? asset('profiles/default-cover.jpg') : Storage::url($liste->user->cover_image);
                @endphp
                <div class="bg-[url({{$coverImage}})] h-[350px] bg-fixed bg-no-repeat bg-center bg-cover sm:rounded-lg flex items-end px-[25px] py-[15px]">
                    <h3 class="text-[#fff] text-[20px] font-medium">
                        {{$liste->user->name}} & {{ $liste->partner }}
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
                <div class="flex flex-row flex-wrap justify-center items-center gap-[10px] lg:hidden">
                    <div class="h-auto sm:rounded-lg px-[10px] py-[20px] lg:hidden">
                        <x-primary-button onclick="togglePopup()">Contribuer</x-primary-button>
                    </div>

                    @if(isset($liste) && $liste)

                            <input type="text" id="liste-url" value="{{ route('liste.showBySlug', $liste->uuid) }}" readonly class="hidden form-control mb-2">
                                <x-primary-button
                                    id="copy-button"
                                    class="bg-[black]"
                                    onclick="copyToClipboard()">
                                    Partager ma liste
                                </x-primary-button>

                    @endif
                </div>
                <div class="flex  justify-between items-center pt-[10px] lg:hidden">
                    <!-- Affichage du pourcentage de progression -->
                    <span id="current-progress" class="text-sm font-medium text-[#9CC4B9] light:text-white">
                        {{ number_format($percentage, 2) }}%
                    </span>
                </div>

                <!-- Barre de progression -->
                <div class="w-full bg-[#F6F3EC] rounded-full h-2.5 light:bg-[#F6F3EC] lg:hidden">
                    <div class="progress-bar bg-[#9CC4B9] h-2.5 rounded-full" style="width: {{ $percentage }}%;"></div>
                </div>
                {{--  --}}
                <div class="bg-[#9cc4b985] ring-1 ring-[#649D8C] h-auto sm:rounded-lg px-[20px] py-[10px]">

                        <p class="text-[#505050] text-[16px] font-medium py-[5px]">
                            {{ $liste->description }}
                        </p>

                </div>


                <div class="">
                    <div class="flex flex-row gap-[60px]">
                        <h4 class="btns active text-xl font-semibold" id="envies">Mes envies</h4>
                        <h4 class="btns text-xl font-semibold" id="donateurs">Les donateurs</h4>
                    </div>

                    <div class="envies flex flex-row mt-[20px] gap-[40px] flex-wrap">
                        @if($liste && $liste->products->count() > 0)

                            @foreach($liste->products as $product)

                                <x-card-contribution
                                    id="{{ $product->id }}"
                                    image="{{ $product->pivot->img }}"
                                    marque="{{ $product->pivot->brand }}"
                                    price="{{ $product->pivot->price }}"
                                    title="{{ $product->pivot->title }}"
                                    liste_id="{{ $liste->id }}"
                                    titleProduct="{{ substr($product->pivot->title ?? '', 0, 20) }}{{ strlen($product->pivot->title ?? '') > 20 ? '...' : '' }}"
                                    reserved="{{ $product->pivot->reserved }}"
                                />

                            @endforeach

                        @else
                            <p>Aucun produit n'a été ajouté dans la liste de {{$liste->user->name}}.</p>
                        @endif
                    </div>

                    <div class="donateurs hidden flex-row justify-center gap-[40px] flex-wrap">
                        <section class="relative flex flex-col overflow-hidden">
                            <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-1">
                                <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-1">

                                    <div class="w-full max-w-3xl mx-auto">

                                        <!-- Vertical Timeline #1 -->
                                        <div class="-my-6">
                                            @if($historique->count() > 0)
                                            @foreach($historique as $entry)
                                                <!-- Item #1 -->
                                                <div class="relative pl-8 sm:pl-32 py-6 group">
                                                    <!-- Purple label -->
                                                    <div class="font-medium text-rose mb-1 sm:mb-0">

                                                        @if(isset($entry->name))
                                                            {{ $entry->name }}
                                                        @elseif(isset($entry->visitor_name))
                                                            {{ $entry->visitor_name }}
                                                        @endif

                                                    </div>
                                                    <!-- Vertical line (::before) ~ Date ~ Title ~ Circle marker (::after) -->
                                                    <div class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-0 before:h-full before:px-px before:bg-slate-300 sm:before:ml-[6.5rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-0 after:w-2 after:h-2 after:bg-rose after:border-4 after:box-content after:border-slate-50 after:rounded-full sm:after:ml-[6.5rem] after:-translate-x-1/2 after:translate-y-1.5">
                                                        <time class="sm:absolute left-0 translate-y-0.5 inline-flex items-center justify-center text-xs font-semibold uppercase w-20 h-6 mb-3 sm:mb-0 text-vertPoudre bg-emerald-100 rounded-full">
                                                            {{ \Carbon\Carbon::parse($entry->date_contribution ?? $entry->due_date)->format('d/m/Y') ?? '' }}

                                                            {{-- @if($entry->date_contribution instanceof \DateTime || $entry->due_date instanceof \DateTime)
                                                                {{ ($entry->date_contribution ?? $entry->due_date)->format('d/m/Y') }}
                                                            @else
                                                                {{ ($entry->date_contribution ?? $entry->due_date) }}
                                                            @endif --}}
                                                        </time>
                                                        <div class="text-md font-bold text-slate-900">
                                                            @if(isset($entry->amount))
                                                                {{ $entry->amount }} € contribué
                                                            @elseif(isset($entry->product->title))
                                                                Produit réservé : {{ $entry->product->title }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- Content -->
                                                    <div class="text-slate-500">
                                                        @if(isset($entry->amount))
                                                            {{ $entry->name }} a contribué un montant de {{ $entry->amount }} € à la cagnotte.
                                                        @elseif(isset($entry->visitor_name))
                                                            {{ $entry->visitor_name }} a réservé le produit "{{ $entry->product->title }}".
                                                        @endif
                                                    </div>
                                                </div>
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
            <div class="w-[22vw] hidden lg:block light:bg-gray-800 overflow-hidden sm:rounded-lg flex flex-row flex-wrap lg:flex-col lg:flex">
                <div class="text-gray-900 light:text-gray-100 flex flex-row lg:flex-col gap-[20px]">
                    <div class="bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <div class="flex flex-col items-center justify-center gap-[10px]">
                            <h2 class="text-center text-[20px] text-[#9CC4B9] font-bold">{{ $liste->title }}</h2>
                            <h5 class="text-[15px] text-[#000] font-medium">Naissance prévue le</h5>
                            <h4 class="text-[18px] text-[#FF91B2] font-semibold">{{ $liste->dateBirth->format('d/m/Y') }}</h4>
                        </div>

                        <div class="flex justify-between items-center pt-[10px]">
                            <!-- Affichage du pourcentage de progression -->
                            <span id="current-progress" class="text-sm font-medium text-[#9CC4B9] light:text-white">
                                {{ number_format($percentage, 2) }}%
                            </span>
                        </div>

                        <!-- Barre de progression -->
                        <div class="w-full bg-[#F6F3EC] rounded-full h-2.5 light:bg-[#F6F3EC]">
                            <div class="progress-bar bg-[#9CC4B9] h-2.5 rounded-full" style="width: {{ $percentage }}%;"></div>
                        </div>


                        <div class="flex justify-center items-center mt-3">
                            @if(isset($liste) && $liste)

                            <input type="text" id="liste-url" value="{{ route('liste.showBySlug', $liste->uuid) }}" readonly class="hidden form-control mb-2">
                                <x-primary-button
                                    id="copy-button"
                                    onclick="copyToClipboard()">
                                    Partager ma liste
                                </x-primary-button>

                            @endif
                        </div>
                    </div>

                    <div class=" bg-white shadow-sm ring-1 ring-[#f5f5f5] h-auto sm:rounded-lg px-[10px] py-[20px]">
                        <h2 class="text-center text-[20px] text-[#9CC4B9] font-bold">Contribution libre</h2>

                       <p>
                        Vous pouvez contribuez à la cagnotte avec le montant de votre choix
                       </p>

                        <div class="flex justify-center items-center">
                            <x-primary-button class="text-center" onclick="togglePopup()">Contribuer</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Contribution -->
<div id="contributionPopup" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[400px]">
        <h2 class="text-[20px] text-center font-bold mb-4">Contribution libre</h2>
        <form id="contributionForm" action="{{ route('liste.contribute', ['uuid' => $liste->uuid]) }}" method="POST">
            @csrf
            <input type="hidden" name="cagnotte_id" value="{{ $liste->cagnotte->id }}" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeHolder="Nom complet" required />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" placeHolder="Email" required />
            <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" placeHolder="Montant" required />
            <input type="hidden" name="commission" value="2"/>
            <div class="space-y-2 mt-2">
                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500">Commission</dt>
                    <dd class="text-base font-medium text-green-500">-2€</dd>
                </dl>
            </div>

            <dl class="mt-2 flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-bold text-gray-900 ">Total</dt>
                <dd id="amountFinal" class="text-base font-bold text-gray-900 ">0€</dd>
            </dl>


            <div class="mt-4 flex justify-end">
                <x-primary-button type="submit">Contribuer</x-primary-button>
                <x-secondary-button type="button" onclick="togglePopup()">Annuler</x-secondary-button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePopup() {
        var popup = document.getElementById('contributionPopup');
        popup.classList.toggle('hidden');
    }

    // mettre à jour le montant final
    function updateMontantFinal() {
        const amountInput = document.getElementById('amount');
        const commission = 2;
        const amount = parseFloat(amountInput.value) || 0; // Prend la valeur du champ ou 0 si vide
        const amountFinal = amount - commission;

        //montant final
        document.getElementById('amountFinal').textContent = amountFinal >= 0 ? amountFinal + '€' : '0€';
    }
    document.getElementById('amount').addEventListener('input', updateMontantFinal);
</script>
@endsection
