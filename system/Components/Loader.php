<?php

namespace Muffeen\Framework\Components;

use Muffeen\Framework\Exception\LoaderException;

class Loader
{
    /**
     * Process page request.
     *
     * @param  $controller_method
     * @return mixed
     */
    public static function loadPage($controller_method)
    {
        // initialize
        $controller_location = config('controller_path');
        $environment = config('environment');

        // run checks
        self::validateRoute($controller_method, $environment);
        $path = explode('@', $controller_method);
        self::validateController($controller_location.$path[0], $environment);
        $controller_path = $controller_location.$path[0];
        $controller = new $controller_path;
        self::validateControllerMethod($controller, $controller_path, $path[1], $environment);

        // process request
        $method = $path[1];

        return $controller->$method();
    }

    /**
     * Validate route.
     *
     * @param  string $controller_method
     * @param  string $environment
     * @return void
     */
    protected static function validateRoute($controller_method, $environment)
    {
        // check if route is provided
        if (empty($controller_method)) {
            self::runException('The specified controller on route is empty.', $environment);
        }
        // check if method is provided
        if (count(explode('@', $controller_method)) !== 2) {
            self::runException('Invalid controller on route.', $environment);
        }
    }

    /**
     * Validate controller.
     *
     * @param  string $controller
     * @param  string $environment
     * @return void
     */
    protected static function validateController($controller, $environment)
    {
        if (! class_exists($controller)) {
            self::runException('"'.$controller.'" does not exist.', $environment);
        }
    }

    /**
     * Validate controller method.
     *
     * @param  string $controller
     * @param  string $controller_name
     * @param  string $method
     * @param  string $environment
     * @return void
     */
    protected static function validateControllerMethod($controller, $controller_name, $method, $environment)
    {
        if (! method_exists($controller, $method)) {
            self::runException(
                'Method "'.$method.'" does not exist in "'.$controller_name.'".',
                $environment
            );
        }
    }

    /**
     * Handle loader exceptions.
     *
     * @param  string $message
     * @param  string $environment
     */
    protected static function runException($message, $environment)
    {
        handle_exception(new LoaderException($message));
    }
}
