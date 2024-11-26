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
        <a href="{{route('accueil')}}" class="nav-link">Home Page</a>
        <a href="{{route('albums')}}" class="nav-link">Albums</a>
    </nav>
    <main>
        @yield('contenu')
    </main>
</body>
</html>
