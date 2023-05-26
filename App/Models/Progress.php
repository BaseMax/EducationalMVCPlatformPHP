<?php

namespace Application\Models;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity()]
#[Table("progress")]
class Progress extends Model
{
    /**
     * @var int $id
     */
    #[Id]
    #[Column(), GeneratedValue()]
    private int $id;

    /**
     * @var int $user_id
     */
    #[Column(type: Types::INTEGER)]
    private int $user_id;

    /**
     * @var int $content_id
     */
    #[Column(type: Types::INTEGER)]
    private int $content_id;

    /**
     * @var bool $completed
     */
    #[Column(type: Types::BOOLEAN)]
    private bool $completed;

    /**
     * @var DateTime $created_at
     */
    #[Column()]
    private DateTime $created_at;

    /**
     * @var DateTime $updated_at
     */
    #[Column()]
    private DateTime $updated_at;

    /**
     * Getter for id
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Getter for user_id
     * 
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * Getter for content_id
     * 
     * @return int
     */
    public function getContentId(): int
    {
        return $this->content_id;
    }

    /**
     * Getter for completed
     * 
     * @return bool
     */
    public function getCompleted(): bool
    {
        return $this->completed;
    }
}
