<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;

Route::get('/', [AlbumController::class, 'index'])->name('accueil');

// Routes pour les albums
Route::get('/albums', [AlbumController::class, 'index'])->name('index');
