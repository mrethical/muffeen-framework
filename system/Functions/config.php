<?php

use Muffeen\Framework\Components\Container;

if (! function_exists('config')) {
    /**
     * Get configuration.
     *
     * @param  string $key
     * @return mixed
     */
    function config($key) {
        $config = Container::get('config');
        return $config[$key];
    }
}
