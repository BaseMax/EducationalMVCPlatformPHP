<?php

namespace Application\Controllers;

class ProgressController extends Controller
{
    public function index()
    {
        $this->auth();
    }

    public function update()
    {
        $this->auth();
    }
}
