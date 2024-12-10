<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Playlist;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Garantir que ao menos uma playlist exista
        $playlist = Playlist::first();

        // Se não houver playlists, criar uma nova
        if (!$playlist) {
            $playlist = Playlist::create([
                'name' => 'Playlist Inicial'
            ]);
        }

        // Criar músicas associadas à playlist
        Song::create([
            'title' => 'Primeira Música',
            'artist' => 'Artista Desconhecido',
            'file_path' => 'songs/primeira-musica.mp3', // Este caminho deve corresponder ao arquivo real armazenado
            'playlist_id' => $playlist->id
        ]);

        Song::create([
            'title' => 'Segunda Música',
            'artist' => 'Outro Artista',
            'file_path' => 'songs/segunda-musica.mp3', // Este caminho também deve ser válido
            'playlist_id' => $playlist->id
        ]);
    }
}
