var gulp   = require('gulp');
var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.less('app.less')
        .copy('resources/css', 'public/css')
        .copy('resources/js', 'public/js')
        .scripts([
            'jquery.js',
            'main.js'
        ], 'public/js/app.js');
});
