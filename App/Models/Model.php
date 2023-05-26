<?php

namespace Application\Models;

use Application\Database\Config;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class Model
{
    /**
     * Connection to database
     * 
     * @var Connection $connection
     */
    protected Connection $connection;


    /**
     * Query Builder instance
     * 
     * @var QueryBuilder $builder
     */
    protected QueryBuilder $builder;



    /**
     * Main constructor of class
     * 
     * @return void
     */
    public function __construct()
    {
        $config = Config::config();

        $connectionParams = [
            'dbname'    => $config["db_name"],
            'user'      => $config["db_user"],
            'password'  => $config["db_password"],
            'host'      => $config["db_host"],
            'driver'    => $config["db_driver"],
        ];

        $this->connection = DriverManager::getConnection($connectionParams);
        $this->builder = $this->connection->createQueryBuilder();
    }
}
