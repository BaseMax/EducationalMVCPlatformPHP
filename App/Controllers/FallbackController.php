<?php

namespace Application\Controllers;

use Application\Facades\Response;

class FallbackController extends Controller
{
    public function fallback()
    {
        return Response::json([
            "detail" => "Oops! The page you're looking for could not be found."
        ], Response::$NOT_FOUND);
    }
}
