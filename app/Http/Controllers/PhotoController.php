<?php

namespace App\Http\Controllers;

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
}
