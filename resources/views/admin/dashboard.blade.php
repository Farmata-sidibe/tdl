@extends('layouts.admin')

@section('content')
    <h1>Tableau de bord de l'administration</h1>
    <p>Bienvenue dans le back-office de gestion du site.</p>

    <ul>
        <li><a href="{{ route('admin.users.index') }}">Gérer les utilisateurs</a></li>
        <li><a href="{{ route('admin.listes.index') }}">Gérer les listes</a></li>
    </ul>
@endsection
