import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/dashboard.scss',
                'resources/sass/index.scss',
                'resources/sass/login.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});