<?php

namespace Application\Models;

use Application\Database\Config;
use Doctrine\DBAL\DriverManager;

class Model
{
    /**
     * Connection to database
     */
    protected $connection;



    /**
     * Main constructor of class
     * 
     * @return void
     */
    public function __construct()
    {
        $config = Config::config();

        $connectionParams = [
            'dbname' => $config["db_name"],
            'user' => $config["db_user"],
            'password' => $config["db_password"],
            'host' => $config["db_host"],
            'driver' => $config["db_driver"],
        ];

        $this->connection = DriverManager::getConnection($connectionParams);
    }
}
