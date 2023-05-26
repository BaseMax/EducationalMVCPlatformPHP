<?php

namespace Application\Models;

use DateTime;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity()]
#[Table("users")]
class User extends Model
{
    /**
     * @var int $id
     */
    #[Id]
    #[Column(), GeneratedValue()]
    private int $id;

    /**
     * @var string $name
     */
    #[Column(type: Types::STRING)]
    private string $name;

    /**
     * @var string $email
     */
    #[Column(type: Types::STRING)]
    private string $email;

    /**
     * @var string $password
     */
    #[Column(type: Types::STRING)]
    private string $password;

    /**
     * @var DateTime $created_at
     */
    #[Column()]
    private DateTime $created_at;

    /**
     * @var DateTime $updated_at
     */
    #[Column()]
    private DateTime $updated_at;


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
     * Getter for id
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Getter for name
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Getter for email
     * 
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
