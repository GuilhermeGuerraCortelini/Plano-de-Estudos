import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],  // Garanta que esses caminhos estejam corretos
      refresh: true,
    }),
  ],
  optimizeDeps: {
    include: [
      'react', // Certifique-se de que dependências necessárias como o React sejam incluídas
      'react-dom',  // Inclua o React DOM também
    ],
  },
});
