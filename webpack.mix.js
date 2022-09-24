// webpack.mix.js

let mix = require('laravel-mix');

mix.js('resources/themes/wave-light/app.js', 'public/themes/wave-light')
    .sass('resources/themes/wave-light/app.scss', 'public/themes/wave-light')
    .copyDirectory('resources/themes/wave-light/images', 'public/themes/wave-light/images')
    .version();

