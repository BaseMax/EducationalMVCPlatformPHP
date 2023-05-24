<?php

namespace Application\Controllers;

use Application\Facades\Response;
use Application\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        new User();
        return Response::json([
            "detail" => "ok"
        ]);
    }

    public function login()
    {
    }

    public function logout()
    {
    }
}
