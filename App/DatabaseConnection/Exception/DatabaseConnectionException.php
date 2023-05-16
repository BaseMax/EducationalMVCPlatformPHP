<?php

namespace Application\DatabaseConnection\Exception;

use PDOException;

class DatabaseConnectionException extends PDOException
{
    protected $message;
    protected $code;


    public function __construct($message = null, $code = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
}
