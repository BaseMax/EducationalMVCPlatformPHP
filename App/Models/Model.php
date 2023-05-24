<?php

namespace Application\Models;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class Model
{
    /**
     * Entity Manager for ORM
     * 
     * @var EntityManager $entityManager
     */
    protected EntityManager $entityManager;


    /**
     * Main constructor class of class
     */
    public function __construct()
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: ["./../.." . "/App"],
            isDevMode: true
        );

        $connection = DriverManager::getConnection([
            "driver" => "pdo_mysql",
        ], $config);

        $this->entityManager = new EntityManager($connection, $config);
    }
}
