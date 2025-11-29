# Change Log - Validators

## [1.0.7] - 2025

### Added

- New Primitive validations in order to convert *equivalent* bool numbers and strings: true, yes, on, 1 as true and falase, no, off, 0 as false
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
