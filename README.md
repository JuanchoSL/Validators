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
- Iterables (all types)
- Array (in Specific, indexed or associative)
- List (indexed array with keys from _0_ to count()-1)
- Collection (iterable of iterables)
- Entity (iterable with named keys, as objects or assoc arrays)
- Primitive boolean, reals or equivalents and Null checking

> Important: from version 1.0.9 the multi-validations classes has been callables, you can prepare a sequence of validations into a variable and call it as a unction with the values to check as parameters.
>
> The **getResult** method, maybe can be removed on future versions

#### How works

##### Primitives and scalars

The validators checking the type of value, and provide a relative options, as a number compartions for NumberValidators, but not for StringValidators, or a PrimitiveValidation::isBoolEquivalent for strings as true, yes, on, false, no, off...but not on StringValidation (a string false is a string really), in order to reduce and group the logics for every task

##### Hashes

We have the hash and hashhmac signatures validations, usefull for any project, can be reused very easy in any task, as to verificate downloaded or received files, authorization headers, security tokens, payloads, etc...

##### Iterables

We have some grouped validations for each type of structures, can be checked distincts type of iterables for any situation

- **List** is an indexed array with numbered keys from 0 to count($) - 1, true for indexed array, false for associative
- **Array** indexed with any key order, or assoc with text keys
- **Iterable** parent of List and Array
- **Entity** any iterable with named keys, array or objects are valid
- **Collection** an iterable of iterables, calling validations from here, launch the validation for every contained _Entity_

The iterables have validations with the same name of scalar validations (isValueContaining, isValueValidating...), but perform the checking over each element, in order to verify all contents with an only call.
As Scalar validations, not all iterables have the same validators, a list does not check keys, because needs to be auto-numbered, List and Array, does not have validation over child attributes, its are used for a gruped of scalar values.

> Iterable mantains the availability for retro compatibility, but maybe it will be removed in the future, relegatting this responsability to Collection and Entity

#### Generic methods

| Validation                   | Strings | Numbers | Iterables | Primitives | Hashes |
| ---------------------------- | ------- | ------- | --------- | ---------- | ------ |
| is                           | x       | x       | x         | x          | x      |
| isEmpty                      | x       | x       | x         | x          | x      |
| isNotEmpty                   | x       | x       | x         | x          | x      |
| isValueStartingWith          | x       | x       |           |            |        |
| isValueStartingWithAny       | x       | x       |           |            |        |
| isValueEndingWith            | x       | x       |           |            |        |
| isValueEndingWithAny         | x       | x       |           |            |        |
| isValueContaining            | x       | x       | x         |            |        |
| isValueContainingAny         | x       | x       | x         |            |        |
| isValueValidating            | x       | x       | x         |            |        |
| isValueValidatingAny         | x       | x       | x         |            |        |
| isValueEquals                | x       | x       |           |            |        |
| isValueEqualsAny             | x       | x       |           |            |        |
| isLengthEqualsThan           | x       | x       | x         |            |        |
| isLengthGreatherThan         | x       | x       | x         |            |        |
| isLengthGreatherOrEqualsThan | x       | x       | x         |            |        |
| isLengthLessThan             | x       | x       | x         |            |        |
| isLengthLessOrEqualsThan     | x       | x       | x         |            |        |
| isRegex                      | x       | x       |           |            |        |

#### Exclusive methods

| Strings       | Primitives       | Numerics                    | Hashes               | Iterables                        |
| ------------- | ---------------- | --------------------------- | -------------------- | -------------------------------- |
| isNumber      | isBoolEquivalent | isValueEqualsThan           | isValidatingHash     | isValueAttributeValidating       |
| isInteger     | isNull           | isValueEqualsThanAny        | isValidatingHashHmac | isValueAttributeValidatingAny    |
| isFloat       | isTrue           | isValueIntoRange            | isHash               | isAnyValueAttributeValidating    |
| isBinary      | isFalse          | isValueGreatherThan         |                      | isAnyValueAttributeValidatingAny |
| isHexadecimal |                  | isValueGreatherThanOrEquals |                      | isAnyValueValidating             |
| isMultibyte   |                  | isValueLessThan             |                      | isAnyValueValidatingAny          |
| isEncodedAs   |                  | isValueLessThanOrEquals     |                      | isKeyContaining                  |
| isEmail       |                  |                             |                      | isKeyContainingAny               |
| isUrl         |                  |                             |
| isIpV4        |                  |                             |
| isIpv6        |                  |                             |
| isMac         |                  |                             |
| isDomain      |                  |                             |
| isDate        |                  |                             |
| isSerialized  |                  |                             |

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

$validator('juanchosl@hotmail.com'); //true

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
        $validator($text); //true

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
    ->isValueEqualsAny('juan','pepe','antonio');

$validator('juan'); //true
```

### Validations over associative arrays or entities

You can perform checks over the values of an associative array or object, can be simple validations or any other complex validation, indicating the target index. The results of the validations are unitary, for each element

```php
$datas = [
    ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
    ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
];

// Option 1
$validator = new EntityValidations();
$validator->isValueAttributeValidating('email', (new StringValidations())->isEmail());
$validator->isValueAttributeValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

foreach($datas as $data){
    $result = $validator($data);// We have the unitary result or each element
    if($result === true){
        ...//our code execution
    }
}

//Option 2
$validator = new CollectionValidations();
$validator->isValueAttributeValidating('email', (new StringValidations())->isEmail());
$validator->isValueAttributeValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

$validator($datas);//We have the global result, for all elements
```

### Validations over iterables

Instead of iterate over a collection, as the previous example, you can perform checks over the keys or values of an iterable, can be simple validations or any other complex validation

```php
$validator = new IterableValidations();
$validator
    ->is()
    ->isNotEmpty()
    ->isKeyContainingAny(...['nombre', 'apellidos']);

$validator(['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']);//true

******

$datas = [
    ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
    ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
];
$validator->isValueAttributeValidating('email', (new StringValidations())->isEmail());
$validator->isValueAttributeValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

$validator($datas);//false
/*
Array
(
    [isValueAttributeValidating: email,StringValidations->isEmail] => 1
    [isValueAttributeValidating: telephone,IntegerValidations->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12)] => 1
)
*/
```

```php
$datas = ["aaaa@bbb.com", "bbb@ccc.es"];
$validator = new IterableValidations();
$validator->isValueValidating((new StringValidations())->isEmail());
$validator($datas);
```
