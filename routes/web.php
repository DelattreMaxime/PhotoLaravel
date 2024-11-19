<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;

Route::get('/', [AlbumController::class, 'index'])->name('accueil');

// Routes pour les albums
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/{id}', [AlbumController::class, 'show'])->name('albums.show');

// Routes pour les photos
Route::get('/photos/search', [PhotoController::class, 'search'])->name('photos.search');
Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::delete('/photos/{id}', [PhotoController::class, 'destroy'])->name('photos.destroy');
