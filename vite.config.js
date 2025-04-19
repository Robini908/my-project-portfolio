import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: ['resources/views/**/*'],
        }),
        tailwindcss(),
    ],
    build: {
        outDir: 'public/build',
        assetsDir: '',
        manifest: true,
        rollupOptions: {
            output: {
                manualChunks: undefined
            }
        }
    },
    server: {
        cors: true,
        hmr: {
            host: 'localhost'
        },
    },
});
