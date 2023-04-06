import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/template.css",
                "resources/js/template.js",
                "resources/js/pages/profile.js",
                "resources/js/pages/zakat_fitrah.js",
            ],
            refresh: true,
        }),
    ],
});
