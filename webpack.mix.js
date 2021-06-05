const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/cityautocomplete.js', 'public/js')
    .js('resources/js/delete-image.js', 'public/js')
    .js('resources/js/edit-comment.js', 'public/js')
    .js('resources/js/delete-comment.js', 'public/js')
    .js('resources/js/add-comment.js', 'public/js')
    .js('resources/js/vote-rate.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
