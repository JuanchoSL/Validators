<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

use JuanchoSL\Validators\Types\AbstractValidations;

interface IterableValueValidatorsInterface
{

    public static function isValueContaining(mixed $var, mixed $needles): bool;
    public static function isValueContainingAny(mixed $var, mixed ...$needles): bool;
    public static function isValueValidating(mixed $var, AbstractValidations $needle): bool;
    public static function isValueValidatingAny(mixed $var, AbstractValidations ...$needles): bool;

}