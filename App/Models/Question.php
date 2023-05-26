<?php

namespace Application\Models;

class Question extends Model
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     * @var int $quiz_id
     */
    private int $quiz_id;

    /**
     * @var string $question
     */
    private string $question;
}
