# Validation

## Description

Little methods collection in order to validate variables contents

## How to use

```
StringValidation::isEmail("juanchosl@hotmail.com"); //true
```

or

```
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