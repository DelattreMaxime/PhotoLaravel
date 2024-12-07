@extends('layout')

@section('contenu')
    <h1 class="page-title">Ajouter une photo à l'album</h1>

    <form action="{{ route('photos.store', $albumId) }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required class="form-input">
        </div>

        <div class="form-group">
            <label for="url">URL de la photo :</label>
            <input type="url" name="url" id="url" class="form-input">
        </div>

        <div class="form-group">
            <label for="file">Ou téléversez une photo :</label>
            <input type="file" name="file" id="file" accept="image/*" class="form-input">
        </div>

        <button type="submit" class="submit-button">Ajouter</button>
    </form>
@endsection
