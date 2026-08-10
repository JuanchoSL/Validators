<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Single\IterableValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\Traits\Single\CountableTrait;
use JuanchoSL\Validators\Types\Traits\Single\IterableValuesTrait;

class ListValidation extends AbstractValidation implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableValueValidatorsInterface
{

    use CountableTrait, IterableValuesTrait;

    public static function is(mixed $var): bool
    {
        $check = is_array($var);
        if ($check) {
            if (function_exists('array_is_list')) {
                $check = $check && array_is_list($var);
            } else {
                $keys = array_keys($var);
                for ($i = 0; $i < count($keys); $i++) {
                    $check = $check && array_key_exists($i, $keys) && $i === $keys[$i];
                }
            }
        }
        return $check;
    }

}