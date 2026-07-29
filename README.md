# Validators

## Description

Little methods collection in order to validate variables contents

## Install

```bash
composer require juanchosl/validators
composer update
```

## How to use

### Validation availability

- Strings
- Hashes (with and without HMAC)
- General numbers
- Specific integers
- Specific floats
- Entity iterable, as objects or assoc arrays
- General Iterables, as indexed arrays or recursive validations
- Primitive boolean, reals or equivalents and Null checking

> Important: from version 1.0.9 the multi-validations classes has been callables, you can prepare a sequence of validations into a variable and call it as a unction with the values to check as parameters.
>
> The **getResult** method, maybe can be removed on future versions

#### Generic methods
| Validation | Strings | Numbers | Iterables | Primitives | Hashes |
| ---------- | ------- | ------- | --------- | ---------- | ------ |
| is                            | x | x | x | x | x |
| isEmpty                       | x | x | x | x | x |
| isNotEmpty                    | x | x | x | x | x |
| isValueStartingWith           | x | x |  |  |  |
| isValueStartingWithAny        | x | x |  |  |  |
| isValueEndingWith             | x | x |  |  |  |
| isValueEndingWithAny          | x | x |  |  |  |
| isValueContaining             | x | x | x |  |  |
| isValueContainingAny          | x | x | x |  |  |
| isValueValidating             | x | x | x |  |  |
| isValueValidatingAny          | x | x | x |  |  |
| isValueEquals                 | x | x |  |  |  |
| isValueEqualsAny              | x | x |  |  |  |
| isLengthEqualsThan            | x | x | x |  |  |
| isLengthGreatherThan          | x | x | x |  |  |
| isLengthGreatherOrEqualsThan  | x | x | x |  |  |
| isLengthLessThan              | x | x | x |  |  |
| isLengthLessOrEqualsThan      | x | x | x |  |  |
| isRegex                       | x | x |  |  |  |

#### Exclusive methods
| Strings | Primitives | Numerics | Hashes | Iterables |
| - | - | - | - | - |
| isNumber | isBoolEquivalent | isValueEqualsThan | isValidatingHash | isValueAttributeValidating |
| isInteger | isNull | isValueEqualsThanAny | isValidatingHashHmac | isValueAttributeValidatingAny |
| isFloat | isTrue | isValueIntoRange | isHash | isAnyValueAttributeValidating |
| isBinary | isFalse | isValueGreatherThan | | isAnyValueAttributeValidatingAny |
| isHexadecimal | | isValueGreatherThanOrEquals |
| isMultibyte | | isValueLessThan |
| isEncodedAs | | isValueLessThanOrEquals |
| isEmail |||
| isUrl |||
| isIpV4 |||
| isIpv6 |||
| isMac |||
| isDomain |||
| isDate |||
| isSerialized |||

### Single validation

You can perform an only check over a single value

```php
StringValidation::isEmail("juanchosl@hotmail.com"); //true
```

### Multiple validations over 1 value

You can perform a few checks over a single value

```php
$validator = new StringValidations();
$validator
    ->is()
    ->isNotEmpty()
    ->isLengthGreatherThan(15)
    ->isEmail();

$validator->getResult('juanchosl@hotmail.com'); //true

print_r($validator->getResults('juanchosl@hotmail.com'));
Array
(
    [is] => 1
    [isNotEmpty] => 1
    [isLengthGreatherThan: 15] => 1
    [isEmail] => 1
)
```

### Multiple validations over multiple values

You can perform a few checks over multiple values

```php
$validator = new StringValidations();
$validator
    ->is()
    ->isNotEmpty()
    ->isLengthGreatherThan(15)
    ->isEmail();

    foreach(['juanchosl@hotmail.com', 'email@corporation.com'] as $text){
        $validator->getResult($text); //true

        print_r($validator->getResults($text));
        Array
        (
            [is] => 1
            [isNotEmpty] => 1
            [isLengthGreatherThan: 15] => 1
            [isEmail] => 1
        )
    }
```

### Alternative validations (OR) over values

You can perform some alternative checks over the values in order to accept it if pass ANY of some condicions

```php
$validator = new StringValidations();
$validator
    ->is()
    ->isNotEmpty()
    ->isValueEqualsAny('juan','pepe','antonio')
    ->getResult('juan'); //true
```

### Validations over associative arrays or entities

You can perform checks over the values of an associative array or object, can be simple validations or any other complex validation, indicating the target index. The results of the validations are unitary, for each element

```php
$datas = [
    ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
    ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
];
$validator = new EntityValidations();
$validator->isValueAttributeValidating('email', (new StringValidations())->isEmail());
$validator->isValueAttributeValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

foreach($datas as $data){
    $validator->getResult($data);
}
```

### Validations over iterables

Instead of iterate over a collection, as the previous example, you can perform checks over the keys or values of an iterable, can be simple validations or any other complex validation

```php
$validator = new IterableValidations();
$validator
    ->is()
    ->isNotEmpty()
    ->isKeyContainingAny(...['nombre', 'apellidos']);
    ->getResult(['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']);//true

***********

$datas = [
    ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
    ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
];
$validator->isValueAttributeValidating('email', (new StringValidations())->isEmail());
$validator->isValueAttributeValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

$validator->getResult($datas);
************

$datas = ["aaaa@bbb.com", "bbb@ccc.es"];
$validator = new IterableValidations();
$validator->isValueValidating((new StringValidations())->isEmail());
$validator->getResult($datas);
```
