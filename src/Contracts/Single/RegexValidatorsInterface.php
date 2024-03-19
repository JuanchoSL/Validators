<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface RegexValidatorsInterface
{

    /**
     * Check if the passed value validate a regex expression
     * @return bool The result of the check
     */
    public static function isRegex(string|int|float|bool|null $var, string $expresion): bool;
}