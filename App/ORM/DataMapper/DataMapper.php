<?php

namespace Application\ORM\DataMapper;

use Application\DatabaseConnection\DatabaseConnectionInterface;
use Application\ORM\DataMapper\Exception\DataMapperException;
use PDO;
use PDOStatement;
use Throwable;

class DataMapper implements DataMapperInterface
{
    /**
     * @var DatabaseConnectionInterface
     */
    private DatabaseConnectionInterface $db;

    /**
     * @var PDOStatement
     */
    private PDOStatement $stmt;

    /**
     * Main constructor class
     * 
     * @param DatabaseConnectionInterface $db
     * @return void
     */
    public function __construct(DatabaseConnectionInterface $db)
    {
        $this->db = $db;
    }

    /**
     * 
     */
    private function isEmpty(mixed $value, string $errorMessage = null)
    {
        if (empty($value)) {
            throw new DataMapperException($errorMessage);
        }
    }

    /**
     * 
     */
    private function isArray(mixed $value, string $errorMessage = null)
    {
        if (!is_array($value)) {
            throw new DataMapperException($errorMessage);
        }
    }

    /**
     * @inheritDoc
     */
    public function prepare(string $sqlQuery): self
    {
        $this->stmt = $this->db->open()->prepare($sqlQuery);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function bind(mixed $value)
    {
        try {
            switch ($value) {
                case is_bool($value):
                case intval($value):
                    $dataType = PDO::PARAM_INT;
                    break;
                case is_null($value):
                    $dataType = PDO::PARAM_NULL;
                    break;
                default:
                    $dataType = PDO::PARAM_STR;
                    break;
            }
            return $dataType;
        } catch (DataMapperException $exception) {
            throw $exception;
        }
    }

    /**
     * Binds a value to a corresponding name or question mark placeholder
     * in the SQL statement that was used to prepare the statement
     * 
     * @param array $fields
     * @return PDOStatement
     * @throws DataMapperException
     */
    protected function bindValues(array $fields): PDOStatement
    {
        $this->isArray($fields, "Your argument needs to be an array");
        foreach ($fields as $key => $value) {
            $this->stmt->bindValue(":" . $value, $value, $this->bind($value));
        }

        return $this->stmt;
    }

    /**
     * @inheritDoc
     */
    public function bindParameters(array $fields, bool $isSearch = false): self
    {
        if (is_array($fields)) {
            $type = ($isSearch == false) ? $this->bindValues($fields) : $this->bindSearchValues($fields);
            if ($type) return $this;
        }

        return false;
    }

    /**
     * @param array $fields
     * @return PDOStatement
     */
    protected function bindSearchValues(array $fields): PDOStatement
    {
        $this->isArray($fields, "Your argument needs to be an array");
        foreach ($fields as $key => $value) {
            $this->stmt->bindValue(":" . $value, "%" . $value . "%", $this->bind($value));
        }

        return $this->stmt;
    }

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        if ($this->stmt) $this->stmt->execute();
    }

    /**
     * @inheritDoc
     */
    public function numRows(): int
    {
        if ($this->stmt) return $this->stmt->rowCount();
    }

    /**
     * @inheritDoc
     */
    public function result(): object
    {
        if ($this->stmt) return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @inheritDoc
     */
    public function results(): array
    {
        if ($this->stmt) return $this->stmt->fetchAll();
    }

    /**
     * @inheritDoc
     */
    public function getLastId(): int
    {
        try {
            if ($this->db->open()) {
                $lastId = $this->db->open()->lastInsertId();
                if (!empty($lastId)) return intval($lastId);
            }
        } catch (Throwable $throwable) {
            throw $throwable;
        }
    }
}
