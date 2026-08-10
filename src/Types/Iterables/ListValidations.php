<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\IterableValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\IterableValuesTrait;
use JuanchoSL\Validators\Types\Traits\Multi\LengthValidationsTrait;

class ListValidations extends AbstractValidations implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableValueValidatorsInterface
{
    use BasicValidationsTrait, LengthValidationsTrait, IterableValuesTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = ListValidation::class;

}