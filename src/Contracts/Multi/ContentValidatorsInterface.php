<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface ContentValidatorsInterface
{

    /**
     * Check if the assigned value starts with a substring in a case sensitive mode and save the result
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public function isValueStartingWith(string|int|float $needle): static;

    /**
     * Check if the assigned value ends with a substring in a case sensitive mode and save the result
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public function isValueEndingWith(string|int|float $needle): static;

    /**
     * Check if the assigned value starts contains a substring in a case sensitive mode and save the result
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public function isValueContaining(string|int|float $needle): static;

}