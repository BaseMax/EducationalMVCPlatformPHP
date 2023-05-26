<?php

namespace Application\Controllers;

use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\Content;

class QuestionController extends Controller
{
    public function index()
    {
        $this->auth();

        $questions = (new Content())
            ->builder()
            ->select("*")
            ->from("questions")
            ->fetchAllAssociative();

        return Response::json($questions);
    }

    public function show($id)
    {
        $this->auth();

        $question = (new Content())
            ->builder()
            ->select("*")
            ->from("questions")
            ->where("id = ?")
            ->setParameter(0, $id)
            ->fetchAssociative();

        return Response::json($question);
    }

    public function store()
    {
        $this->auth();

        $userData = $this->validate(Request::post(), [
            "quiz_id"  => "required|numeric",
            "question" => "required"
        ]);

        (new Content())
            ->builder()
            ->insert("questions")
            ->values([
                "quiz_id"  => $userData["quiz_id"],
                "question" => $userData["question"]
            ])->fetchAssociative();

        return Response::json([
            "detail" => "question created successfuly"
        ]);
    }

    public function update($id)
    {
        $this->auth();

        $userData = $this->validate(Request::update(), [
            "quiz_id" => "required|numeric",
            "title"   => "required"
        ]);

        (new Content())
            ->builder()
            ->update("questions")
            ->set("quiz_id", $userData["quiz_id"])
            ->set("question", $userData["question"])
            ->where("id = ?")
            ->setParameter(0, $id);

        return Response::json([
            "detail" => "question updated successfuly."
        ]);
    }

    public function destroy($id)
    {
        $this->auth();

        (new Content())
            ->builder()
            ->delete("questions")
            ->where("id = ?")
            ->setParameter(0, $id);

        return Response::json([
            "detail" => "question deleted successfuly"
        ]);
    }
}
