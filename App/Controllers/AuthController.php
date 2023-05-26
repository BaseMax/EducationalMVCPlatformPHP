<?php

namespace Application\Controllers;

use Application\Exceptions\ValidationError;
use Application\Facades\JWT;
use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\User;
use Rakit\Validation\Validator;
use DateTime;

class AuthController extends Controller
{
    public function register()
    {
        $userData = Request::post();

        $validation = (new Validator())->make($userData, [
            "name" => "required|min:5",
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        $validation->validate();

        if ($validation->fails()) {
            ValidationError::error($validation->errors()->firstOfAll());
        }

        $user = (new User())
            ->setName($userData["name"])
            ->setEmail($userData["email"])
            ->setPassword($userData["password"])
            ->setCreatedAt(new DateTime())
            ->setUpdatedAt(new DateTime());

        $user->getEntityManager()->persist($user);
        $user->getEntityManager()->flush();

        return Response::json(
            [
                "token" => JWT::encode([
                    $user->getName(),
                    $user->getEmail(),
                    $user->getPassword()
                ])
            ]
        );
    }

    public function login()
    {
    }
}
