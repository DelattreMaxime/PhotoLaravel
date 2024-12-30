@extends ("layout")
@section ("contenu")

<section class="About-accueil">
 <h1 class=bienvenue>MMI Archive</h1>

 <p > MMI Archive est un site internet de gestion d'albums photos créer par deux étudiants : <b>Delattre Maxime</b> et <b>Chekalova Anna</b> </p>
 </section>
 <section class="Search-accueil">

    <h2> Faites votre première recherche dès maintenant !</h2>
    <form class="search-bar" action="{{ route('photos.search') }}" method="GET">
        <input type="text" name="query" placeholder="Rechercher..." />
        <button type="submit">Rechercher</button>
    </form> 

</section>
@endsection