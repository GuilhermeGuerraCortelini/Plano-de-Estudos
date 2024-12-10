import React, { useState, useEffect } from 'react';
import axios from 'axios';

function App() {
  const [playlists, setPlaylists] = useState([]);
  const [songs, setSongs] = useState([]);
  const [currentSong, setCurrentSong] = useState(null);
  const [selectedFile, setSelectedFile] = useState(null);
  const [playlistId, setPlaylistId] = useState('');

//   const apiUrl = process.env.REACT_APP_API_URL;

// axios.get(`${apiUrl}/playlists`)
//   .then(response => {
//     setPlaylists(response.data);
//   })
//   .catch(error => {
//     console.error('Erro ao carregar playlists:', error);
//   });


{/* <source src={`http://localhost:8000/storage/${currentSong.file_path}`} type="audio/mp3" /> */}


  // Carregar playlists ao inicializar
  useEffect(() => {
    axios.get('http://localhost:8000/api/playlists')
      .then(response => {
        setPlaylists(response.data);
      });
  }, []);

  const handlePlaylistClick = (playlistId) => {
    setPlaylistId(playlistId);  // Atualiza o ID da playlist
    axios.get(`http://localhost:8000/api/playlist/${playlistId}/songs`)
      .then(response => {
        setSongs(response.data.songs);
      })
      .catch(error => {
        console.error('Erro ao carregar músicas da playlist:', error);
      });
  };

  const handleSongPlay = (song) => {
    setCurrentSong(song);
  };

  // Manipulador de envio do formulário de upload de arquivo
  const handleFileChange = (event) => {
    setSelectedFile(event.target.files[0]);  // Define o arquivo selecionado
  };

  const handleFileUpload = () => {
    if (!selectedFile || !playlistId) {
      alert("Selecione um arquivo e uma playlist.");
      return;
    }

    const formData = new FormData();
    formData.append('song', selectedFile);
    formData.append('playlist_id', playlistId);

    axios.post('http://localhost:8000/api/playlist/upload-song', formData)
      .then(response => {
        alert('Arquivo enviado com sucesso!');
        setSongs([...songs, response.data.song]);  // Adiciona a nova música na lista
      })
      .catch(error => {
        console.error('Erro ao enviar o arquivo:', error);
        alert('Erro ao enviar o arquivo.');
      });
  };

  return (
    <div>
      <h1>Music Streaming</h1>

      {/* Seção de Playlists */}
      <h2>Playlists</h2>
      <ul>
        {playlists.map(playlist => (
          <li key={playlist.id} onClick={() => handlePlaylistClick(playlist.id)}>
            {playlist.name}
          </li>
        ))}
      </ul>

      {/* Seção para envio de música */}
      <h2>Enviar Música</h2>
      <input type="file" accept="audio/mp3" onChange={handleFileChange} />
      <button onClick={handleFileUpload}>Enviar Música</button>

      {/* Exibição das músicas na playlist */}
      <h2>Songs</h2>
      <ul>
        {songs.map(song => (
          <li key={song.id} onClick={() => handleSongPlay(song)}>
            {song.title} - {song.artist}
          </li>
        ))}
      </ul>

      {/* Player de áudio */}
      {currentSong && (
        <audio controls>
          <source src={`http://localhost:8000/storage/${currentSong.file_path}`} type="audio/mp3" />
          Your browser does not support the audio element.
        </audio>
      )}
    </div>
  );
}

export default App;
