<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types;

abstract class AbstractValidations
{
    /**
     * @var array<int, array{"class": class-string , "method": string, "params":array<int, mixed>}> $tests
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
     * @param string $method
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
            //$callable = (isset($tests['class'], $tests['method'])) ? [$tests['class'], $tests['method']] : $tests['method'];
            //$tests['params'] = $tests['params'] ?? [];
            $key = $this->createKey($tests['method'], (array) $tests['params']);
            $this->results[$key] = call_user_func_array([$tests['class'], $tests['method']], array_merge([$var], $tests['params'])) !== false;
        }
    }

    /**
     * @param class-string $validator
     * @param string $function
     * @param array<int, mixed> $arguments
     */
    protected function addTest(string $validator, string $function, array $arguments): static
    {
        $this->tests[] = [
            "class" => $validator,
            "method" => $function,
            "params" => $arguments
        ];
        return $this;
    }

    public function __tostring(): string
    {
        return serialize($this->tests);
    }

    public function __serialize(): array
    {
        return $this->tests;
    }

    /**
     * @param array<int, array{"class": class-string , "method": string, "params":array<int, mixed>}> $vars
     */
    public function __unserialize(array $vars): void
    {
        $this->tests = $vars;
    }
}