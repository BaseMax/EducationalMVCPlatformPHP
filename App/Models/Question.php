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
#[Table("questions")]
class Question extends Model
{
    /**
     * @var int $id
     */
    #[Id]
    #[Column(), GeneratedValue()]
    private int $id;

    /**
     * @var int $quiz_id
     */
    #[Column(type: Types::INTEGER)]
    private int $quiz_id;

    /**
     * @var string $question
     */
    #[Column(type: Types::TEXT)]
    private string $question;

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
     * Getter for quiz_id
     * 
     * @return int
     */
    public function getQuizId(): int
    {
        return $this->quiz_id;
    }

    /**
     * Getter for question
     * 
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }
}
