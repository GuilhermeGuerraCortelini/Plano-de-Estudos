<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{

    // Criar playlist
    public function createPlaylist(Request $request)
    {
        $playlist = Playlist::create([
            'name' => $request->name
        ]);

        return response()->json($playlist);
    }

    // Adicionar música à playlist
    public function addSongToPlaylist(Request $request, $playlistId)
    {
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'file' => 'required|mimes:mp3|max:10240', // Tamanho máximo de 10MB
        ]);

        $filePath = $request->file('file')->store('songs', 'public');

        $song = Song::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'file_path' => $filePath,
            'playlist_id' => $playlistId
        ]);

        return response()->json($song);
    }

    // Obter músicas de uma playlist
    public function getSongs($playlistId)
    {
        $playlist = Playlist::with('songs')->findOrFail($playlistId);
        return response()->json($playlist);
    }
    
    public function getPlaylists()
    {
        // Retorna todas as playlists no banco de dados
        $playlists = Playlist::all();

        return response()->json($playlists);
    }
    public function uploadSong(Request $request)
    {
        // Validação do arquivo
        $request->validate([
            'song' => 'required|mimes:mp3|max:10240',  // Arquivo MP3, até 10MB
            'playlist_id' => 'required|exists:playlists,id', // ID da playlist existente
        ]);

        // Salvar o arquivo
        $filePath = $request->file('song')->store('songs', 'public');

        // Salvar a música no banco de dados
        $song = new Song();
        $song->title = $request->file('song')->getClientOriginalName();  // Nome do arquivo
        $song->file_path = $filePath;  // Caminho do arquivo no storage
        $song->artist = 'Unknown'; // Defina um valor padrão ou adicione outro campo no formulário para capturar isso
        $song->playlist_id = $request->playlist_id;
        $song->save();

        // Retornar a música salva
        return response()->json([
            'song' => $song
        ], 201);
    }
}

