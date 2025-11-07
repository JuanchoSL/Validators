<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Floats;

use JuanchoSL\Validators\Types\Numbers\NumberValidation;

class FloatValidation extends NumberValidation
{

    public static function is(mixed $var): bool
    {
        return is_float($var);
    }
}