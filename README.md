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
- General numbers
- Specific integers
- Specific floats
- Entity iterable, as objects or assoc arrays
- General Iterables, as indexed arrays or recursive validations
- Primitive boolean, reals or equivalents and Null checking

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
