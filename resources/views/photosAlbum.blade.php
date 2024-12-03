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
                <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" id="photo{{$photo->id}}" class="small" onclick="enlargeImg()">
                
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




<!-- script to set display property -->
<script>
img = document.getElementById("photo{{$photo->id}}");

function enlargeImg() {
   img.style.transform = "scale(1.5)";
   img.style.transition = "transform 0.25s ease";
}

// Function to reset image size
function resetImg() {
   img.style.transform = "scale(1)";
   img.style.transition = "transform 0.25s ease";
}
</script>

<button onclick="resetImg()">fermer</button>
</div>

</body>
@endsection