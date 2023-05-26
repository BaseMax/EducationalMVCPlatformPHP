<?php

namespace Application\Controllers;

class QuizController extends Controller
{
    public function index()
    {
        $this->auth();
    }

    public function show()
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
