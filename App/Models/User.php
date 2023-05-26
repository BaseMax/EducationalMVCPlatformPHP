<?php

namespace Application\Models;

use Application\Facades\Hash;
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

        return $builder->select("*")->from("users")->fetchAllAssociative();
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

    /**
     * Getter for password
     * 
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Setter for name
     * 
     * @param string $name
     * @return this
     */
    public function setName(string $name): User
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Setter for email
     * 
     * @param string $email
     * @return this
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Setter for password
     * 
     * @param string $password
     * @return this
     */
    public function setPassword(string $password): User
    {
        $this->password = Hash::hash($password);

        return $this;
    }

    /**
     * Setter for created_at
     * 
     * @param DateTime $now
     * @return this
     */
    public function setCreatedAt(DateTime $now): User
    {
        $this->created_at = $now;

        return $this;
    }

    /**
     * Setter for updated_at
     * 
     * @param DateTime $now
     * @return this
     */
    public function setUpdatedAt(DateTime $now): User
    {
        $this->updated_at = $now;

        return $this;
    }
}
