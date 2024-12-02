@foreach ($photos as $photo)
    <div>
        <h3>{{ $photo->title }}</h3>
        <img src="{{ $photo->url }}" alt="{{ $photo->title }}" style="max-width: 200px;">
        
        <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')">Supprimer</button>
        </form>
    </div>
@endforeach
