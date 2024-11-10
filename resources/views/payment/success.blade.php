@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center py-10">
    <h1 class="text-3xl font-bold text-green-600">Merci pour votre contribution !</h1>
    <p class="mt-4 text-lg">Votre paiement a été traité avec succès.</p>
    <p class="mt-4">Nous vous remercions pour votre générosité !</p>
    {{-- <a href="{{ route('liste.showBySlug', ['uuid' => $liste->uuid]) }}" class="mt-6 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Retourner à la liste</a> --}}
</div>
@endsection
