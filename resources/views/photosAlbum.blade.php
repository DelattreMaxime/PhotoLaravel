@extends('layout')

@section("contenu")
    <h1>{{$album->titre}}</h1>

    <!-- Lien pour trier les photos -->
    <form method="GET" action="{{ route('photosAlbum', ['id' => $album->id]) }}">
        <label for="ordre">Trier par :</label>
        <select name="ordre" id="ordre" onchange="this.form.submit()">
            <option value="titre" {{ request('ordre') == 'titre' ? 'selected' : '' }}>Titre</option>
            <option value="note" {{ request('ordre') == 'note' ? 'selected' : '' }}>Note</option>
        </select>
    </form>

    <!-- Bouton pour ajouter une photo -->
    <a href="{{ route('photos.create', $album->id) }}">
        <button>Ajouter une photo</button>
    </a>

    <div id="album">
        @foreach ($photos as $photo)
            <div class="photos default">
                <span>{{ $photo->titre }}</span>
                <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" id="photo{{$photo->id}}" class="photosImg">
                
                <!-- Formulaire pour supprimer une photo -->
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')">Supprimer</button>
                </form>
            </div>
        @endforeach

        <div id="overlay"></div>
    </div>


    <div id="modal">
    <img src="">
    <button id="fermer">fermer</button>
    </div>






<!-- script to set display property -->
<script>
let p = document.querySelectorAll (".photosImg")
for (let maPhoto of p)
maPhoto.addEventListener ('click', function (e){
    console.log(e.currentTarget.src)
    console.log(document.querySelector('#modal img'))
    document.querySelector('#modal img').src = e.currentTarget.src    
    document.getElementById ("modal").style.display = "block"
})

let monBouton= document.querySelector('#modal button')
monBouton.addEventListener('click', function () {
document.getElementById ("modal").style.display = "none"
})

</script>

</body>
@endsection