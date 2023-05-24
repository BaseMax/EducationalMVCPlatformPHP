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
            "db_password" => $_ENV["DB_PASSWORD"],
            "db_driver"   => $_ENV["DRIVER"]
        ];
    }

    /**
     * Returns DSN for connecting to database
     * 
     * @return array
     */
    public static function dsn(): array
    {
        $config = Config::config();

        $dsn = "{$config['db_driver']}:host={$config['db_host']};dbname={$config['db_name']};";

        return [
            "dsn"      => $dsn,
            "password" => $config["db_password"],
            "user"     => $config["db_user"]
        ];
    }
}
