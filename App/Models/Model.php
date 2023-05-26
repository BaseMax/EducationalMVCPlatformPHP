<?php

namespace Application\Models;

use Application\Database\Config;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

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
     * Entity manager
     * 
     * @var EntityManager $entityManager
     */
    protected EntityManager $entityManager;



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
        $this->entityManager = EntityManager::create($connectionParams, Setup::createAttributeMetadataConfiguration([__DIR__]));
    }

    /**
     * Access layer for Entity managment
     * 
     * @return EntityManager
     */

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    /**
     * Returns Query Builder instance
     * 
     * @return QueryBuilder
     */
    public function builder(): QueryBuilder
    {
        return $this->builder;
    }
}
