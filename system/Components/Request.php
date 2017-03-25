<?php

namespace Muffeen\Framework\Components;

class Request
{

    public static function get($input = null)
    {
        if ($input === null) {
            return $_GET;
        }
        if (isset($_GET[$input])) {
            return $_GET[$input];
        }
        return null;
    }

    public static function post($input = null)
    {
        if ($input === null) {
            return $_POST;
        }
        if (isset($_POST[$input])) {
            return $_POST[$input];
        }
        return null;
    }

    public static function files($file = null)
    {
        if ($file === null) {
            return $_FILES;
        }
        if (isset($_FILES[$file])) {
            return $_FILES[$file];
        }
        return null;
    }

    public static function uri()
    {
        return explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    public static function method()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (self::post('_method') === 'PUT') {
                return 'PATCH';
            }
            if (self::post('_method') === 'PATCH') {
                return 'PATCH';
            }
            if (self::post('_method') === 'DELETE') {
                return 'DELETE';
            }
        }
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function isXmlHttpRequest()
    {
        return strtolower(array_get($_SERVER, 'HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest';
    }

}