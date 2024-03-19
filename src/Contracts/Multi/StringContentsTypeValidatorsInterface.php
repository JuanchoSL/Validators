<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface StringContentsTypeValidatorsInterface
{
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
}