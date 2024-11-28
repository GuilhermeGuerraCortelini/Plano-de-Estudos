<!-- resources/views/upload.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo MP3</title>
</head>
<body>
    <h1>Upload de Arquivo MP3</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('arquivos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="arquivo">Escolha o arquivo MP3:</label>
        <input type="file" name="arquivo" id="arquivo" accept=".mp3" required>
        <button type="submit">Enviar</button>
    </form>
    <p><a href="{{ route('musicas.list') }}">Listagem de músicas</a></p>
</body>
</html>
