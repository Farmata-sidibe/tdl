import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/app.scss',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // Allows Vite to be accessed from outside the container
        port: 5173, // Make sure the port is the same as in docker-compose.yml
        hmr: {
            host: 'localhost', // Enable Hot Module Reloading
        },
        watch: {
            usePolling: true, // Ensure Vite watches files properly inside Docker
        },
    },
});
