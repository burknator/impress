<?php

namespace Impress\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{

    /**
     * Overwrite and extend app configuration.
     *
     * Load a user defined config.json from base path and pass the parsed contents to config()-helper.
     *
     * @return void
     */
    public function register()
    {
        try {
            config($this->app['userConfig']->load());
        } catch(NotReadableException $e) {
            // TODO Give feedback
        }
    }
}
