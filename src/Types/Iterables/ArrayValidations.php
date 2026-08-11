<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\ValueValidatorsInterface;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\ContainsValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\LengthValidationsTrait;

class ArrayValidations extends IterableValidations implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableKeyValidatorsInterface,
    ValueValidatorsInterface
{

    use BasicValidationsTrait, ContainsValidationsTrait, LengthValidationsTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = ArrayValidation::class;

}