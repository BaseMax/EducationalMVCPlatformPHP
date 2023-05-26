<?php

namespace Application\Models;

class Progress extends Model
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     * @var int $user_id
     */
    private int $user_id;

    /**
     * @var int $content_id
     */
    private int $content_id;

    /**
     * @var bool $completed
     */
    private bool $completed;
}
