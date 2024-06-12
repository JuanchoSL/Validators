<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface RegexValidatorsInterface
{

    /**
     * Check if the passed value validate a regex expression
     * @param string|int|float $var The value to check
     * @param string $expression The regular expression to check
     * @return bool The result of the check
     */
    public static function isRegex(string|int|float $var, string $expression): bool;
}