<?php

declare(strict_types=1);

namespace JuanchoSL\Validators;

abstract class AbstractValidations
{
    /**
     * @var array<string, bool> $results
     */
    protected array $results = [];
    protected $var;
    abstract public function is(): self;

    public function __construct(mixed $var)
    {
        $this->var = $var;
        //$this->var = filter_var($var, FILTER_SANITIZE_STRING);
    }

    public function success(): bool
    {
        foreach ($this->results as $result) {
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return array<string, bool>
     */
    public function getResults(): array
    {
        return $this->results;
    }
}