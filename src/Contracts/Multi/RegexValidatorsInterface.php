<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface RegexValidatorsInterface
{


    /**
     * Check if the assigned value validate a regex expression and save the result
     * @return static The object to perform more checks
     */
    public function isRegex(string $expresion): static;
}