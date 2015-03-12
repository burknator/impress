var gulp   = require('gulp');
var elixir = require('laravel-elixir');
var react  = require('gulp-react');

elixir.extend('reactjs', function(src, dest) {
    var jsPath = 'resources/js/';

    // Prepend JavaScript path to all entries in src
    if (src.constructor == Array) {
        src = src.map(function (element) {
            return jsPath + element;
        });
    } else if(typeof src == 'string') {
        src = jsPath + src;
    }

    gulp.task('react', function() {
        gulp.src(src)
            .pipe(react())
            .pipe(gulp.dest(dest || 'resources/js'));
    });

    this.registerWatcher('react', 'resources/js/**/*.jsx');

    return this.queueTask('react');
});

elixir(function(mix) {
    mix.less('app.less')
        .reactjs(['main.jsx'])
        .scripts([
            'jquery.js',
            'react.js',
            'main.js'
        ], 'public/js/app.js');
});
