@extends ("layout")
@section ("contenu")
<!-- resources/views/accueil.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body style="background-image: url('{{ $lastPhoto->url ?? 'default_background.jpg' }}'); background-size: cover;">
    <nav>
        <a href="{{ route('index') }}">Albums</a>
    </nav>
    <h1>Bienvenue sur le gestionnaire d'albums photo</h1>
</body>
</html>

@endsection