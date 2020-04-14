<?php

if (! function_exists('array_get')) {
    /**
     * Get value from array. Return null if key not found.
     *
     * @param  string $array
     * @param  string $key
     * @return mixed
     */
    function array_get($array, $key)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
    }
}
