<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Titre de la page</title>
    <link rel= "stylesheet" 
    type='text/css'
    href = '{{env("APP_URL")}}/css/style.css' />

	</head>

	<body>
	<nav>
        <a href= "{{route('accueil')}}">home page </a>
</nav>
<main>
    @yield ('contenu')
</main>
</body>
</html>