<?php

namespace Application\Controllers;

use Application\Facades\Response;
use Application\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        $user = new User();

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
