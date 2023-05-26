<?php

namespace Application\Controllers;

use Application\Exceptions\ValidationError;
use Application\Facades\Hash;
use Application\Facades\JWT;
use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\User;
use Rakit\Validation\Validator;

class Controller
{
    /**
     * 
     */
    public function validate(array $userData, array $rules)
    {
        $validation = (new Validator())->make($userData, $rules);

        $validation->validate();

        if ($validation->fails()) ValidationError::error($validation->errors()->firstOfAll());

        return $userData;
    }

    /**
     * Checking user token
     */
    public function auth()
    {
        $userData = JWT::decode(str_replace("Bearer ", "", Request::jwt()));

        $entityManager = (new User())->getEntityManager();

        $user = $entityManager->getRepository(User::class)->findOneBy([
            "email"    => $userData[1],
        ]);

        if ((!$user) || ($userData[2] != $user->getPassword())) ValidationError::error(["invalid token"]);
    }
}
