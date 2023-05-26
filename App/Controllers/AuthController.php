<?php

namespace Application\Controllers;

use Application\Exceptions\ValidationError;
use Application\Facades\Hash;
use Application\Facades\JWT;
use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\User;
use DateTime;

class AuthController extends Controller
{
    public function register()
    {
        $userData = $this->validate(Request::post(), [
            "name"     => "required|min:5",
            "email"    => "required|email",
            "password" => "required|min:6",
        ]);

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
        $userData = $this->validate(Request::post(), [
            "email"    => "required|email",
            "password" => "required|min:6"
        ]);

        $entityManager = (new User())->getEntityManager();

        $user = $entityManager->getRepository(User::class)->findOneBy([
            "email"    => $userData["email"],
        ]);

        if (!$user) ValidationError::error(["you are not registered yet."]);

        if (!Hash::verify($userData["password"], $user->getPassword())) ValidationError::error(["your password is incorrect."]);

        return Response::json([
            "token" => JWT::encode([
                $user->getName(),
                $user->getEmail(),
                $user->getPassword()
            ])
        ]);
    }
}
