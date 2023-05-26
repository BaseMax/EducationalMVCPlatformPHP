<?php

namespace Application\Facades;

use Application\Exceptions\ValidationError;

class Request extends Facade
{
    /**
     * Returns method that used in this request (GET, POST, PUT, DELETE)
     * 
     * @return string
     */
    public static function method(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    /**
     * Returns requested path
     * 
     * @return string
     */
    public static function path(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? false;
        $position = strpos($path, "?");

        if (!$position) return $path;
        else return substr($path, 0, $position);
    }

    /**
     * Returns posted data
     * 
     * @return array
     */
    public static function post(): array
    {
        return $_POST;
    }

    /**
     * Returns update data
     * 
     * @return array
     */
    public static function update(): array
    {
        $data = file_get_contents("php://input");
        return json_decode($data, true);
    }

    /**
     * Returns get data and query parameters
     * 
     * @return array
     */
    public static function get(): array
    {
        return $_GET;
    }

    /**
     * Returns JWT token that user sended that
     * 
     * @return string
     */
    public static function jwt(): string
    {
        $jwt = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

        if (!$jwt) ValidationError::error(["unauthorized user."], 401);

        return $jwt;
    }
}
