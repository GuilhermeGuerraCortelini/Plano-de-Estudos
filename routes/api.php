<?php

// routes/api.php

use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

Route::get('playlists', [MusicController::class, 'getPlaylists']); // Para pegar todas as playlists
Route::post('playlist', [MusicController::class, 'createPlaylist']);
Route::post('playlist/{playlistId}/song', [MusicController::class, 'addSongToPlaylist']);
Route::get('playlist/{playlistId}/songs', [MusicController::class, 'getSongs']);

// Rota para upload de música
Route::post('playlist/upload-song', [MusicController::class, 'uploadSong']);
