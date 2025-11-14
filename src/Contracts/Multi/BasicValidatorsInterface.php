<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface BasicValidatorsInterface
{

    /**
     * Check if the assigned value has the desired type and save the result
     * @return static The object to perform more checks
     */
    public function is(): static;

    /**
     * Check if the assigned value is an empty value and save the result
     * @return static The object to perform more checks
     */
    public function isEmpty(): static;

    /**
     * Check if the assigned value is not an empty value and save the result
     * @return static The object to perform more checks
     */
    public function isNotEmpty(): static;

    /**
     * Return the result for a provided value
     * @param mixed $var
     * @return bool
     */
    public function getResult(mixed $var): bool;

    /**
     * Return the results for a provided value
     * @param mixed $var
     * @return array<string,bool>
     */
    public function getResults(mixed $var): array;

}