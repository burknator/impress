<?php

namespace Impress\Support;

use Impress\Exceptions\UserConfig\NotReadableException;

class UserConfig
{
    // Thanks @ http://php.net/manual/de/function.json-decode.php#112735
    protected $commentRegExp = "#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#";

    /**
     * Returns the fully qualified path to the user configuration file.
     *
     * @return string
     */
    protected function filePath()
    {
        return config('impress.user_config_file');
    }

    /**
     * Read content of user configuration file, returns false if there no such file.
     *
     * @return string|bool
     *
     * @throws \Impress\Exceptions\UserConfig\NotReadableException
     */
    protected function read()
    {
        $path = $this->filePath();
        if (!file_exists($path)) {
            return false;
        }

        $content = file_get_contents($path);
        if ($content === false) {
            throw new NotReadableException('Cannot read user configuration file.');
        }

        return $content;
    }

    /**
     * Write new content to user configuration file.
     *
     * @param  string   $content
     * @return int|bool
     */
    protected function write($content)
    {
        return file_put_contents($this->filePath(), $content);
    }

    /**
     * Parses user configuration file into an PHP array and returns it. Returns
     * empty array when there is now config file.
     *
     * @return array
     *
     * @throws \Impress\Exceptions\UserConfig\NotReadableException
     */
    public function load()
    {
        $config = $this->read();
        if ($config === false) {
            // TODO Maybe let the user know that we couldn't find a user config, as
            // this is unusual
            return [];
        }

        // Comments are not allowed in JSON and therefore need to be removed
        // before decoding.
        $config = preg_replace($this->commentRegExp, '', $config);

        $jsonConfig = json_decode($config, true);
        if ($jsonConfig === false) {
            throw new NotReadableException('Error while decoding content of user configuration.');
        }

        // TODO Cache decoded configuration

        return $jsonConfig;
    }

    /**
     * Replaces passed configuration values in the user's configuration file and saves it.
     *
     * @param  array    $config
     * @return int|bool
     */
    public function save($config)
    {
        $fileContent = $this->read();

        foreach ($this->load() as $setting => $value) {
            if ( ! isset($config[$setting])) {
                continue;
            }

            // Should match ony not commented lines of JSON assignments
            $pattern = '~(^\s*"' . preg_quote($setting) . '"\s*:\s*)".*"(.*)~mi';

            // Replace line with new value while keeping any previous whitespace
            $replacement = '$1"' . $config[$setting] . '"$2';

            $fileContent = preg_replace($pattern, $replacement, $fileContent);
        }

        return $this->write($fileContent);
    }
}
