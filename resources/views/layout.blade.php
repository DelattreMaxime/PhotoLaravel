<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset='UTF-8'>
    <title>Titre de la page</title>
    <link rel="stylesheet" type="text/css" href="{{asset('app.css')}}" />
</head>
<body>
    

    <nav>
            <ul class="nav-links">
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li><a href="{{ route('albums') }}">Albums</a></li>
            </ul>
            <div class="search-bar">
                <form action="{{ route('photos.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Rechercher..." />
                    <button type="submit">Rechercher</button>
                </form>
            </div>
        </nav>

    <main>
        @yield('contenu')
    </main>
</body>
</html>