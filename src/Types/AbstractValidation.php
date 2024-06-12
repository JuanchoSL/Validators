<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types;

abstract class AbstractValidation
{
    public static function isEmpty(mixed $var): bool
    {
        return empty($var);
    }

    public static function isNotEmpty(mixed $var): bool
    {
        return !empty($var);
    }
}