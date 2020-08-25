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
    .sass('resources/sass/main.scss', 'public/css/main.css')
    .sass('resources/sass/public/home.scss', 'public/css/home.css')
    .sass('resources/sass/public/base-template.scss', 'public/css/base-template.css')
    .sass('resources/sass/public/authentication.scss', 'public/css/login-cart.css')
    .sass('resources/sass/public/product-cart.scss', 'public/css/product-cart.css')
    .sass('resources/sass/public/product.scss', 'public/css/product.css');
