<?php

namespace Muffeen\Framework\Components;

use Muffeen\Framework\Exception\RouteException;

class Router
{
    /** @var array */
	protected static $routes = array(
		'GET' => array(),
		'POST' => array(),
		'PATCH' => array(),
		'DELETE' => array()
	);

    /**
     * Add GET route.
     *
     * @param  string $uri
     * @param  string $controller
     */
	public static function get($uri, $controller)
	{
		static::$routes['GET'][$uri] = $controller;
	}

    /**
     * Add POST route.
     *
     * @param  string $uri
     * @param  string $controller
     */
	public static function post($uri, $controller)
	{
		static::$routes['POST'][$uri] = $controller;
	}

    /**
     * Add PUT(PATCH) route.
     *
     * @param  string $uri
     * @param  string $controller
     */
	public static function put($uri, $controller)
	{
		static::$routes['PATCH'][$uri] = $controller;
	}

    /**
     * Add PATCH route.
     *
     * @param  string $uri
     * @param  string $controller
     */
	public static function patch($uri, $controller)
	{
		static::$routes['PATCH'][$uri] = $controller;
	}

    /**
     * Add DELETE route.
     *
     * @param  string $uri
     * @param  string $controller
     */
	public static function delete($uri, $controller)
	{
		static::$routes['DELETE'][$uri] = $controller;
	}

    /**
     * Check if route exists.
     *
     * @param  string $method
     * @param  string $uri
     * @return bool
     */
	public static function isRouteExisting($method, $uri)
	{
		$uri = explode('?', $uri)[0];
		return isset(static::$routes[$method][$uri]);
	}

    /**
     * Validate route.
     *
     * @throws \Exception
     */
	public static function validateRoute()
	{
		if (!self::isRouteExisting(Request::method(), Request::uri())) {
			handle_exception(
				new RouteException('No routes have matched the specified uri.'),
				true
			);
		}
	}

    /**
     * Match route from declared routes.
     *
     * @param  string $method
     * @param  string $uri
     * @return string
     */
	public static function getRoute($method, $uri)
	{
		self::validateRoute();
		return static::$routes[$method][$uri];
	}
}
