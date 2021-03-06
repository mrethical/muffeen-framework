<?php

namespace Muffeen\Framework\Components;

class Request
{
    /**
     * Get parameters from GET request.
     *
     * @param  string $input
     * @return mixed
     */
    public static function get($input = null)
    {
        if ($input === null) {
            return $_GET;
        }
        if (isset($_GET[$input])) {
            return $_GET[$input];
        }
    }

    /**
     * Get parameters from POST request.
     *
     * @param  string $input
     * @return mixed
     */
    public static function post($input = null)
    {
        if ($input === null) {
            return $_POST;
        }
        if (isset($_POST[$input])) {
            return $_POST[$input];
        }
    }

    /**
     * Get files from request.
     *
     * @param  string $file
     * @return mixed
     */
    public static function files($file = null)
    {
        if ($file === null) {
            return $_FILES;
        }
        if (isset($_FILES[$file])) {
            return $_FILES[$file];
        }
    }

    /**
     * Get url path.
     *
     * @return string
     */
    public static function uri()
    {
        return explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    /**
     * Get request method.
     *
     * @return string
     */
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

    /**
     * Check if request is ajax.
     *
     * @return bool
     */
    public static function isAjax()
    {
        return strtolower(array_get($_SERVER, 'HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest';
    }
}
