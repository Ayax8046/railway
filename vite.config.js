import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
    build: {
        outDir: 'public/build',  // Verifica que esta ruta esté correcta
    },
    server: {
        https: true, // Habilita HTTPS en el servidor de desarrollo
    },
    base: process.env.NODE_ENV === 'production' ? '/build/' : '/', // Asegura que en producción use HTTPS
});
