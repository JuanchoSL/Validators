<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Hashes;

use JuanchoSL\Validators\Types\AbstractValidations;

class HashValidations extends AbstractValidations
{
    protected string $validator = HashValidation::class;

    public function isValidatingHash(string $algo, string $string): static
    {
        return $this->addTest($this->validator, 'isValidatingHash', func_get_args());
    }
    public function isValidatingHashHmac(string $algo, string $string, string $key): static
    {
        return $this->addTest($this->validator, 'isValidatingHashHmac', func_get_args());
    }

    public function isHash(string $algo_type): static
    {
        return $this->addTest($this->validator, 'isHash', func_get_args());
    }
    public function isHashMd5(): static
    {
        return $this->addTest($this->validator, 'isHashMd5', func_get_args());
    }
    public function isHashSha1(): static
    {
        return $this->addTest($this->validator, 'isHashSha1', func_get_args());
    }
    public function isHashSha256(): static
    {
        return $this->addTest($this->validator, 'isHashSha256', func_get_args());
    }
    public function isHashSha384(): static
    {
        return $this->addTest($this->validator, 'isHashSha384', func_get_args());
    }
    public function isHashSha512(): static
    {
        return $this->addTest($this->validator, 'isHashSha512', func_get_args());
    }

}