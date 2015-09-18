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
        $configFilePath = base_path('config.json');
        if (!file_exists($configFilePath)) {
            // TODO Agree on throwing Exception or give some soft feedback for the user.
        }

        $config = file_get_contents($configFilePath);
        if ($config === false) {
            // TODO Agree on throwing Exception or give some soft feedback for the user.
        }

        // Comments are not allowed in JSON and therefore need to be removed before decoding.
        // Thanks @ http://php.net/manual/de/function.json-decode.php#112735
        $config = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#", '', $config);

        $jsonConfig = json_decode($config, true);
        if ($jsonConfig === false) {
            // TODO Agree on throwing Exception or give some soft feedback for the user.
        }

        config($jsonConfig);
    }
}
