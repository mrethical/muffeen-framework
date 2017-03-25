<?php

namespace Muffeen\Framework\Components;

use Muffeen\Framework\Components\Request;
use Muffeen\Framework\Exception\RouteException;

class Router
{

	protected static $routes = array(
		'GET' => array(),
		'POST' => array(),
		'PATCH' => array(),
		'DELETE' => array()
	);

	public static function get($uri, $controller)
	{
		static::$routes['GET'][$uri] = $controller;
	}

	public static function post($uri, $controller)
	{
		static::$routes['POST'][$uri] = $controller;
	}

	public static function put($uri, $controller)
	{
		static::$routes['PATCH'][$uri] = $controller;
	}

	public static function patch($uri, $controller)
	{
		static::$routes['PATCH'][$uri] = $controller;
	}

	public static function delete($uri, $controller)
	{
		static::$routes['DELETE'][$uri] = $controller;
	}

	public static function routeExist($method, $uri)
	{
		$uri = explode('?', $uri)[0];
		return isset(static::$routes[$method][$uri]);
	}

	public static function checkIfCurrentRouteExist()
	{
		if (!self::routeExist(Request::method(), Request::uri())) {
			exception(
				new RouteException('No routes have matched the specified uri.'),
				true
			);
		}
	}

	public static function getRoute($method, $uri)
	{
		self::checkIfCurrentRouteExist();
		return static::$routes[$method][$uri];
	}

}