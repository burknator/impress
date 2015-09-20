<?php

namespace Impress\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('exists', function ($expression) {
            $expression = trim($expression, '()');

            return "<?php if (isset({$expression})): ?>";
        });

        Blade::directive('endexists', function ($expression) {
            return "<?php endif; ?>";
        });

        Blade::directive('icon', function($expression) {
            $expression = trim($expression, "'()");

            return "<span class=\"glyphicon glyphicon-{$expression}\"></span>";
        });

        /**
         * Creates an HTML5 <time> element with datetime attribute and Bootstrap tooltip with a detailed version of that
         * same timestamp.
         */
        Blade::directive('time', function($expression) {
            $expression = trim($expression, "'()");
            list($carbon, $method) = array_map(function($el) { return trim($el, " '\""); }, explode(',', $expression));

            $text = $carbon . '->' . $method . '()';
            $timestamp = $carbon . '->toRfc3339String()';

            return '<time datetime="<?= ' . $timestamp . ' ?>"'
                   . ' data-toggle="tooltip"'
                   . ' title="<?= ' . $carbon . ' ?>"'
                   . '><?= ' . $text . ' ?></time>';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
