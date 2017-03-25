<?php

namespace Muffeen\Framework\Components;

class Session
{

    protected static $session_started = false;

    protected function initSession()
    {
        if (!self::$session_started) {
            session_start();
            self::$session_started = true;
        }
    }

    public static function set($key, $value)
    {
        self::initSession();
        $_SESSION[$key] = $value;
    }

    public static function unset($key)
    {
        self::initSession();
        if (array_key_exists($key, $_SESSION)) {
            unset($_SESSION[$key]);
        }
    }

    public static function get($input)
    {
        self::initSession();
        if (isset($_SESSION[$input])) {
            return $_SESSION[$input];
        }
        return null;
    }

}