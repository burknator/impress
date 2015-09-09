var gulp   = require('gulp'),
    elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.less('app.less')
        .copy('resources/css', 'public/css')
        .copy('resources/js', 'public/js')
        .copy('resources/fonts', 'public/fonts')
        .scripts([
            'jquery.js',
            'bootstrap.js',
            'main.js'
        ], 'public/js/app.js');
});
