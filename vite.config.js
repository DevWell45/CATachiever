import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // GLOBAL - CSS
                'resources/css/app.css', 

                // GLOBAL - JS
                'resources/js/app.js',

                // ADMIN - CSS
                'resources/css/Admin/Navigation.css',

                // USER - CSS
                'resources/css/pages/exam.css',

                // AUTH - JS
                'resources/js/functions/Auth/logout.js',
                'resources/js/functions/OTP_Verification_Page/Resend_OTP.js', 
                'resources/js/functions/OTP_Verification_Page/OTP_inputs.js',
                
                // USER - JS
                'resources/js/functions/pages/Home.js',
                
            ],
            refresh: true,
        }),
        vue(),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js'
        }
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        manifest: 'manifest.json',
    },
})