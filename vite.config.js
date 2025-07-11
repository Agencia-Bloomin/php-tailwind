import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    tailwindcss()
  ],
  root: 'src',
  publicDir: 'public',
  build: {
    outDir: '../public',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: 'src/assets/js/main.js'
      }
    }
  },
  server: {
    port: 5173,
    open: false
  }
}); 