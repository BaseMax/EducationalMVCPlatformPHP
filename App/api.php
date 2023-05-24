<?php

use Application\Controllers\AuthController;
use Application\Facades\Router;

if (!defined("LOADED")) exit;

Router::get("/api/quizzes", [AuthController::class, "login"]);
