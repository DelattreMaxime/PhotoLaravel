@extends('layout')

@section('contenu')
    <h1>Résultats de la recherche pour "{{ request('query') }}"</h1>
    <div id="album">
        @if ($photos->isEmpty())
            <p>Aucune photo trouvée.</p>
        @else
            @foreach ($photos as $photo)
                <div class="photos default">
                    <span>{{ $photo->titre }}</span>
                    <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" class="small">
                </div>
            @endforeach
        @endif
    </div>
@endsection