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

    public function update($id)
    {
        $this->auth();

        $userData = Request::update();

        $content = (new Content())
            ->getEntityManager()
            ->getRepository(Content::class)
            ->findOneBy([
                "id" => $id
            ]);

        if (isset($userData["title"])) $content->setTitle($userData["title"]);

        if (isset($userData["description"])) $content->setDescription($userData["description"]);

        if (isset($userData["type"])) $content->setType($userData["type"]);

        if (isset($userData["content_file"])) $content->setContentFile($userData["content_file"]);

        (new Content())->getEntityManager()->flush();

        return Response::json([
            "detail" => "content updated successfuly."
        ]);
    }

    public function destroy($id)
    {
        $this->auth();

        (new Content())
            ->builder()
            ->delete()
            ->from("content")
            ->where("id = ?")
            ->setParameter(0, $id)
            ->executeQuery();

        return Response::json([
            "detail" => "content deleted successfuly"
        ]);
    }
}
