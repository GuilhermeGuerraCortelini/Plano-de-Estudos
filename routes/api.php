<?php

// routes/api.php

use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;


Route::get('playlists', [MusicController::class, 'getPlaylists']);
Route::post('playlist', [MusicController::class, 'createPlaylist']);

Route::post('playlist/{playlistId}/song', [MusicController::class, 'addSongToPlaylist']);
Route::get('playlist/{playlistId}/songs', [MusicController::class, 'getSongs']);
Route::post('playlist/upload-song', [MusicController::class, 'uploadSong']);

