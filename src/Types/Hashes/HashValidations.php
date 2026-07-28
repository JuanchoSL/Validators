<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Hashes;

use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\HashTypesValidationsTrait;

class HashValidations extends AbstractValidations
{

    use HashTypesValidationsTrait, BasicValidationsTrait;

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


}