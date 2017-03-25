<?php

namespace Muffeen\Framework\Components;

use Muffeen\Framework\Exception\LoaderException;

class Loader
{

	public static function loadPage($controller_method) 
	{
		$controller_location = config('controller_path');
		$environment = config('environment');
		self::checkIsControllerMethodEmpty($controller_method, $environment);
		self::checkIsControllerMethodValid($controller_method, $environment);
		$path = explode('@', $controller_method);
		self::checkControllerExist($controller_location . $path[0], $environment);
		$controller_path = $controller_location . $path[0];
		Container::bind('run_method', true);
		$controller = new $controller_path;
		self::checkControllerMethodExist($controller, $controller_path, $path[1], $environment);
        $method = $path[1];
		if (Container::get('run_method')) {
			return $controller->$method();
		}
	}

	protected static function checkIsControllerMethodEmpty($controller_method, $environment)
	{
		if (empty($controller_method)) {
			self::runException('The specified controller on route is empty.', $environment);
		}
	}

	protected static function checkIsControllerMethodValid($controller_method, $environment)
	{
		if (count(explode('@', $controller_method)) !== 2) {
			self::runException('Invalid controller on route.', $environment);
		}
	}

	protected static function checkControllerExist($controller, $environment)
	{
		if (!class_exists($controller)) {
			self::runException('"' . $controller . '" does not exist.', $environment);
		}
	}

	protected static function checkControllerMethodExist(
		$controller, 
		$controller_name, 
		$method, 
		$environment
	) {
		if (!method_exists($controller, $method)) {
			self::runException(
				'Method "' . $method . '" does not exist in "' . $controller_name . '".', 
				$environment
			);
		}
	}

	protected static function runException($message, $environment)
	{
        exception(
            new LoaderException($message)
        );
	}

}