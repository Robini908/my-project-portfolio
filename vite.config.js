import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/modules/speech-module.js',
                'resources/js/modules/ai-features.js',
                'resources/js/mobile-handler.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        outDir: 'public/build',
        assetsDir: '',
        manifest: true,
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['alpinejs'],
                    mobile: ['resources/js/mobile-handler.js'],
                },
                entryFileNames: (chunkInfo) => {
                    return chunkInfo.name === 'mobile'
                        ? 'assets/mobile.[hash].js'
                        : 'assets/[name].[hash].js';
                }
            }
        },
        emptyOutDir: true,
        minify: true,
        sourcemap: process.env.NODE_ENV !== 'production'
    },
    server: {
        cors: true,
        hmr: {
            host: 'localhost'
        },
    },
    base: process.env.ASSET_URL ? process.env.ASSET_URL : '/',
});
