<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;

abstract class AbstractValidations implements BasicValidatorsInterface
{
    /**
     * @var array<int, array<string,string|array<int,mixed>>> $tests
     */
    protected array $tests = [];
    /**
     * @var array<string, bool> $results
     */
    protected array $results = [];

    public function getResult(mixed $var): bool
    {
        foreach ($this->getResults($var) as $result) {
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return array<string, bool>
     */
    public function getResults(mixed $var): array
    {
        $this->process($var);
        return $this->results;
    }

    /**
     * @param array<int,mixed> $params
     */
    protected function createKey(string $method, array $params = []): string
    {
        if (!empty($params)) {
            $method .= ": " . implode(',', $params);
        }
        return $method;
    }

    protected function process(mixed $var): void
    {
        $this->results = [];
        foreach ($this->tests as $tests) {
            $callable = (isset($tests['class'], $tests['method'])) ? [$tests['class'], $tests['method']] : $tests['method'];
            $tests['params'] = $tests['params'] ?? [];
            $key = $this->createKey($tests['method'], (array) $tests['params']);
            $this->results[$key] = call_user_func_array($callable, array_merge([$var], $tests['params'])) !== false;
        }
    }

    protected function addTest($validator, $function, $arguments): static
    {
        $this->tests[] = [
            "class" => $validator,
            "method" => $function,
            "params" => $arguments
        ];
        return $this;
    }

}