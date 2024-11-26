<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;

Route::get('/', [PhotoController::class, 'index'])->name('accueil');

// Routes pour les albums
Route::get('/albums', [AlbumController::class, 'albums'])->name('albums');


Route::get('/photosAlbum/{id}', [AlbumController::class, 'photosAlbum'])->name('photosAlbum');















Route::get('/albums/create', [AlbumController::class, 'create']); // Formulaire création
Route::post('/albums', [AlbumController::class, 'store']); // Ajouter un album
Route::get('/albums/{id}', [AlbumController::class, 'show']); // Détails d'un album
Route::delete('/albums/{id}', [AlbumController::class, 'destroy']); // Supprimer un album

Route::get('/photos/{id}', [PhotoController::class, 'show']); // Afficher une photo
Route::get('/photos/create', [PhotoController::class, 'create']); // Formulaire ajout photo
Route::post('/photos', [PhotoController::class, 'store']); // Enregistrer une photo
Route::delete('/photos/{id}', [PhotoController::class, 'destroy']); // Supprimer une photo