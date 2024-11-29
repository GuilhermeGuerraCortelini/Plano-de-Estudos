import React, { useState } from 'react';
import ReactDOM from 'react-dom';

// Componente de Cabeçalho
const Header = () => (
  <header>
    <h1>Upload de Arquivo MP3</h1>
  </header>
);

// Componente de Exibição de Mensagens
const Messages = ({ successMessage }) => {
  if (!successMessage) return null;
  return (
    <div className="success-message">
      <p>{successMessage}</p>
    </div>
  );
};

// Componente de Formulário de Upload
const UploadForm = () => {
  return (
    <form action="{{ route('arquivos.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <label htmlFor="arquivo">Escolha o arquivo MP3:</label>
      <input type="file" name="arquivo" id="arquivo" accept=".mp3" required />
      <button type="submit">Enviar</button>
    </form>
  );
};

// Componente Principal
const App = () => {
  // Supondo que você tenha uma variável de sessão com a mensagem de sucesso, podemos simular isso
  const [successMessage, setSuccessMessage] = useState("Arquivo enviado com sucesso!");

  return (
    <div className="upload-container">
      <Header />
      <Messages successMessage={successMessage} />
      <UploadForm />
      <p><a href="{{ route('musicas.list') }}">Listagem de músicas</a></p>
    </div>
  );
};

// Renderizar o componente principal
ReactDOM.render(<App />, document.getElementById('app'));
