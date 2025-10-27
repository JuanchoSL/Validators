<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface NumberValueValidatorsInterface
{

    /**
     * Check if the passed value is equals to
     * @param int|float $comparator The comprator
     * @return static The object to perform more checks
     */
    public function isValueEqualsThan(int|float $comparator): static;

    /**
     * Check if the passed value is into range, included limits, same as (greater or equals than and less or equals than)
     * @param int|float $min The min limit
     * @param int|float $max The max limit
     * @return static The object to perform more checks
     */
    public function isValueIntoRange(int|float $min, int|float $max): static;
    /**
     * Check if the passed value is greather than or equals to
     * @param int|float $comparator The comprator
     * @return static The object to perform more checks
     */
    public function isValueGreatherThanOrEquals(int|float $comparator): static;

    /**
     * Check if the passed value is greather than or equals to
     * @param int|float $comparator The comprator
     * @return static The object to perform more checks
     */
    public function isValueGreatherThan(int|float $comparator): static;

    /**
     * Check if the passed value is less than or equals to
     * @param int|float $comparator The comprator
     * @return static The object to perform more checks
     */
    public function isValueLessThanOrEquals(int|float $comparator): static;

    /**
     * Check if the passed value is less than
     * @param int|float $comparator The comprator
     * @return static The object to perform more checks
     */
    public function isValueLessThan(int|float $comparator): static;
}