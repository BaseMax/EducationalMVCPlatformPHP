<?php

use Application\Controllers\AnswerController;
use Application\Controllers\AuthController;
use Application\Controllers\ContentController;
use Application\Controllers\FallbackController;
use Application\Controllers\ProgressController;
use Application\Controllers\QuestionController;
use Application\Controllers\QuizController;
use Application\Facades\Router;

if (!defined("LOADED")) exit;


// Authentication

Router::post("/api/register", [AuthController::class, "register"]);

Router::post("/api/login", [AuthController::class, "login"]);

Router::post("/api/logout", [AuthController::class, "logout"]);



// Content

Router::get("/api/content", [ContentController::class, "index"]);

Router::get("/api/content/{id}", [ContentController::class, "show"]);

Router::post("/api/content", [ContentController::class, "store"]);

Router::put("/api/content/{id}", [ContentController::class, "update"]);

Router::delete("/api/content/{id}", [ContentController::class, "destroy"]);



// Progress

Router::get("/api/progress", [ProgressController::class, "index"]);

Router::post("/api/progress", [ProgressController::class, "update"]);



// Quizzes

Router::get("/api/quizzes", [QuizController::class, "index"]);

Router::get("/api/quizzes/{id}", [QuizController::class, "show"]);

Router::post("/api/quizzes", [QuizController::class, "store"]);

Router::put("/api/quizzes/{id}", [QuizController::class, "update"]);

Router::delete("/api/quizzes/{id}", [QuizController::class, "destroy"]);



// Questions

Router::get("/api/quizzes/{quiz_id}/questions", [QuestionController::class, "index"]);

Router::get("/api/quizzes/{quiz_id}/questions/{id}", [QuestionController::class, "show"]);

Router::post("/api/quizzes/{quiz_id}/questions", [QuestionController::class, "store"]);

Router::put("/api/quizzes/{quiz_id}/questions/{id}", [QuestionController::class, "update"]);

Router::delete("/api/quizzes/{quiz_id}/questions/{id}", [QuestionController::class, "destory"]);



// Answers

Router::get("/api/questions/{question_id}/answers", [AnswerController::class, "index"]);

Router::get("/api/questions/{question_id}/answers/{id}", [AnswerController::class, "show"]);

Router::post("/api/questions/{question_id}/answers", [AnswerController::class, "store"]);

Router::put("/api/questions/{question_id}/answers/{id}", [AnswerController::class, "update"]);

Router::delete("/api/questions/{question_id}/answers/{id}", [AnswerController::class, "destroy"]);



// Fallback

Router::fallback([FallbackController::class, "fallback"]);
