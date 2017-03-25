<?php

namespace Muffeen\Framework\Components\PDO;

use Muffeen\Framework\Components\Container;

class MySqlPDO
{

    /**
     * Create a new PDO connection.
     *
     * @param string $config
     * @param string $db_name
     * @param string $user
     * @param string $pass
     */
    public static function make()
    {
        $pdo = new \PDO(
            'mysql:host=' . Container::get('config')['mysql_host'] . 
            ';dbname=' . Container::get('config')['mysql_db'],
	        Container::get('config')['mysql_user'],
	        Container::get('config')['mysql_pass']
        );
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    }

}