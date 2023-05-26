<?php

namespace Application\Controllers;

use Application\Facades\Response;
use Application\Models\User;

class ContentController extends Controller
{
    public function index()
    {
    }

    public function show($id)
    {
        $result = User::find(1);
        return Response::json([
            $result
        ], 200);
    }

    public function store()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
