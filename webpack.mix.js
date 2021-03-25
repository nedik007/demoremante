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


if (Mix.sees('laravel')) {
    Config.publicPath = 'web';
}

// mix.js('resources/js/app.js', 'web/js')
//     .postCss('resources/css/app.css', 'web/css', [
//         //
//     ]);
mix.js('resources/js/app.js', 'web/js').version();
mix.sass('resources/css/app.scss', 'web/css').version();
mix.copy('resources/images', 'web/images');
