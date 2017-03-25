<?php

use Muffeen\Framework\Components\Container;
use Muffeen\Framework\Components\Loader;
use Muffeen\Framework\Components\Request;
use Muffeen\Framework\Components\Router;
use Muffeen\Framework\Exception\RouteException;


/**************************************************
 *	Boostrap File
 *************************************************/

/**
 *	Require composer autoload
 */

require '../vendor/autoload.php';


/**
 *	Load configuration files and save to container
 */

Container::bind('config', require '../config/app.php');


/**
 *	Add root directory path to container
 */

Container::bind('root_dir', dirname(__DIR__));


/**
 *	Set timezone
 */

date_default_timezone_set(Container::get('config')['timezone']);


/**
 *	Enable debugger on development
 */

if (config('environment') !== 'production') {
	\Symfony\Component\Debug\Debug::enable();
	if (config('environment') !== 'development') {
		throw new Exception('Unknown enviroment configuration is set.');
	}
}


/**
 *	Get user defined routes
 */

require '../config/routes.php';


/**
 *	Bind empty PDO to container
 */

Container::bind('pdo', null);


/**
 *	Load page
 */

Loader::loadPage(
	Router::getRoute(Request::method(), Request::uri())
);