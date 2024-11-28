<?php

namespace App\Http\Controllers;

use App\Models\ArquivoAudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArquivoAudioController extends Controller
{
    // Exibe o formulário para upload de arquivos
    public function index()
    {
        return view('upload');
    }

    // Processa o upload do arquivo MP3
    public function store(Request $request)
    {
        // Validação do arquivo
        $request->validate([
            'arquivo' => 'required|mimes:mp3|max:10240', // Limite de 10MB para o arquivo
        ]);

        // Processa o upload
        $arquivo = $request->file('arquivo');
        $path = $arquivo->store('audios', 'public'); // Salva na pasta 'public/audios'

        // Salva o registro no banco de dados
        ArquivoAudio::create([
            'nome' => $arquivo->getClientOriginalName(),
            'caminho' => $path,
        ]);

        return back()->with('success', 'Arquivo enviado com sucesso!');
    }

    public function list()
    {
        // Busca todas as músicas no banco de dados
        $musicas = ArquivoAudio::all();

        // Retorna a view com a lista de músicas
        return view('listagem', compact('musicas'));
    }
}