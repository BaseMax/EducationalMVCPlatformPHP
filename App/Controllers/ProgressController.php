<?php

namespace Application\Controllers;

use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\Content;

class ProgressController extends Controller
{
    public function index()
    {
        $this->auth();

        $progress = (new Content())
            ->builder()
            ->select("*")
            ->from("progress")
            ->fetchAllAssociative();

        return Response::json($progress);
    }

    public function update($id)
    {
        $this->auth();

        $userData = $this->validate(Request::update(), [
            "completed" => "required"
        ]);

        (new Content())
            ->builder()
            ->update()
            ->set("completed", $userData["completed"])
            ->where("id = ?")
            ->setParameter(0, $id);

        (new Content())->getEntityManager()->flush();

        return Response::json([
            "detail" => "updated successfuly."
        ]);
    }
}
