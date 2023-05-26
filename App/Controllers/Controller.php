<?php

namespace Application\Controllers;

use Application\Exceptions\ValidationError;
use Rakit\Validation\Validator;

class Controller
{
    public function validate(array $userData, array $rules)
    {
        $validation = (new Validator())->make($userData, $rules);

        $validation->validate();

        if ($validation->fails()) ValidationError::error($validation->errors()->firstOfAll());

        return $userData;
    }
}
