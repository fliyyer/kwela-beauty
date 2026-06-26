import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "kwela-cream": "#f5f0eb",
                "kwela-beige": "#d8cdbd",
                "kwela-maroon": "#5b0f1b",
                "kwela-brown": "#b8aa99",
                "kwela-dark": "#3d2a2a",
            },
        },
    },

    plugins: [forms],
};
