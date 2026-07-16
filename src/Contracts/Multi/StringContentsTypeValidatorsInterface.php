<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface StringContentsTypeValidatorsInterface
{
    /**
     * Check if the passed value validate as a string date
     * @return static The object to perform more checks
     */
    public function isDate(): static;
    /**
     * Check if the passed value validate as a number
     * @return static The object to perform more checks
     */
    public function isNumber(): static;
    /**
     * Check if the passed value validate as an integer number
     * @return static The object to perform more checks
     */
    public function isInteger(): static;
    /**
     * Check if the passed value validate as a float number
     * @return static The object to perform more checks
     */
    public function isFloat(): static;

    /**
     * Check if the passed value is a multibyte string
     * @return static The object to perform more checks
     */
    public function isMultibyte(): static;

    /**
     * Check if the passed value validate with proposed encoding
     * @param array|string $encoding The encoding/s to check
     * @param bool $strict True for check the real encondg or false to check if it is equivalent with the actual encoding
     * @return static The object to perform more checks
     */
    public function isEncodedAs(array|string $encoding, bool $strict = true): static;

    /**
     * Check if the passed value validate as email
     * @return static The object to perform more checks
     */
    public function isEmail(): static;

    /**
     * Check if the passed value validate as url
     * @return static The object to perform more checks
     */
    public function isUrl(): static;

    /**
     * Check if the passed value validate as an IP v4
     * @return static The object to perform more checks
     */
    public function isIpV4(): static;

    /**
     * Check if the passed value validate as an IP v6
     * @return static The object to perform more checks
     */
    public function isIpV6(): static;

    /**
     * Check if the passed value validate as a MAC
     * @return static The object to perform more checks
     */
    public function isMac(): static;

    /**
     * Check if the passed value validate as a domain
     * @return static The object to perform more checks
     */
    public function isDomain(): static;
    /**
     * Check if the passed value validate as a serialized value
     * @return static The object to perform more checks
     */
    public function isSerialized(): static;
}