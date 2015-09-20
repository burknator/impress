<?php

namespace Impress;

use Impress\Exceptions\UserConfig\NotReadableException;

class UserConfig
{
    protected $commentRegExp = "#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#";

    protected function filePath()
    {
        return config('impress.user_config_file');
    }

    /**
     * Read content of user configuration file.
     *
     * @throws NotReadableException
     * @return string|bool False when there is no user config file.
     */
    protected function read()
    {
        $configFilePath = $this->filePath();
        if (!file_exists($configFilePath)) {
            return false;
        }

        $config = file_get_contents($configFilePath);
        if ($config === false) {
            throw new NotReadableException('Couldn\'t read file content of user configuration file.');
        }

        return $config;
    }

    /**
     * Write new content to user configuration file.
     *
     * @param $content
     * @return int|bool
     */
    protected function write($content)
    {
        return file_put_contents($this->filePath(), $content);
    }

    /**
     * Parses user configuration file into an PHP array and returns it. Returns empty array when there is now config
     * file.
     *
     * @throws NotReadableException
     * @return array
     */
    public function load()
    {
        $config = $this->read();
        if ($config === false) {
            return [];
        }

        // Comments are not allowed in JSON and therefore need to be removed before decoding.
        // Thanks @ http://php.net/manual/de/function.json-decode.php#112735
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
     * @param array $config
     * @return int|bool
     */
    public function save($config)
    {
        $fileContent = $this->read();

        foreach ($this->load() as $setting => $value) {
            if ( ! isset($config[$setting])) {
                continue;
            }

            $pattern = '~(^\s*"' . preg_quote($setting) . '"\s*:\s*)".*"(.*)~mi';
            $replacement = '$1"' . $config[$setting] . '"$2';

            $fileContent = preg_replace($pattern, $replacement, $fileContent);
        }

        return $this->write($fileContent);
    }
}
