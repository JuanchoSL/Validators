<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface TypeValidatorsInterface
{

    /**
     * Check if the assigned value has the desired type and save the result
     * @return self The object to perform more checks
     */
    public function is(): self;

    /**
     * Check if the assigned value is an empty value and save the result
     * @return self The object to perform more checks
     */
    public function isEmpty(): self;

    /**
     * Check if the assigned value is not an empty value and save the result
     * @return self The object to perform more checks
     */
    public function isNotEmpty(): self;

    /**
     * Check if the assigned value validate a regex expression and save the result
     * @return self The object to perform more checks
     */
    public function isRegex(string $expresion): self;
}