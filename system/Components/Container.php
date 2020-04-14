<?php

namespace Muffeen\Framework\Components;

use Muffeen\Framework\Exception\ContainerException;

class Container
{
    /** @var array */
    protected static $registry = array();

    /**
     * Bind value to container.
     *
     * @param  string $key
     * @param  mixed $value
     */
    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     * Get value from container.
     *
     * @param   string $key
     * @return  mixed
     */
    public static function get($key)
    {
        if (! array_key_exists($key, static::$registry)) {
            handle_exception(new ContainerException('No '.$key.' is bound in the container.'));
        }

        return static::$registry[$key];
    }
}
