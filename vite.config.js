import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/js/swiper.js',
        ]),
    ],
    server : {
        host: '192.168.1.7',
    },
});
