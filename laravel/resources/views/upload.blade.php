<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo MP3</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body>
    <!-- Elemento onde o React será renderizado -->
    <div id="app">

    <!-- Script que carrega o app.js compilado pelo Laravel Mix -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Título da página -->
    <h1>Upload de Arquivo MP3</h1>

    <!-- Exibe mensagem de sucesso, se houver -->
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Formulário para envio de arquivo MP3 -->
    <form action="{{ route('arquivos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="arquivo">Escolha o arquivo MP3:</label>
        <input type="file" name="arquivo" id="arquivo" accept=".mp3" required>
        <button type="submit">Enviar</button>
    </form>

    <!-- Link para listagem de músicas -->
    <p><a href="{{ route('musicas.list') }}">Listagem de músicas</a></p>
</div>
</body>
</html>
