<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArquivoAudioController;

Route::get('/', function () {
    return view('index');
});

Route::get('/upload', [ArquivoAudioController::class, 'index'])->name('upload');
Route::post('/upload', [ArquivoAudioController::class, 'store'])->name('arquivos.store');

Route::get('/musicas', [ArquivoAudioController::class, 'list'])->name('musicas.list');

