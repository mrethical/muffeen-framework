<?php

namespace Muffeen\Framework\Components\PDO;

use Muffeen\Framework\Components\Container;

class MySqlPDO
{
    /**
     * Create a new PDO connection.
     *
     * @return \PDO
     */
    public static function make()
    {
        $config = Container::get('config');

        $pdo = new \PDO(
            'mysql:host='.$config['mysql_host'].';dbname='.$config['mysql_db'],
            $config['mysql_user'],
            $config['mysql_pass']
        );
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        return $pdo;
    }
}
