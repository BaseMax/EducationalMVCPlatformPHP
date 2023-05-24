<?php

namespace Application\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends Model
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @ORM\Column(type="string")
     */
    protected string $name;

    /**
     * @ORM\Column(type="string")
     */
    protected string $email;

    /**
     * @ORM\Column(type="string")
     */
    protected string $passwordHash;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

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
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * Setter for name
     * 
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Setter for email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Setter for passwordHash
     * 
     * @param string $passwordHash
     * @return void
     */
    public function setPasswordHash(string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * Returns name of user
     * 
     * @return string
     */
    public function toName(): string
    {
        return $this->name;
    }

    /**
     * Check password
     * 
     * @param string $password
     * @param callable $checkHash
     * @return bool
     */
    public function authenticate(string $password, callable $checkHash): bool
    {
        return $checkHash($password, $this->getPasswordHash());
    }

    /**
     * Changing password
     * 
     * @param string $password
     * @param callable $hash
     * @return void
     */
    public function changePassword(string $password, callable $hash): void
    {
        $this->setPasswordHash($hash($password));
    }
}
