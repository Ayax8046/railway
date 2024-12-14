const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue() // Agrega soporte para Vue.js
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
