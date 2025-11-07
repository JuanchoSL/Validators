<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface ContentValidatorsInterface
{

    /**
     * Check if the assigned value starts with a substring in a case sensitive mode and save the result
     * @param mixed $needle The substring to compare
     * @return static The object
     */
    public function isValueStartingWith(mixed $needle): static;

    /**
     * Check if the assigned value starts with one of any substring in a case sensitive mode and save the result
     * @param mixed ...$needles The substrings to compare
     * @return static The object
     */
    public function isValueStartingWithAny(mixed ...$needles): static;

    /**
     * Check if the assigned value ends with a substring in a case sensitive mode and save the result
     * @param mixed $needle The substring to compare
     * @return static The object
     */
    public function isValueEndingWith(mixed $needle): static;

    /**
     * Check if the assigned value ends with one of any substring in a case sensitive mode and save the result
     * @param mixed ...$needles The substrings to compare
     * @return static The object
     */
    public function isValueEndingWithAny(mixed ...$needles): static;

    /**
     * Check if the assigned value contains a substring in a case sensitive mode and save the result
     * @param mixed $needle The substring to compare
     * @return static The object
     */
    public function isValueContaining(mixed $needle): static;

    /**
     * Check if the assigned value contains one of any substrings in a case sensitive mode and save the result
     * @param mixed ...$needles The substrings to compare
     * @return static The object
     */
    public function isValueContainingAny(mixed ...$needles): static;
    
    /**
     * Check if the assigned value is equal to other string in a case sensitive mode and save the result
     * @param mixed $needle The strings to compare
     * @return static The object
     */
    public function isValueEquals(mixed $needle): static;

    /**
     * Check if the assigned value is equals than any of some strings in a case sensitive mode and save the re
     * @param mixed ...$needles The strings to compare
     * @return static The object
     */
    public function isValueEqualsAny(mixed ...$needles): static;

}