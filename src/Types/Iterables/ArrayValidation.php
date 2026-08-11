<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\CollectionValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\Traits\Single\CollectionValuesTrait;
use JuanchoSL\Validators\Types\Traits\Single\CountableTrait;
use JuanchoSL\Validators\Types\Traits\Single\IterableKeysTrait;
use JuanchoSL\Validators\Types\Traits\Single\IterableValuesTrait;

class ArrayValidation extends AbstractValidation implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableKeyValidatorsInterface,
    IterableValueValidatorsInterface,
    CollectionValueValidatorsInterface
{

    use CountableTrait, IterableKeysTrait, IterableValuesTrait, CollectionValuesTrait;

    public static function is(mixed $var): bool
    {
        return is_array($var);
    }

}