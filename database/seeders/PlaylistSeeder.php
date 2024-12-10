<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Playlist;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criar um registro de Playlist
        Playlist::create([
            'name' => 'Minha Playlist Inicial'
        ]);
    }
}
