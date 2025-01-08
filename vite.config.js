import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/sass/style.scss",
                "resources/css/style.css",
                "resources/css/login.css",
                "resources/css/book.css",
            ],
            refresh: true,
        }),
    ],
});
