// webpack.mix.js

let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/assets/js')
    .sass('resources/css/bootstrap.scss', 'public/assets/css')
    .sass('resources/css/app.scss', 'public/assets/css')
    .version();

