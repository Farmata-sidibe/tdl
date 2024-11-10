@extends('layouts.admin')

    @section('content')
        <h1>Supprimer l'utilisateur</h1>
        <p>Êtes-vous sûr de vouloir supprimer l'utilisateur "{{ $user->name }}"?</p>
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
            <a href="{{ route('admin.users.index') }}">Annuler</a>
        </form>
    @endsection
