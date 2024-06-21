# Validation

## Description

Little methods collection in order to validate variables contents

## Install
```bash
composer require juanchosl/validators
composer update
```

## How to use

### Validation availability
* Strings
* General numbers
* Specific integers
* Specific floats

### Single validation

You can perform an only check over a single value

```php
StringValidation::isEmail("juanchosl@hotmail.com"); //true
```

### Multiple validation over 1 value

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
