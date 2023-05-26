<?php

namespace Application\Exceptions;

use Application\Facades\Response;

class ValidationError
{
    public static function error(array $messages = [], int $statusCode = 401): void
    {
        echo Response::json([
            "detail" => $messages
        ], $statusCode);

        exit;
    }
}
