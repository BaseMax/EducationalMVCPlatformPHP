<?php
if (!defined("LOADED")) exit;

use Application\Controllers\AnswerController;
use Application\Controllers\AuthController;
use Application\Controllers\ContentController;
use Application\Controllers\FallbackController;
use Application\Controllers\ProgressController;
use Application\Controllers\QuestionController;
use Application\Controllers\QuizController;
use Application\Facades\Router;



// Authentication

Router::post("/api/register", [AuthController::class, "register"]); // Register a new user

Router::post("/api/login", [AuthController::class, "login"]); // Login a user



// Content

Router::get("/api/content", [ContentController::class, "index"]); // Get a list of all content

Router::get("/api/content/{id}", [ContentController::class, "show"]); //  Get specific content by ID

Router::post("/api/content", [ContentController::class, "store"]); // Upload new content

Router::put("/api/content/{id}", [ContentController::class, "update"]); // Update existing content

Router::delete("/api/content/{id}", [ContentController::class, "destroy"]); // Delete existing content



// Progress

Router::get("/api/progress", [ProgressController::class, "index"]); // Get a list of all progress for a user

Router::post("/api/progress", [ProgressController::class, "update"]); // Update progress for a user



// Quizzes

Router::get("/api/quizzes", [QuizController::class, "index"]); // Get a list of all quizzes

Router::get("/api/quizzes/{id}", [QuizController::class, "show"]); // Get specific quiz by ID

Router::post("/api/quizzes", [QuizController::class, "store"]); // Create a new quiz

Router::put("/api/quizzes/{id}", [QuizController::class, "update"]); // Update an existing quiz

Router::delete("/api/quizzes/{id}", [QuizController::class, "destroy"]); // Delete an existing quiz



// Questions

Router::get("/api/quizzes/{quiz_id}/questions", [QuestionController::class, "index"]); // Get a list of all questions for a specific quiz

Router::get("/api/quizzes/{quiz_id}/questions/{id}", [QuestionController::class, "show"]); // Get a specific question by ID for a specific quiz

Router::post("/api/quizzes/{quiz_id}/questions", [QuestionController::class, "store"]); // Create a new question for a specific quiz

Router::put("/api/quizzes/{quiz_id}/questions/{id}", [QuestionController::class, "update"]); // Update an existing question for a specific quiz

Router::delete("/api/quizzes/{quiz_id}/questions/{id}", [QuestionController::class, "destory"]); // Delete an existing question for a specific quiz



// Answers

Router::get("/api/questions/{question_id}/answers", [AnswerController::class, "index"]); // Get a list of all answers for a specific question

Router::get("/api/questions/{question_id}/answers/{id}", [AnswerController::class, "show"]); // Get a specific answer by ID for a specific question

Router::post("/api/questions/{question_id}/answers", [AnswerController::class, "store"]); // Create a new answer for a specific question

Router::put("/api/questions/{question_id}/answers/{id}", [AnswerController::class, "update"]); // Update an existing answer for a specific question

Router::delete("/api/questions/{question_id}/answers/{id}", [AnswerController::class, "destroy"]); // Delete an existing answer for a specific question



// Fallback

Router::fallback([FallbackController::class, "fallback"]);
