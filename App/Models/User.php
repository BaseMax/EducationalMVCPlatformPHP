<?php

namespace Application\Models;

use Doctrine\ORM\Mapping as ORM;

class User extends Model
{
    /**
     * Main constructor of class
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns all users from users table
     * 
     * @return array
     */
    public static function all(): array
    {
        $userInstance = new User();

        $stmt = $userInstance->connection->prepare("SELECT * FROM users");

        return ($stmt->executeQuery())->fetchAllAssociative();
    }
}
