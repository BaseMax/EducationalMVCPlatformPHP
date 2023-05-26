<?php

namespace Application\Models;

use Doctrine\DBAL\Query\QueryBuilder;

class User extends Model
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     * @var string $name
     */
    private string $name;

    /**
     * @var string $email
     */
    private string $email;

    /**
     * @var string $password
     */
    private string $password;


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
        $builder = (new User())->builder();

        return $builder->select("id")->from("users")->fetchAllAssociative();
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

    /**
     * Find an user with its id
     * 
     * @param int $id
     * @return array|bool
     */
    public static function find(int $id): array|bool
    {
        $builder = (new User())->builder();

        return $builder->select("*")
            ->from("users")
            ->where("id = ?")
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    /**
     * 
     */
}
