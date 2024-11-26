<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;

class PhotoController extends Controller
{
    function index (){
        return view ('index');
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $photos = Photo::where('titre', 'LIKE', "%{$query}%")->get();
        return view('photos.search', compact('photos'));
    }
}