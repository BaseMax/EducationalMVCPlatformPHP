<?php

namespace Application\Controllers;

use Application\Facades\Request;
use Application\Facades\Response;
use Application\Models\Content;

class AnswerController extends Controller
{
    public function index()
    {
        $this->auth();

        $answers = (new Content())
            ->builder()
            ->select("*")
            ->from("answers")
            ->fetchAllAssociative();

        return Response::json($answers);
    }

    public function show($id)
    {
        $this->auth();

        $answer = (new Content())
            ->builder()
            ->select("*")
            ->from("answers")
            ->where("id = ?")
            ->setParameter(0, $id)
            ->fetchAssociative();

        return Response::json($answer);
    }

    public function store()
    {
        $this->auth();

        $userData = $this->validate(Request::post(), [
            "question_id" => "required|numeric",
            "answer"      => "required",
            "correct"     => "required|bool"
        ]);

        (new Content())
            ->builder()
            ->insert("answers")
            ->values([
                "question_id"  => $userData["question_id"],
                "answer"       => $userData["answer"],
                "correct"      => $userData["correct"]
            ]);

        return Response::json([
            "detail" => "answer created successfuly."
        ]);
    }

    public function update($id)
    {
        $this->auth();

        $userData = $this->validate(Request::update(), [
            "question_id" => "required|numeric",
            "answer"      => "required",
            "correct"     => "required|bool"
        ]);

        (new Content())
            ->builder()
            ->update("answers")
            ->set("question_id", $userData["question_id"])
            ->set("answer", $userData["answer"])
            ->set("correct", $userData["correct"])
            ->where("id = ?")
            ->setParameter(0, $id);

        return Response::json([
            "detail" => "answers updated successfuly."
        ]);
    }

    public function destroy($id)
    {
        $this->auth();

        (new Content())
            ->builder()
            ->delete("answers")
            ->where("id = ?")
            ->setParameter(0, $id);

        return Response::json([
            "detail" => "answer deleted successfuly."
        ]);
    }
}
