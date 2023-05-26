<?php

namespace Application\Models;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity()]
#[Table("quizzes")]
class Quiz extends Model
{

    /**
     * @var int $id
     */
    #[Id]
    #[Column(), GeneratedValue()]
    private int $id;

    /**
     * @var int $content_id
     */
    #[Column(type: Types::INTEGER)]
    private int $content_id;

    /**
     * @var string $title
     */
    #[Column(type: Types::STRING)]
    private string $title;

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
     * 
     */
    #[OneToMany(targetEntity: Question::class, mappedBy: "quiz", cascade: ["persist", "remove"])]
    private Collection $questions;


    public function __construct()
    {
        parent::__construct();

        $this->questions = new ArrayCollection();
    }

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
     * Getter for content_id
     * 
     * @return int
     */
    public function getContentId(): int
    {
        return $this->content_id;
    }

    /**
     * Getter for title
     * 
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Adding question to collection
     * 
     * @param Question $question
     * @return Quiz
     */
    public function addQuestion(Question $question): Quiz
    {
        $question->setQuiz($this);

        $this->questions->add($question);

        return $this;
    }
}
