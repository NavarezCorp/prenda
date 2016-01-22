var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'jquery': './resources/assets/vendor/jquery/',
    'jqueryui': './resources/assets/vendor/jquery-ui/',
    'bootstrap': './node_modules/bootstrap-sass/',
    'fontawesome': './resources/assets/vendor/font-awesome/',
}

elixir(function(mix) {
    mix.sass(
        'app.scss',
        'public/css/',
        {
            includePaths: [
                paths.bootstrap + 'assets/stylesheets',
                paths.fontawesome + 'scss',
            ]
        }
    )
    .styles(
        [
            paths.jqueryui + 'themes/smoothness',
        ]
    )
    .scripts(
        [
            paths.jquery + 'dist/jquery.min.js',
            paths.jqueryui + 'jquery-ui.min.js',
            paths.jqueryui + 'ui',
            paths.bootstrap + 'assets/javascripts/bootstrap.min.js',
        ],
        'public/js/vendor.js'
    )
    .copy('resources/assets/js/app.js', 'public/js/app.js')
    .copy(paths.bootstrap + 'assets/fonts/bootstrap', 'public/fonts/bootstrap')
    .copy(paths.jqueryui + 'themes/smoothness/images', 'public/css/images')
    .copy(paths.fontawesome + 'fonts', 'public/fonts');
});
