<!-- resources/views/listagem.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Músicas</title>
</head>
<body>
    <h1>Listagem de Músicas</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($musicas->isEmpty())
        <p>Não há músicas salvas.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Nome da Música</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($musicas as $musica)
                    <tr>
                        <td>{{ $musica->nome }}</td>
                        <td>
                            <!-- Link para ouvir o áudio -->
                            <audio controls>
                                <source src="{{ asset('storage/audios' . $musica->caminho) }}" type="audio/mp3">
                                Seu navegador não suporta o elemento de áudio.
                            </audio>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('upload') }}">Voltar para o upload</a>
</body>
</html>
