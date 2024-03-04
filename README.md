# Validation

## Description

Little methods collection in order to validate variables contents

## How to use

```
StringValidation::isEmail("juanchosl@hotmail.com"); //true
```

or

```
$validator = new StringValidations('juanchosl@hotmail.com"');
$validator
    ->is()
    ->isNotEmpty()
    ->isLengthGreatherThan(15)
    ->isEmail();
    
$validator->success(); //true
```