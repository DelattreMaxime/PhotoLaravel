<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Titre de la page</title>
    <link rel="stylesheet" 
          type="text/css"
          href="{{asset('app.css')}}" />
</head>
<body>
        <nav class="navbar">
            <a href="{{ route('accueil') }}" class="nav-link">Home Page</a>
            <a href="{{ route('albums') }}" class="nav-link">Albums</a>
            <form action="{{ route('photos.search') }}" method="GET">
                <input type="text" name="query" placeholder="Rechercher une photo">
                <button type="submit">Rechercher</button>
            </form>
        </nav>
    <main>
        @yield('contenu')
    </main>
</body>
</html>
