<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Entities;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Iterables\ArrayValidation;
use JuanchoSL\Validators\Types\Iterables\ListValidation;
use JuanchoSL\Validators\Types\Strings\StringValidation;
use JuanchoSL\Validators\Types\Traits\Single\CountableTrait;
use JuanchoSL\Validators\Types\Traits\Single\IterableKeysTrait;

class EntityValidation extends AbstractValidation implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableKeyValidatorsInterface
{

    use CountableTrait, IterableKeysTrait;

    public static function is(mixed $var): bool
    {
        return (ArrayValidation::is($var) && !ListValidation::is($var)) OR is_object($var);
    }

    public static function isValueAttributeValidating(mixed $entity, string $key, AbstractValidations|callable $needle): bool
    {
        return static::isValueAttributeValidatingAny($entity, $key, $needle);
    }

    public static function isValueAttributeValidatingAny(mixed $entity, string $key, AbstractValidations|callable ...$needles): bool
    {
        if (is_array($entity) && array_key_exists($key, $entity)) {
            $entity = $entity[$key];
        } elseif (is_object($entity) && property_exists($entity, $key)) {
            $entity = $entity->$key;
        } else {
            return false;
        }
        foreach ($needles as $needle) {
            if ((StringValidation::is($needle) OR is_array($needle)) && call_user_func($needle, $entity)) {
                return true;
            } elseif (is_callable($needle) && $needle($entity)) {
                return true;
            }
        }
        return false;
    }

}