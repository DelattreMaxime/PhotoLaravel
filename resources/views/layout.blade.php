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
        <a href="{{ route('accueil') }}"><img class= logonav src="{{asset('logo/MMI ARCHIVEicon.png')}}"></a>
        <div id="navv">
            <ul class="nav-links">
                <li><a href="{{ route('albums') }}">Albums</a></li>
                <li><a href="{{ route('about') }}">À propos</a></li>
            </ul>

            <div class="search-bar">
                <form action="{{ route('photos.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Rechercher..." />
                    <button type="submit">Rechercher</button>
                </form>
            </div>
        </div>
        </nav>

    <main>
        @yield('contenu')
    </main>

    <footer>
        <p><b>Delattre Maxime</b> et <b>Chekalova Anna</b></p>
    </footer>
</body>
</html>