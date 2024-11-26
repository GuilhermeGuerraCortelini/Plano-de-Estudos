<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArquivoAudio extends Model
{
    use HasFactory;

    // Definir a tabela associada à Model (se não for o nome plural e em inglês da Model)
    protected $table = 'audio_files';

    // Especificar os campos que podem ser preenchidos
    protected $fillable = [
        'file_name',
        'file_path',
    ];

    // Se necessário, definir os campos para proteção contra atribuição em massa
    // protected $guarded = [];

    // Se você tiver timestamps personalizados ou não usar, pode definir isso também
    // public $timestamps = false;
}
