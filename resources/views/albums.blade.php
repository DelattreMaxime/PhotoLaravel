@extends ("layout")

@section ("contenu")

<!-- Formulaire de tri -->
<form method="GET" action="{{ route('albums') }}" style="margin-bottom: 20px;">
    <label for="creation" style="font-weight: bold; margin-right: 10px;">Trier par :</label>
    <select name="creation" id="creation" onchange="this.form.submit()" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        <option value="title" {{ request('creation') == 'title' ? 'selected' : '' }}>Titre (A → Z)</option>
        <option value="date_desc" {{ request('creation') == 'date_desc' ? 'selected' : '' }}>Date (récent → ancien)</option>
        <option value="date_asc" {{ request('creation') == 'date_asc' ? 'selected' : '' }}>Date (ancien → récent)</option>
    </select>
</form>

<!-- Conteneur des albums -->
<div id="album">
    @foreach ($albums as $album)
    <div class="photos">
        <a href="{{ route('photosAlbum', ['id' => $album->id]) }}" style="text-decoration: none; color: inherit;">
            <div class="photosImg">
                @php
                    $randomPhoto = DB::table('photos')
                        ->where('album_id', $album->id)
                        ->inRandomOrder()  
                        ->first();
                @endphp

                @if ($randomPhoto)
                    <img src="{{ $randomPhoto->url }}" alt="Miniature de {{ $album->titre }}" style="width: 100%; height: 200px; object-fit: cover;">
                @else
                    <p style="text-align: center; padding: 50px; background-color: #f9f9f9;">Aucune image disponible</p>
                @endif
            </div>
            <span>{{ $album->titre }}</span>
        </a>
        <span style="font-size: 0.9rem; color: #777; text-align: center; display: block;">Créé le : {{ $album->creation }}</span>
    </div>
    @endforeach
</div>

@endsection
