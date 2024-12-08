<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;

Route::get('/', [PhotoController::class, 'index'])->name('accueil');

// Routes pour les albums
Route::get('/albums', [AlbumController::class, 'index'])->name('albums');


Route::get('/photosAlbum/{id}', [PhotoController::class, 'show'])->name('photosAlbum');

Route::get('/search', [PhotoController::class, 'search'])->name('photos.search');


Route::get('/photos/searchByTag', [PhotoController::class, 'searchByTag'])->name('photos.searchByTag');


// Route pour afficher le formulaire d'ajout de photo
Route::get('/albums/{album}/photos/create', [PhotoController::class, 'create'])->name('photos.create');

// Route pour enregistrer une nouvelle photo dans un album
Route::post('/albums/{album}/photos', [PhotoController::class, 'store'])->name('photos.store');

// Route pour supprimer une photo d'un album
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

// maj note
Route::post('/photos/{id}/update-note', [PhotoController::class, 'updateNote'])->name('photos.updateNote');









