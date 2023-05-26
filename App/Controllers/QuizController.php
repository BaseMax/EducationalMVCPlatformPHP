<?php

namespace Application\Controllers;

use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\Content;

class QuizController extends Controller
{
    public function index()
    {
        $this->auth();

        $quiezzes = (new Content())
            ->builder()
            ->select("*")
            ->from("quizzes")
            ->fetchAllAssociative();

        return Response::json($quiezzes);
    }

    public function show($id)
    {
        $this->auth();

        $quiz = (new Content())
            ->builder()
            ->select("*")
            ->from("quizzes")
            ->where("id = ?")
            ->setParameter(0, $id)
            ->fetchAssociative();

        return Response::json($quiz);
    }

    public function store()
    {
        $this->auth();

        $userData = $this->validate(Request::post(), [
            "content_id"  => "required|numeric",
            "title"       => "required"
        ]);

        (new Content())
            ->builder()
            ->insert("quizzes")
            ->values([
                "content_id" => $userData["content_id"],
                "title"      => $userData["title"]
            ]);

        return Response::json([
            "detail" => "quiz created successfuly"
        ]);
    }

    public function update($id)
    {
        $this->auth();

        $userData = $this->validate(Request::update(), [
            "content_id"  => "required|numeric",
            "title"       => "required"
        ]);

        (new Content())
            ->builder()
            ->update("quizzes")
            ->set("content_id", $userData["content_id"])
            ->set("title", $userData["title"])
            ->where("id = ?")
            ->setParameter(0, $id);

        return Response::json([
            "detail" => "quiz updated successfuly."
        ]);
    }

    public function destroy($id)
    {
        $this->auth();

        (new Content())
            ->builder()
            ->delete("quizzes")
            ->where("id = ?")
            ->setParameter(0, $id);

        return Response::json([
            "detail" => "quiz deleted successfuly."
        ]);
    }
}
