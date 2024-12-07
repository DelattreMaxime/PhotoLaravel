@extends('layout')

@section("contenu")
    <h1 style="text-align: center; margin-bottom: 20px;">{{ $album->titre }}</h1>

    <!-- Formulaire de tri -->
    <form method="GET" action="{{ route('photosAlbum', ['id' => $album->id]) }}" style="margin-bottom: 20px; text-align: center;">
        <label for="ordre" style="font-weight: bold; margin-right: 10px;">Trier par :</label>
        <select name="ordre" id="ordre" onchange="this.form.submit()" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="titre" {{ request('ordre') == 'titre' ? 'selected' : '' }}>Titre</option>
            <option value="note" {{ request('ordre') == 'note' ? 'selected' : '' }}>Note</option>
        </select>
    </form>

    <!-- Bouton pour ajouter une photo -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('photos.create', $album->id) }}">
            <button style="padding: 10px 20px; background-color: #333; color: white; border: none; border-radius: 4px; cursor: pointer;">Ajouter une photo</button>
        </a>
    </div>

    <!-- Conteneur des photos -->
    <div id="album">
        @foreach ($photos as $photo)
            <div class="photos">
                <span style="font-size: 1rem; font-weight: bold; padding: 10px; display: block; text-align: center;">{{ $photo->titre }}</span>
                <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" id="photo{{ $photo->id }}" class="photosImg">
                
                <!-- Formulaire pour supprimer une photo -->
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="text-align: center; margin-top: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')" 
                        style="padding: 8px 12px; background-color: #ff4d4d; color: white; border: none; border-radius: 4px; cursor: pointer;">
                        Supprimer
                    </button>
                </form>
            </div>
        @endforeach
    </div>

    <!-- Modal pour affichage plein écran -->
    <div id="modal">
        <img src="">
        <button id="fermer" style="position: absolute; top: 20px; right: 20px; background-color: rgba(255, 255, 255, 0.8); color: #333; border: none; padding: 10px 15px; border-radius: 50%; cursor: pointer;">
            Fermer
        </button>
    </div>

    <!-- Overlay -->
    <div id="overlay"></div>

    <!-- Script pour gérer l'affichage du modal -->
    <script>
        let photos = document.querySelectorAll(".photosImg");
        for (let photo of photos) {
            photo.addEventListener("click", function (e) {
                document.querySelector("#modal img").src = e.currentTarget.src;
                document.getElementById("modal").style.display = "block";
            });
        }

        let closeButton = document.querySelector('#modal button');
        closeButton.addEventListener('click', function () {
            document.getElementById("modal").style.display = "none";
        });
    </script>
@endsection
