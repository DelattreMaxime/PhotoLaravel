@extends ("layout")
@section ("contenu")
<section class="About-accueil">

    <h1>Bienvenue sur</h1>
    <img class= homelogo src="{{asset('logo/MMI ARCHIVE.png')}}">
    <p class= texteaccueil> Plongez dans l’univers créatif des étudiants en Métiers du Multimédia et de l’Internet ! Ce site est une vitrine de projets novateurs, réalisés avec passion et savoir-faire, incluant des archives de travaux en design, développement, audiovisuel, et communication. Découvrez des portfolios variés, explorez des idées inspirantes, et suivez les dernières tendances digitales. Notre objectif ? Mettre en lumière le talent et la diversité des compétences qui façonnent l’avenir des médias numériques. Votre exploration commence ici ! </p>
</section>

 <section class="Search-accueil">

    <h2> Faites votre première recherche dès maintenant !</h2>
    <form class="search-bar" action="{{ route('photos.search') }}" method="GET">
        <input type="text" name="query" placeholder="Rechercher..." />
        <button type="submit">Rechercher</button>
    </form> 

</section>


@endsection