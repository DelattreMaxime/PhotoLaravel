@extends ("layout")

@section ("contenu")

    <!-- Formulaire de tri -->
        <form method="GET" action="{{ route('albums') }}">
            <label for="creation">Trier par :</label>
            <select name="creation" id="creation" onchange="this.form.submit()">
                <option value="title" {{ request('creation') == 'title' ? 'selected' : '' }}>Titre (A → Z)</option>
                <option value="date_desc" {{ request('creation') == 'date_desc' ? 'selected' : '' }}>Date (récent → ancien)</option>
                <option value="date_asc" {{ request('creation') == 'date_asc' ? 'selected' : '' }}>Date (ancien → récent)</option>
            </select>
        </form>



    <ul>
        @foreach ($albums as $album)
            <li>
                <a href="{{ route('photosAlbum', ['id' => $album->id]) }}">
                    {{ $album->titre }}
                </a>
                <span>{{$album->creation}}</span>

                <!-- image ajoutée au hasard -->
                @php
                    $randomPhoto = DB::table('photos')
                        ->where('album_id', $album->id)
                        ->inRandomOrder()  
                        ->first();
                @endphp

                @if ($randomPhoto)
                    <div>
                        <img src="{{ $randomPhoto->url }}" alt="Miniature de {{ $album->titre }}" style="max-width: 15rem">
                    </div>
                @else
                    <p>Aucune image disponible</p>
                @endif
            </li>
        @endforeach
    </ul>

@endsection
