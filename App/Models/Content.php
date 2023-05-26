<?php

namespace Application\Models;

use Application\Models\Enum\Type;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity()]
#[Table("content")]
class Content extends Model
{
    /**
     * @var int $id
     */
    #[Id]
    #[Column(), GeneratedValue()]
    private int $id;

    /**
     * @var string $title
     */
    #[Column(type: Types::STRING)]
    private string $title;

    /**
     * @var string $description
     */
    #[Column(type: Types::TEXT)]
    private string $description;

    /**
     * @var Type $type
     */
    #[Column(enumType: Type::class)]
    private Type $type;

    /**
     * @var string $content_file
     */
    #[Column(type: Types::STRING)]
    private string $content_file;

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
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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
     * Getter for title
     * 
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Getter for description
     * 
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Getter for type
     * 
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * Getter for content_file
     * 
     * @return string
     */
    public function getContentFile(): string
    {
        return $this->content_file;
    }

    /**
     * Setter for title
     * 
     * @param string $title
     * @return Content
     */
    public function setTitle(string $title): Content
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Setter for description
     * 
     * @param string $description
     * @return Content
     */
    public function setDescription(string $description): Content
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Setter for type
     * 
     * @param Type $type
     * @return Content
     */
    public function setType(Type $type): Content
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Setter for content_file
     * 
     * @param string $content_file
     * @return Content
     */
    public function setContentFile(string $content_file): Content
    {
        $this->content_file = $content_file;

        return $this;
    }

    /**
     * Setter for created_at
     * 
     * @param DateTime $created_at
     * @return Content
     */
    public function setCreatedAt(DateTime $created_at): Content
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Setter for updated_at
     * 
     * @param DateTime updated_at
     * @return Content
     */
    public function setUpdatedAt(DateTime $updated_at): Content
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
