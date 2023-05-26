<?php

namespace Application\Models;

use Application\Models\Enum\Type;

class Content extends Model
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     * @var string $title
     */
    private string $title;

    /**
     * @var string $description
     */
    private string $description;

    /**
     * @var Type $type
     */
    private Type $type;

    /**
     * @var string $content_file
     */
    private string $content_file;
}
