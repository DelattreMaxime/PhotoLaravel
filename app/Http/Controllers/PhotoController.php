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
            'file' => 'nullable|image', // Pour l'upload d'images
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
            'titre' => $request->input('titre'), 
            'url' => $url,
            'album_id' => $albumId, 
        ]);
      

        return redirect()->route('photosAlbum', $albumId)->with('success', 'Photo ajoutée avec succès.');
    }

    public function destroy($photoId)
    {
        // Suppression de la photo de la base de données
        DB::table('photos')->where('id', $photoId)->delete();

        return back()->with('success', 'Photo supprimée avec succès.');
    }

    // Méthode pour afficher les photos d'un album avec tri
        public function show($albumId, Request $request)
    {
        $album = DB::table('albums')->where('id', $albumId)->first();

        // Liste des critères de tri autorisés
        $criteresValides = ['titre', 'note'];

        // Récupérer le critère de tri, ou 'titre' par défaut
        $ordre = $request->input('ordre', 'titre');

        if (!in_array($ordre, $criteresValides)) {
            $ordre = 'titre'; // Défaut si le critère n'est pas valide
        }

        // Récupérer les photos de l'album et trier selon le critère choisi
        $photos = DB::table('photos')
            ->where('album_id', $albumId)
            ->orderBy($ordre, 'asc') // Trie les photos par titre ou note
            ->get();

        return view('photosAlbum', ['album' => $album, 'photos' => $photos]);
    }

    public function updateNote(Request $request, $id)
    {
        $request->validate([
            'note' => 'nullable|numeric|min:0|max:5',
        ]);
    
        DB::table('photos')
            ->where('id', $id)
            ->update(['note' => $request->input('note')]);
    
        return redirect()->back()->with('success', 'Note mise à jour avec succès.');
    }
    

}
