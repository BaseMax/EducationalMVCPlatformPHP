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
}
