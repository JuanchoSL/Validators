# Change Log - Validators

## [1.0.11] - 2026-08-22

### Added

- More tests for Entities validations

### Changed

### Fixed

- Missing function finding for an existing key name into Entity

## [1.0.10] - 2026-08-11

### Added

- IterableValidation::isAnyValueValidating in order to verify if one value from iterable, validate as true a complex validation
- IterableValidation::isAnyValueValidatingAny in order to verify if some value from iterable validate as true any provided complex validation
- IterableValidation::isAnyValueAttributeValidating in order to verify if one value into selected key from collection, validate as true any provided complex validation
- IterableValidation::isAnyValueAttributeValidatingAny in order to verify if some value into selected key from collection, validate as true any provided complex validation
- Added CollectionValidator, same as Iterable but checking that his constents are more iterable elements.
- Added ArrayValidator, same as Iterable but checking that it is a real array and child elements are primitive values
- Added ListValidator, same as Array but it is a indexed array with numeric keys from 0 to count($contents)-1

### Changed

- Use array_column for ValueAttributeValidating functions in order to extract only the required values to validate for performance and reduce memory consumption
- Extracted the result calculators to external class, in order to separate logics and save results for any value
- Moved all functions to traits in order to reuse between entities
- Apply fixes and failback functions, in order to return back and ensure, the compatibility with php v8.0, creating a transparent internal alternatives

### Fixed

- Use array_all function when is available for the installed php version, for better performance
- Array to string conversion warning when kreating a multiparameter key for getResults
- HashValidator check if is in binary in order to convert to hex value before validate
- Iterable validations check that is a rigth type when check for empty, throwing an Exception if it is not an iterable element

## [1.0.9] - 2026-07-22

### Added

- Tests for multi PrimitiveValidations in order to evaluate strings or numbers as booleans
- isBinary string validation
- isHexadecimal string validation
- isMultibyte string validation
- isEncodingAs string validation, for check if a string is really encoded (strict=true) or if it is in a compatible encoding (strict=false)
- HashValidations, in order to verify if a string is valid as hash for a knowed algo and check if is the valid signature for a provided string
- Added clear method on Multi test queue in order to remove all tests and reuse the Validations instance
- Added LoggerAwaire implementation, in order to save checkings into log for debug
- Added Debug implementation, if TRUE, log a result for each check, with time and memory used, otherwise, log only one INFO from full checking results.
- Added \_\_invoke method, in order to validate a sequence values without call getResult
- The Iterable validators that check for extra validations, can use too callable parameters, as array with class and method or strings names of native or your own functions

### Changed

- Removed unnecessary parameter on multi function PrimitiveValidations, for check strings or number as bool equivalents
- Removed strict type comparation for isEquals

### Fixed

- Verified 8.6 compatibility

## [1.0.8] - 2025-12-27

### Added

- StringValidation::isNumber in order to verify that a string can be used as number
- StringValidations->isNumber in order to verify that a string can be used as number
- StringValidation::isInteger in order to verify that a string can be used as integer
- StringValidations->isInteger in order to verify that a string can be used as integer
- StringValidation::isFloat in order to verify that a string can be used as float
- StringValidations->isFloat in order to verify that a string can be used as float
- StringValidation::isDate in order to verify that a string can be used as date
- StringValidations->isDate in order to verify that a string can be used as date
- EntityValidation in order to verify objects or assoc arrays checking values using keys
- EntityValidations in order to verify objects or assoc arrays checking values using keys

### Changed

- Iterable values containing validations check for not empty before try
- update composer to use php 8.1 in order to update phpunit to last version

### Fixed

- Check for full compatibility with php 8.5

## [1.0.7] - 2025-11-29

### Added

- New Primitive validations in order to convert _equivalent_ bool numbers and strings: true, yes, on, 1 as true and false, no, off, 0 as false
- strval before cast to string into number validations for length checkers
- strval before cast to string into string validations for length checkers
- Checked full compatibility with php 8.5

### Changed

- changed iterable test for check entity param to isValueAttribute in order to clear use

### Fixed

- check if var is an iterable before use it in order to return false if it not is

## [1.0.6] - 2025-11-07

### Added

- New Iterable validator, single and multi
- More String \*Any validators
- New equals validation
- More String tests
- New intoRange Number validations

### Changed

- Change composer support from php v8.0
- Use of traits for reuse multi validation functions
- Change params type to mixed in order to apply to all future validators

### Fixed

- reusoe existing methods in order to avoid duplicity

## [1.0.5] - 2025-05-26

### Added

- Check if a string starts with a substring in case sensitive mode
- Check if a string ends with a substring in case sensitive mode
- Check if a string contains a substring in case sensitive mode
- Check if a number starts with a number
- Check if a number ends with a number
- Check if a number contains a number
- more tests

### Changed

### Fixed

- isSerialized comparations for scalars values
- Checked php 8.4 compatibility

## [1.0.4] - 2024-12-04

### Added

- Checked PHP 8.4 compatibility
- typed properties
- more documentation

### Changed

- intergers numbers validate false when use float validations

### Fixed

- NumberValidation use **static::** instead **self::** in order to check **is** from FloatValidator

## [1.0.3] - 2024-10-14

### Added

- length equals validator for strings
- length equals validator for numbers + integers + floats
- number values comparator, equals, greather or equals, greather, less or equals, less
- string isSerialized validator

### Changed

### Fixed

## [1.0.2] - 2024-06-28

### Added

- More tests
- More documentation

### Changed

- Validators for number length use multi byte functions

### Fixed

## [1.0.1] - 2024-06-12

### Added

- More tests
- More documentation
- Interfaces
- Float validations extending Number Validations
- Integer validations extending Number Validations

### Changed

- String isDomain now check for domain instead for a full path
- Folders structure
- changed value insertion in order to reuse the validator collection for some values
- function getResult instead success for check a value

### Fixed

- The results keys now is created only with the function name and concat the parameters if exists, in order to pass more than one time the same validation with distinct filters
- parameters type definition

## [1.0.0] - 2024-03-05

### Added

- Initial release, first version

### Changed

### Fixed
