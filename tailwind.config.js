import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Comfortaa', ...defaultTheme.fontFamily.sans],
                comfortaa: ['Comfortaa', ...defaultTheme.fontFamily.sans],

            },

            colors: {
                'blue': '#1fb6ff',
                'purple': '#7e5bef',
                'pink': '#FF91B2',
                'wheat': '#F6F3EC',
                'green': '#9CC4B9',
                'yellow': '#ffc82c',
                'gray-dark': '#273444',
                'gray': '#8492a6',
                'gray-light': '#d3dce6',
              }
        },
    },

    plugins: [forms],
};
