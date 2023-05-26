<?php

namespace Application\Controllers;

use Application\Facades\Response;
use Application\Models\User;
use DateTime;

class AuthController extends Controller
{
    public function register()
    {
        $user = (new User())
            ->setName("ali")
            ->setEmail("Ali@gmail.com")
            ->setPassword("123456789")
            ->setCreatedAt(new DateTime())
            ->setUpdatedAt(new DateTime());
    }

    public function login()
    {
    }

    public function logout()
    {
    }
}
