<?php

namespace Application\Database;

class Config extends Database
{
    /**
     * Returns database config
     * 
     * @return array
     */
    public static function config(): array
    {
        return [
            "db_name"     => $_ENV["DB_NAME"],
            "db_host"     => $_ENV["DB_HOST"],
            "db_user"     => $_ENV["DB_USER"],
            "db_password" => $_ENV["DB_PASSWORD"]
        ];
    }
}
