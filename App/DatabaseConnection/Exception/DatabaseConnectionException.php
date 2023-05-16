<?php

namespace Application\DatabaseConnection\Exception;

use PDOException;

class DatabaseConnectionException extends PDOException
{
    /**
     * Main constructor class which overrides the parent constructor 
     * and set the message and the code properties which is optional
     * 
     * @param string $message
     * @param int $code
     * @return void
     */
    public function __construct(string $message = null, int $code = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
}
