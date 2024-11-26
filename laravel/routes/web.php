<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inicial');
});


Route::get('upload', [ArquivoAudioController::class, 'mostrarFormulario']);
Route::post('upload', [::class, 'upload'])->name('audio.upload');

