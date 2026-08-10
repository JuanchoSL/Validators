<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface IterableKeyValidatorsInterface
{

    /**
     * Check for an iterable value, if the keys list names contains a desired name
     * @param mixed $needle The name to find into keys list names
     * @return static The object to perform more checks
     */
    public function isKeyContaining(mixed $needle): static;

    /**
     * Check for an iterable value, if the keys list names contains any desired names
     * @param mixed $needles The list names to find into keys list names
     * @return static The object to perform more checks
     */
    public function isKeyContainingAny(mixed ...$needles): static;

}