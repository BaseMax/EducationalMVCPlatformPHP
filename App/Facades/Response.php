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
}
