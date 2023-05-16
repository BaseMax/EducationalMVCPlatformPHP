<?php

namespace Application\DatabaseConnection;

use Application\DatabaseConnection\Exception\DatabaseConnectionException;
use PDO;
use PDOException;

class DatabaseConnection implements DatabaseConnectionInterface
{
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * @var array
     */
    protected array $credentials;


    /**
     * Main constructor class
     * 
     * @param array $credentials
     * @return void
     */
    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @inheritDoc
     */
    public function open(): PDO
    {
        try {
            $this->db = new PDO(
                $this->credentials["dsn"],
                $this->credentials["username"],
                $this->credentials["password"],
                [
                    PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $exception) {
            throw new DatabaseConnectionException($exception->getMessage(), (int)$exception->getCode());
        }

        return $this->db;
    }


    /**
     * @inheritDoc
     */
    public function close(): void
    {
        $this->db = null;
    }
}
