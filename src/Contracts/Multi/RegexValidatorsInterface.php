<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface RegexValidatorsInterface
{

    /**
     * Check if the assigned value validate a regex expression and save the result
     * @param string $expresion The regular expression to check
     * @return static The object to perform more checks
     */
    public function isRegex(string $expresion): static;
}