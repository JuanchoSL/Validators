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

    public function getResult(string|int|float|bool|null $var): bool
    {
        $this->process($var);
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
    public function getResults(string|int|float|bool|null $var): array
    {
        $this->process($var);
        return $this->results;
    }

    /**
     * @param array<int,mixed> $params
     */
    protected function createKey(string $method, array $params = []): string
    {
        if (!empty ($params)) {
            $method .= ": " . implode(',', $params);
        }
        return $method;
    }

    protected function process(string|int|float|bool|null $var): void
    {
        $this->results = [];
        foreach ($this->tests as $tests) {
            $callable = (isset ($tests['class'], $tests['method'])) ? [$tests['class'], $tests['method']] : $tests['method'];
            //$key = call_user_func_array([$this, 'createKey'], array_merge([$tests['method']], $tests['params']));
            //$key = !is_string($key) ? $tests['method'] : $key;
            $tests['params'] = $tests['params'] ?? [];
            $key = $this->createKey($tests['method'], $tests['params']);
            $this->results[$key] = call_user_func_array($callable, array_merge([$var], $tests['params'])) !== false;
        }
    }
}