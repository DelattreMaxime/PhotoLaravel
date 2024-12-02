<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import de DB

class PhotoController extends Controller
{
    function index() {
        return view('index');
    }

    public function search(Request $request) {
        $query = $request->input('query');

        // Recherche par nom de photo
        $photosByName = DB::select('SELECT * FROM photos WHERE titre LIKE ?', ["%{$query}%"]);

        // Recherche par tags
        $photosByTags = DB::select('
            SELECT photos.* 
            FROM photos 
            INNER JOIN possede_tag ON photos.id = possede_tag.photo_id 
            INNER JOIN tags ON possede_tag.tag_id = tags.id 
            WHERE tags.nom LIKE ?', ["%{$query}%"]
        );

        // Fusionner les résultats et supprimer les doublons
        $photos = array_unique(array_merge($photosByName, $photosByTags), SORT_REGULAR);

        return view('photos.search', compact('photos'));
    }

    public function create($albumId)
    {
        return view('photos.create', ['albumId' => $albumId]);
    }
    
        public function store(Request $request, $albumId)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'url' => 'nullable|url', // URL de la photo
            'file' => 'nullable|image|max:2048', // Pour l'upload d'images
        ]);

        // Si l'upload de fichier est effectué
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('photos', 'public');
            $url = asset('storage/' . $path); // URL publique du fichier
        } else {
            $url = $request->input('url'); // URL de la photo
        }

        // Insertion de la photo dans la base de données
        DB::table('photos')->insert([
            'titre' => $request->input('title'),
            'url' => $url,
            'album_id' => $albumId, // L'ID de l'album
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('albums.show', $albumId)->with('success', 'Photo ajoutée avec succès.');
    }

        public function destroy($photoId)
    {
        // Suppression de la photo de la base de données
        DB::table('photos')->where('id', $photoId)->delete();

        return back()->with('success', 'Photo supprimée avec succès.');
    }



}
