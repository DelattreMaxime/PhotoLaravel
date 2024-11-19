<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;

class PhotoController extends Controller
{
    // Recherche de photos par mot-clé ou tag
    public function search(Request $request)
    {
        $query = $request->input('query');
        $photos = Photo::where('title', 'like', "%$query%")->get();

        return view('photos.search', compact('photos'));
    }

    // Affiche le formulaire pour ajouter une nouvelle photo
    public function create()
    {
        $albums = Album::all(); // Pour afficher la liste des albums dans le formulaire
        return view('photos.create', compact('albums'));
    }

    // Gère la soumission du formulaire pour ajouter une photo
    public function store(Request $request)
    {
        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->album_id = $request->input('album_id');
        $photo->url = $request->input('url'); // Pour l'ajout via une URL

        $photo->save();

        return redirect()->route('albums.show', $photo->album_id);
    }

    // Supprime une photo
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();

        return redirect()->back();
    }
}
