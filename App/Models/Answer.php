<?php

namespace Application\Models;

class Answer extends Model
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     * @var int $question_id
     */
    private int $question_id;

    /**
     * @var string $answer
     */
    private string $answer;

    /**
     * @var bool $correct
     */
    private bool $correct;
}
