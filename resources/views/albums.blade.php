@extends ("layout")

@section ("contenu")

    <!-- Formulaire de tri -->
    <form method="GET" action="{{ route('albums') }}">
        <label for="sort">Trier par :</label>
        <select name="sort" id="sort">
            <option value="title">Titre</option>
            <option value="date">Date</option>
        </select>
        <button type="submit">Appliquer</button>
    </form>

    <ul>
        @foreach ($albums as $album)
            <li>
                <a href="{{ route('photosAlbum', ['id' => $album->id]) }}">
                    {{ $album->titre }}
                </a>

                <!-- Dernière image ajoutée au hasard -->
                @php
                    $randomPhoto = DB::table('photos')
                        ->where('album_id', $album->id)
                        ->inRandomOrder()  // Récupère une photo au hasard
                        ->first();
                @endphp

                @if ($randomPhoto)
                    <div>
                        <img src="{{ $randomPhoto->url }}" alt="Miniature de {{ $album->titre }}" style="width: 100px; height: 100px;">
                    </div>
                @else
                    <p>Aucune image disponible</p>
                @endif
            </li>
        @endforeach
    </ul>

@endsection
