<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArquivoAudio extends Model
{
    use HasFactory;

    protected $table = 'musicas_salvas';
    
    protected $fillable = [
        'nome',
        'caminho',
    ];
}
