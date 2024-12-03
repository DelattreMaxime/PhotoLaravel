<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    function albums() {
        $albums = DB::select('SELECT * FROM albums');

        return view('albums', data: compact('albums'));
    }

    function photosAlbum($id) {
        $albums = DB::select('SELECT * FROM albums WHERE albums.id = ?', [$id]);
        $album = $albums[0];  // la requête précédente ne peut retourner qu'un seul album avec l'id fourni

        $photos = DB::select('SELECT * FROM photos WHERE photos.album_id = ?', [$id]);
        return view('photosAlbum', data: compact('album', 'photos'));
    }

        public function index(Request $request)
        {
            // Récupérer le paramètre de tri (par défaut : 'title')
            $sort = $request->input('creation', 'title'); 

            // Préparer la requête SQL selon le critère de tri
            if ($sort === 'date_asc') {
                // Tri par date de création (ancien → récent)
                $albums = DB::select('SELECT * FROM albums ORDER BY creation ASC');
                
            } elseif ($sort === 'date_desc') {
                // Tri par date de création (récent → ancien)
                $albums = DB::select('SELECT * FROM albums ORDER BY creation DESC');
            } else {
                // Tri par titre (A → Z, par défaut)
                $albums = DB::select('SELECT * FROM albums ORDER BY titre ASC');
            }

            // Retourner la vue avec les albums triés
            return view('albums', compact('albums', 'sort'));
        }
}
