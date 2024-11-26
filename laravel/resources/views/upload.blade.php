<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo MP3</title>
</head>
<body>
    <h1>Enviar Arquivo MP3</h1>

    @if (session('sucesso'))
        <p>{{ session('sucesso') }}</p>
    @endif

    <form action="{{ route('audio.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="audio">Escolha o arquivo MP3:</label>
        <input type="file" name="audio" id="audio" accept=".mp3">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
