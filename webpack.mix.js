const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
mix.js('resources/js/jquery-3.6.0.min.js', 'public/js');
mix.js('resources/js/jquery.bxslider.min.js', 'public/js')
    .postCss('resources/css/jquery.bxslider.css', 'public/css', [
        //
    ]);
mix.js('resources/js/bootstrap.bundle.min.js', 'public/js')
    .postCss('resources/css/bootstrap.min.css', 'public/css', [
        //
    ]);
mix.copyDirectory('resources/images', 'public/images');
mix.copyDirectory('resources/fonts', 'public/fonts');
mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/css/sass/app.scss', 'public/css').version().minify('public/css/app.css');
