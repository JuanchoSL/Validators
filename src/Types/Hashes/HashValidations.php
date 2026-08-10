<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Hashes;

use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\HashTypesValidationsTrait;

class HashValidations extends AbstractValidations
{

    use HashTypesValidationsTrait, BasicValidationsTrait;

    protected string $validator = HashValidation::class;

    public function isValidatingHash(string $algo, string $string): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValidatingHashHmac(string $algo, string $string, string $key): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isHash(string $algo_type): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }


}