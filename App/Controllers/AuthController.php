<?php

namespace Application\Controllers;

use Application\Facades\Response;
use Application\Models\User;

class AuthController extends Controller
{
    public function register()
    {;

        return Response::json([
            "detail" => User::all()
        ]);
    }

    public function login()
    {
    }

    public function logout()
    {
    }
}
