@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center py-10">
    <h1 class="text-3xl font-bold text-red-600">Paiement annulé</h1>
    <p class="mt-4 text-lg">Votre paiement a été annulé.</p>
    <p class="mt-4">Si vous avez rencontré un problème, vous pouvez réessayer le paiement.</p>
    {{-- <a href="{{ route('liste.showBySlug', ['uuid' => $liste->uuid]) }}" class="mt-6 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Retourner à la liste</a> --}}
</div>
@endsection
