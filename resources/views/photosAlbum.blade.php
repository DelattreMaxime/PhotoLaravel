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

                <!-- Affichage et modification de la note -->
                <div style="text-align: center; margin-top: 10px;">
                    <p><strong>Note actuelle :</strong> {{ $photo->note ?? 'Non notée' }}</p>
                    <form action="{{ route('photos.updateNote', $photo->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('POST')
                        <input type="number" name="note" value="{{ $photo->note }}" min="0" max="5" step="1" 
                            style="width: 60px; padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                        <button type="submit" 
                            style="padding: 5px 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">
                            Modifier
                        </button>
                    </form>
                </div>

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
    <div class="modal-content">
        <img src="">
        <button id="fermer">Fermer</button>
    </div>
</div>

<!-- Overlay -->
<div id="overlay"></div>




    <!-- Script pour gérer l'affichage du modal -->
    <script>
        // Gérer le zoom des images
            let photos = document.querySelectorAll(".photosImg");
            for (let photo of photos) {
                photo.addEventListener("click", function (e) {
                    // Charger l'image dans le modal
                    document.querySelector("#modal img").src = e.currentTarget.src;
                    
                    // Afficher le modal et l'overlay
                    document.getElementById("modal").style.display = "flex";  // Utiliser flex pour centrer
                    document.getElementById("overlay").style.display = "block";  // Afficher l'overlay
                });
            }

            // Fermer le modal
            let closeButton = document.querySelector('#modal button');
            closeButton.addEventListener('click', function () {
                // Cacher le modal et l'overlay
                document.getElementById("modal").style.display = "none";
                document.getElementById("overlay").style.display = "none";  // Cacher l'overlay
            });

    </script>
@endsection
