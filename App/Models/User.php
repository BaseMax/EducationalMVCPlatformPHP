<?php

namespace Application\Models;

use Doctrine\DBAL\Query\QueryBuilder;

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
}
