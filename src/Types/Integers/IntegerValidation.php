<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Integers;

use JuanchoSL\Validators\Types\Numbers\NumberValidation;

class IntegerValidation extends NumberValidation
{

    public static function is(mixed $var): bool
    {
        return is_integer($var);
    }
}