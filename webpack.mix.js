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

mix
    .styles('resources/views/admin/assets/main.css', 'public/css/admin/main.css')


    .sass("resources/sass/app.scss", "public/css/app.css")
    .styles("resources/views/site/assets/main.css", "public/css/site/main.css")
    .scripts("node_modules/jquery/dist/jquery.js", "public/js/jquery.js")
    .scripts("node_modules/bootstrap/dist/js/bootstrap.bundle.js", "public/js/bootstrap.js")
    .scripts("resources/views/admin/assets/form.js", "public/js/admin/form.js")
    .scripts("resources/views/site/assets/lazy-load.js", "public/js/site/lazy-load.js");

