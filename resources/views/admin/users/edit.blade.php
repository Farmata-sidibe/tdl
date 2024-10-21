    @extends('layouts.admin')

    @section('content')
    <h1>Modifier l'utilisateur</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>

        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="phone">Telephone :</label>
            <input type="number" name="phone" id="phone" value="{{ $user->phone }}">
        </div>
        <div>
            <label for="country">Pays :</label>
            <input type="text" name="country" id="country" value="{{ $user->country }}">
        </div>
        <div>
            <label for="adress">Adresse :</label>
            <input type="text" name="adress" id="adress" value="{{ $user->adress }}">
        </div>
        <div>
            <label for="code_postal">Code postale :</label>
            <input type="text" name="code_postal" id="code_postal" value="{{ $user->code_postal }}">
        </div>
        <div>
            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville" value="{{ $user->ville }}">
        </div>
        <button type="submit">Mettre à jour</button>
        <a href="{{ route('admin.users.index') }}">Annuler</a>
    </form>

        @endsection
