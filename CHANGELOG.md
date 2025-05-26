# Change Log Validators

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
