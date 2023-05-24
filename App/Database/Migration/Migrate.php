<?php

namespace Application\Database\Migration;

use Application\Database\Config;
use PDO;

class Migrate
{
    /**
     * Config of database
     * 
     * @var array $config
     */
    private array $config;

    /**
     * Database connection
     * 
     * @var PDO $db
     */
    private PDO $db;


    /**
     * Main constructor of class
     * 
     * @return void
     */
    public function __construct()
    {
        $this->config = Config::config();

        $db_name = $this->config["DB_NAME"];
        $db_host = $this->config["DB_HOST"];
        $db_user = $this->config["DB_USER"];
        $db_password = $this->config["DB_PASSWORD"];

        $this->db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    }

    /**
     * Create users table
     * 
     * @return void
     */
    public function users(): void
    {
    }


    /**
     * Create Content table
     * 
     * @return void
     */
    public function content(): void
    {
    }

    /**
     * Create progress table
     * 
     * @return void
     */
    public function progress(): void
    {
    }

    /**
     * Create Quizzes table
     * 
     * @return void
     */
    public function quizzes(): void
    {
    }

    /**
     * Create Questions table
     * 
     * @return void
     */
    public function questions(): void
    {
    }

    /**
     * Create Answers table
     * 
     * @return void
     */
    public function answers(): void
    {
    }
}
