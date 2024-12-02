@extends('layout')

@section('contenu')
    <h1>Ajouter une photo à l'album</h1>

    <form action="{{ route('photos.store', $albumId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="url">URL de la photo :</label>
            <input type="url" name="url" id="url">
        </div>

        <div>
            <label for="file">Ou téléversez une photo :</label>
            <input type="file" name="file" id="file" accept="image/*">
        </div>

        <button type="submit">Ajouter</button>
    </form>
@endsection
