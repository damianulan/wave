// webpack.mix.js

let mix = require('laravel-mix');

// misc
mix.copyDirectory('resources/themes/vendors', 'public/themes/vendors');
mix.copyDirectory('resources/images', 'public/images');

// theme-light
mix.js('resources/themes/wave-light/app.js', 'public/themes/wave-light')
    .sass('resources/themes/wave-light/app.scss', 'public/themes/wave-light')
    .copyDirectory('resources/themes/wave-light/images', 'public/themes/wave-light/images')
    .version();

// theme-dark 
// mix.js('resources/themes/wave-dark/app.js', 'public/themes/wave-dark')
//     .sass('resources/themes/wave-dark/app.scss', 'public/themes/wave-dark')
//     .copyDirectory('resources/themes/wave-dark/images', 'public/themes/wave-dark/images')
//     .version();
