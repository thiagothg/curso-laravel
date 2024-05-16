import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import i18n from "laravel-vue-i18n/vite";
import { resolve } from "path";
import { run } from "vite-plugin-run";

export default defineConfig({
    plugins: [
        laravel({
            input: "resources/js/app.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        i18n(),
        run([
            {
                name: "build ziggy routes file",
                run: ["php", "artisan", "ziggy:generate"],
            },
        ]),
    ],
    resolve: {
        alias: {
            "@": resolve(__dirname, "resources/js"),
            "@node_modules": resolve(__dirname, "node_modules"),
        },
    },
});
