<?php

namespace Application\Controllers;

class AuthController extends Controller
{
    public function login($params)
    {
        return json_encode($params);
    }
}
