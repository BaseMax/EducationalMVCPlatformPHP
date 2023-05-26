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

        $db_name = $this->config["db_name"];
        $db_host = $this->config["db_host"];
        $db_user = $this->config["db_user"];
        $db_password = $this->config["db_password"];

        $this->db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    }

    /**
     * Create users table
     * 
     * @return void
     */
    public function users(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255),
            email VARCHAR(255),
            password VARCHAR(255),
            created_at TIMESTAMP,
            updated_at TIMESTAMP
        );";

        ($this->db->prepare($sql))->execute();
    }


    /**
     * Create Content table
     * 
     * @return void
     */
    public function content(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS content (
            id INT PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(255),
            description TEXT,
            type ENUM('video', 'lecture', 'quiz'),
            content_file VARCHAR(255),
            created_at TIMESTAMP,
            updated_at TIMESTAMP
        );";

        ($this->db->prepare($sql))->execute();
    }

    /**
     * Create progress table
     * 
     * @return void
     */
    public function progress(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS progress (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT,
            content_id INT,
            completed BOOLEAN,
            created_at TIMESTAMP,
            updated_at TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (content_id) REFERENCES content(id)
        );";

        ($this->db->prepare($sql))->execute();
    }

    /**
     * Create Quizzes table
     * 
     * @return void
     */
    public function quizzes(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS quizzes (
            id INT PRIMARY KEY AUTO_INCREMENT,
            content_id INT,
            title VARCHAR(255),
            created_at TIMESTAMP,
            updated_at TIMESTAMP,
            FOREIGN KEY (content_id) REFERENCES content(id)
        );";

        ($this->db->prepare($sql))->execute();
    }

    /**
     * Create Questions table
     * 
     * @return void
     */
    public function questions(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS questions (
            id INT PRIMARY KEY AUTO_INCREMENT,
            quiz_id INT,
            question TEXT,
            created_at TIMESTAMP,
            updated_at TIMESTAMP,
            FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
        );";

        ($this->db->prepare($sql))->execute();
    }

    /**
     * Create Answers table
     * 
     * @return void
     */
    public function answers(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS answers (
            id INT PRIMARY KEY AUTO_INCREMENT,
            question_id INT,
            answer TEXT,
            correct BOOLEAN,
            created_at TIMESTAMP,
            updated_at TIMESTAMP,
            FOREIGN KEY (question_id) REFERENCES questions(id)
        );";

        ($this->db->prepare($sql))->execute();
    }
}
