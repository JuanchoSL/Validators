<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types;

use JuanchoSL\DataManipulation\Manipulators\Numbers\NumbersManipulators;
use JuanchoSL\DataManipulation\Sanitizers\Numbers\NumberSanitizers;
use JuanchoSL\Validators\Contracts\DebuggableInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LogLevel;
use Stringable;

abstract class AbstractValidations implements LoggerAwareInterface, DebuggableInterface
{

    use LoggerAwareTrait;

    /**
     * @var array<int, array{"class": class-string , "method": string, "params":array<int, mixed>}> $tests
     */
    protected array $tests = [];
    /**
     * @var array<string, bool> $results
     */
    protected array $results = [];

    protected bool $debug = false;

    public function __invoke(mixed $var): bool
    {
        foreach ($this->getResults($var) as $result) {
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    public function getResult(mixed $var): bool
    {
        return $this($var);
    }

    /**
     * @return array<string, bool>
     */
    public function getResults(mixed $var): array
    {
        $lap = new NumbersManipulators(microtime(true));
        $this->process($var);
        if (!$this->debug) {
            $context = [
                'var' => $var,
                'results' => $this->results,
                'lap' => (string) $lap->sub(microtime(true))->absolute()->roundHalfUp(8),
                'mem' => (new NumberSanitizers)->integer(true)->__invoke((string) memory_get_usage(true))
            ];
            $this->log(LogLevel::INFO, "Processed defined tests for value '{var}'", $context);
        }
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
            $lap = new NumbersManipulators(microtime(true));
            $key = $this->createKey($tests['method'], (array) $tests['params']);
            $this->results[$key] = call_user_func_array([$tests['class'], $tests['method']], array_merge([$var], $tests['params'])) !== false;
            if ($this->debug) {
                $context = [
                    'key' => $key,
                    'value' => $var,
                    'test_name' => $tests['method'],
                    'test' => $tests,
                    'result' => "" . $this->results[$key],
                ];
                $context['lap'] = (string) $lap->sub(microtime(true))->absolute()->roundHalfUp(8);
                $context['mem'] = (new NumberSanitizers)->integer(true)->__invoke((string) memory_get_usage(true));
                $this->log(LogLevel::DEBUG, "Processing test: {test_name} for value {value}", $context);
            }
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
        $tests = $this->tests;
        array_walk($tests, function (&$data, $key) {
            $params = empty($data['params']) ? '' : "(" . implode(',', $data['params']) . ")";
            $data = /*substr($data['class'], strrpos($data['class'], '\\') + 1) . "->" .*/ $data['method'] . $params;
        });
        return implode('|', $tests);
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

    public function clear(): static
    {
        $this->tests = $this->results = [];
        return $this;
    }

    public function setDebug(bool $debug): void
    {
        $this->debug = $debug;
    }

    protected function log(string|LogLevel $level, string|Stringable $message, iterable $context = [])
    {
        $this->logger?->log($level, $message, $context);
    }
}