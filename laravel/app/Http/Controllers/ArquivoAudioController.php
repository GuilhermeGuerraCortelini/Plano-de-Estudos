<?php

use Illuminate\Http\Request;
use App\Models\ArquivoAudio;

class ArquivoAudioController extends Controller
{
    // Exibe o formulário de upload
    public function showForm()
    {
        return view('upload');
    }

    // Processa o upload do MP3
    public function upload(Request $request)
    {
        // Validação do arquivo
        $request->validate([
            'audio' => 'required|mimes:mp3,wav,ogg|max:10240',  // Limite de 10MB
        ]);

        // Armazenando o arquivo no sistema de arquivos
        $audioFile = $request->file('audio');
        $fileName = time() . '.' . $audioFile->getClientOriginalExtension();
        $filePath = $audioFile->storeAs('audio_files', $fileName, 'local');

        // Salvando o caminho e nome do arquivo no banco de dados
        ArquivoAudio::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return back()->with('success', 'Arquivo enviado com sucesso!');
    }
}
