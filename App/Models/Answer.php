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
#[Table("answers")]
class Answer extends Model
{
    /**
     * @var int $id
     */
    #[Id]
    #[Column(), GeneratedValue()]
    private int $id;

    /**
     * @var int $question_id
     */
    #[Column(type: Types::INTEGER)]
    private int $question_id;

    /**
     * @var string $answer
     */
    #[Column(type: Types::TEXT)]
    private string $answer;

    /**
     * @var bool $correct
     */
    #[Column(type: Types::BOOLEAN)]
    private bool $correct;

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
     * Getter for question_id
     * 
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->question_id;
    }

    /**
     * Getter for answer
     * 
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * Getter for correct
     * 
     * @return bool
     */
    public function getCorrect(): bool
    {
        return $this->correct;
    }
}
