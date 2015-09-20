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
