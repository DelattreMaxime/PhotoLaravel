<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset='UTF-8'>
    <title>Titre de la page</title>
    <link rel="stylesheet" type="text/css" href="{{asset('app.css')}}" />
</head>
<body>
    <nav class="navbar">
        <div class="nav-animation"></div>
        <a href="{{ route('accueil') }}" class="nav-link nav-home">Home Page</a>
        <a href="{{ route('albums') }}" class="nav-link nav-albums">Albums</a>
        <form action="{{ route('photos.search') }}" method="GET" style="display: inline-block; margin-left: 20px;">
            <input type="text" name="query" placeholder="Rechercher une photo">
            <button type="submit">Rechercher</button>
        </form>
    </nav>
    <main>
        @yield('contenu')
    </main>
</body>
</html>