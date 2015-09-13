<?php

namespace Impress\Providers;

use Impress\Http\Composers\CategoryAttributesComposer;
use Impress\Http\Composers\ContentAttributesComposer;
use Impress\Http\Composers\TagAttributesComposer;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('contents._attributes', ContentAttributesComposer::class);
        View::composer('categories._attributes', CategoryAttributesComposer::class);
        View::composer('tags._attributes', TagAttributesComposer::class);
    }
}
