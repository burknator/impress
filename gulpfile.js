var gulp   = require('gulp'),
    elixir = require('laravel-elixir');

elixir.config.js.browserify.transformers = [{
    name: 'coffeeify',
    options: {
        'sourceMap': true
    }
}];

elixir(function (mix) {
    mix.browserify('main.coffee')
       .less('app.less');
});
