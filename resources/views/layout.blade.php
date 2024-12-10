<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset='UTF-8'>
    <title>Titre de la page</title>
    <link rel="stylesheet" type="text/css" href="{{asset('app.css')}}" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
</head>
<body>
    

    <nav>
            <ul class="nav-links">
                <li><img src="{{asset('logo/MMI ARCHIVEicon.png')}}"></li>
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