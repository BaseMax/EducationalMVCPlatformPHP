<?php

namespace Application\Facades;

class Response extends Facade
{
    /**
     * Status code NOT FOUND
     * 
     * @var int $NOT_FOUND
     */
    public static int $NOT_FOUND = 404;


    /**
     * Set status code of response
     * 
     * @param int $statusCode
     * @return void
     */
    public static function statusCode(int $statusCode = 200): void
    {
        http_response_code($statusCode);
    }

    /**
     * Returns json_encode of an array
     * 
     * @param array $data
     * @param int $statusCode
     * @return string
     */
    public static function json(array $data, int $statusCode = 200): string
    {
        self::statusCode($statusCode);
        self::json_header();

        return json_encode($data);
    }


    /**
     * Set application/json header
     * 
     * @return void
     */
    public static function json_header(): void
    {
        header("Content-Type: application/json");
    }
}
