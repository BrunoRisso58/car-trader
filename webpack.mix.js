const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/app.js')
   .js('resources/js/navbar.js', 'public/js/navbar.js')
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps();

// Additional Laravel Mix configurations or asset compilation steps can be added below

mix.version();
