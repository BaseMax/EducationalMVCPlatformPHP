<?php

namespace Application\Controllers;

use Application\Facades\JWT;
use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\Content;
use Application\Models\User;

class ContentController extends Controller
{
    public function index()
    {
        $this->auth();

        $contents = (new Content)->builder()
            ->select("*")
            ->from("content")
            ->fetchAllAssociative();

        return Response::json($contents);
    }

    public function show($id)
    {
        $this->auth();
    }

    public function store()
    {
        $this->auth();
    }

    public function update()
    {
        $this->auth();
    }

    public function destroy()
    {
        $this->auth();
    }
}
