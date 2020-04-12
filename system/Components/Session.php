<?php

namespace Muffeen\Framework\Components;

class Session
{
    /** @var bool */
    protected static $session_started = false;

    /**
     * Initialize session.
     *
     * @return void
     */
    protected static function initSession()
    {
        if (!self::$session_started) {
            session_start();
            self::$session_started = true;
        }
    }

    /**
     * Set session.
     *
     * @param  string $key
     * @param  string $value
     * @return void
     */
    public static function set($key, $value)
    {
        self::initSession();
        $_SESSION[$key] = $value;
    }

    /**
     * Remove key from session.
     *
     * @param  string $key
     * @return void
     */
    public static function remove($key)
    {
        self::initSession();
        if (array_key_exists($key, $_SESSION)) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Get session.
     *
     * @param  string $input
     * @return mixed
     */
    public static function get($input)
    {
        self::initSession();
        if (isset($_SESSION[$input])) {
            return $_SESSION[$input];
        }
        return null;
    }
}
