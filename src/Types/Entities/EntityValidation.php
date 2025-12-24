<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Entities;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\AbstractValidations;

class EntityValidation extends AbstractValidation implements BasicValidatorsInterface
{

    public static function is(mixed $var): bool
    {
        return is_iterable($var);
    }
    public static function isEmpty(mixed $var): bool
    {
        return parent::isEmpty($var) || count($var) == 0;
    }

    public static function isNotEmpty(mixed $var): bool
    {
        return !static::isEmpty($var);
    }

    public static function isValueAttributeValidating(mixed $entity, string $key, AbstractValidations $needle): bool
    {
        return static::isValueAttributeValidatingAny($entity, $key, $needle);
    }

    public static function isValueAttributeValidatingAny(mixed $entity, string $key, AbstractValidations ...$needles): bool
    {
        if (is_array($entity) && array_key_exists($key, $entity)) {
            $entity = $entity[$key];
        } elseif (is_object($entity) && property_exists($entity, $key)) {
            $entity = $entity->$key;
        } else {
            return false;
        }
        foreach ($needles as $needle) {
            if ($needle->getResult($entity)) {
                return true;
            }
        }
        return false;
    }

}