<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Entities;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\EntityValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\CollectionKeysTrait;
use JuanchoSL\Validators\Types\Traits\Multi\EntityValuesTrait;

class EntityValidations extends AbstractValidations implements
    BasicValidatorsInterface,
    IterableKeyValidatorsInterface,
    EntityValueValidatorsInterface
{

    use BasicValidationsTrait, CollectionKeysTrait, EntityValuesTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = EntityValidation::class;

}