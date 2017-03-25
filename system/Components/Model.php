<?php

namespace Muffeen\Framework\Components;

use Muffeen\Framework\Components\PDO;

class Model 
{

	protected static $pdo;

	protected static function initialize()
	{
		if (null === Container::get('pdo')) {
			if (Container::get('config')['db_connection'] === 'mysql') {
				Container::bind('pdo', PDO\MySqlPDO::make());
			}
		}
		self::$pdo = Container::get('pdo');
	}

}