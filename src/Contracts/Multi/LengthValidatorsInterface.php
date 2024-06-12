<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface LengthValidatorsInterface
{

    /**
     * Check if the assigned value has a length greather than indicated and save the result
     * @param int $limit The limit to count
     * @return static The object to perform more checks
     */
    public function isLengthGreatherThan(int $limit): static;

    /**
     * Check if the assigned value has a length greather or equals than indicated and save the result
     * @param int $limit The limit to count
     * @return static The object to perform more checks
     */
    public function isLengthGreatherOrEqualsThan(int $limit): static;

    /**
     * Check if the assigned value has a length less than indicated and save the result
     * @param int $limit The limit to count
     * @return static The object to perform more checks
     */
    public function isLengthLessThan(int $limit): static;

    /**
     * Check if the assigned value has a length less or equals than indicated and save the result
     * @param int $limit The limit to count
     * @return static The object to perform more checks
     */
    public function isLengthLessOrEqualsThan(int $limit): static;

}