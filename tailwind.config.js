import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Comfortaa", ...defaultTheme.fontFamily.sans],
                comfortaa: ["Comfortaa", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: "#1fb6ff",
                purple: "#7e5bef",
                rose: "#FF91B2",
                beige: "#F6F3EC",
                vertPoudre: "#9CC4B9",
                yellow: "#ffc82c",
                "gray-dark": "#273444",
                gray: "#8492a6",
                "gray-light": "#d3dce6",
                farmata: "#EE964B",
            },
        },
    },
    plugins: [forms],
};
