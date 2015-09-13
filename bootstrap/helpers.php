<?php

if (!function_exists('array_prepend')) {
    /**
     * Prepends a key value pair to an array.
     * @param  array $array
     * @param  mixed $key
     * @param  mixed $value
     * @return array
     */
    function array_prepend(array $array, $key, $value)
    {
        $output = [$key => $value];

        foreach ($array as $key => $value) {
            $output[$key] = $value;
        }

        return $output;
    }
}
