let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'js')
    .sass('resources/assets/sass/app.scss', 'css/all.css');
    // .scripts([
    //     'jquery/dist/jquery.js',
    //     'bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js',
    //     'bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js',
    //     'bootstrap-switch/dist/js/bootstrap-switch.js',
    //     'select2/dist/js/i18n/es.js',
    //     'select2/dist/js/i18n/pt-BR.js',
    //     'select2/dist/js/i18n/en.js',
