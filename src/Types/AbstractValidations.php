<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types;

use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\TypeValidatorsInterface;

abstract class AbstractValidations implements TypeValidatorsInterface, LengthValidatorsInterface
{
    /**
     * @var array<string, bool> $results
     */
    protected array $results = [];
    protected string|int|float|bool|null $var;

    public function __construct(string|int|float|bool|null $var)
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

    protected function createKey(): ?string
    {
        $args = func_get_args();
        $key = array_shift($args);
        if (empty ($key) || !is_string($key)) {
            return null;
        }
        $key = strval($key);
        if (!empty ($args)) {
            $key .= ": " . implode(',', $args);
        }
        return $key;
    }
}