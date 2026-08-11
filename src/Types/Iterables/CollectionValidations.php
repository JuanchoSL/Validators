<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\CollectionValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\CollectionKeysTrait;
use JuanchoSL\Validators\Types\Traits\Multi\CollectionValuesTrait;
use JuanchoSL\Validators\Types\Traits\Multi\EntityValuesTrait;
use JuanchoSL\Validators\Types\Traits\Multi\LengthValidationsTrait;

class CollectionValidations extends AbstractValidations implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableKeyValidatorsInterface,
    CollectionValueValidatorsInterface
{

    use BasicValidationsTrait,
        LengthValidationsTrait,
        CollectionKeysTrait,
        CollectionValuesTrait,
        EntityValuesTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = CollectionValidation::class;

}