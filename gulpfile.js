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
    'resources': 'resources/assets',
    'node_modules': 'node_modules',
    'bootstrap': 'node_modules/bootstrap-sass/assets'
};


elixir(function(mix) {

    mix.copy(paths.bootstrap+'/fonts/bootstrap', 'public/fonts/bootstrap');

    mix.copy(paths.resources+'/css/docs.min.css', 'public/css/docs.min.css');
    mix.copy(paths.resources+'/css/bootstrap-theme.min.css', 'public/css/bootstrap-theme.min.css');

    mix.copy(paths.resources+'/js/jquery.min.js', 'public/js/jquery.min.js');
    mix.copy(paths.bootstrap+'/javascripts/bootstrap.min.js', 'public/js/bootstrap.min.js');
    mix.copy(paths.node_modules+'/vue/dist/vue.js', 'public/js/vue.js');

    mix.sass('app.scss');

    mix.browserify('app.js');

});
