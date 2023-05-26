<?php

namespace Application\Controllers;

use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\Content;
use DateTime;

class ContentController extends Controller
{
    public function index()
    {
        $this->auth();

        $contents = (new Content())->builder()
            ->select("*")
            ->from("content")
            ->fetchAllAssociative();

        return Response::json($contents);
    }

    public function show($id)
    {
        $this->auth();

        $content = (new Content())
            ->builder()
            ->select("*")
            ->from("content")
            ->where("id = ?")
            ->setParameter(0, $id)
            ->fetchAssociative();

        return Response::json([$content]);
    }

    public function store()
    {
        $this->auth();

        $userData = $this->validate(Request::post(), [
            "title"        => "required",
            "description"  => "required",
            "type"         => "required",
            "content_file" => "required"
        ]);

        $content = (new Content())
            ->setTitle($userData["title"])
            ->setDescription($userData["description"])
            ->setType($userData["type"])
            ->setContentFile($userData["content_file"])
            ->setCreatedAt(new DateTime())
            ->setUpdatedAt(new DateTime());

        $content->getEntityManager()->persist($content);
        $content->getEntityManager()->flush();

        return Response::json([
            "detail" => "content created successfuly."
        ]);
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
