<!DOCTYPE html>
<html>
<head>
    <title>Admin - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
                <li><a href="{{ route('admin.users.index') }}">Gérer les utilisateurs</a></li>
                {{-- <li><a href="{{ route('admin.listes.index') }}">Produits</a></li> --}}
                <li><a href="{{ route('logout') }}">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
