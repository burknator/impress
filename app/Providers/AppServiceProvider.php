<?php

namespace Impress\Providers;

use Impress\Content;
use Impress\UserConfig;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // To ensure the last editor is set no matter how he or she does it.
        Content::updating(function (Content $content) {
            $content->lastEditor()->associate(auth()->user());
        });
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'Impress\Services\Registrar'
        );

        $this->app->singleton('UserConfig', function ($app) {
            return new UserConfig();
        });
    }
}
