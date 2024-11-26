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
}
