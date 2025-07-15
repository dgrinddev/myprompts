import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/fonts.css',
                'resources/css/layouts/auth.css',
                'resources/css/layouts/guest.css',
                'resources/css/pages/public/home.css',
                'resources/js/app.js',
                // 'resources/js/alpine.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
