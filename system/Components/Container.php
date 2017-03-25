<?php

namespace Muffeen\Framework\Components;

use Muffeen\Framework\Exception\ContainerException;

class Container
{

    protected static $registry = array();

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            exception(
                new ContainerException('No ' . $key . ' is bound in the container.')
            );
        }
        return static::$registry[$key];
    }

}