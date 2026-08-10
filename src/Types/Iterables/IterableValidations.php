<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\IterableValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Iterables\IterableValidation;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\CollectionKeysTrait;
use JuanchoSL\Validators\Types\Traits\Multi\IterableValuesTrait;
use JuanchoSL\Validators\Types\Traits\Multi\LengthValidationsTrait;

class IterableValidations extends AbstractValidations implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableKeyValidatorsInterface,
    IterableValueValidatorsInterface
{

    use BasicValidationsTrait, CollectionKeysTrait, IterableValuesTrait, LengthValidationsTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = IterableValidation::class;

}