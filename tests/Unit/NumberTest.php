<?php

namespace JuanchoSL\Validators\Tests\Unit;

use JuanchoSL\Validators\Types\Numbers\NumberValidation;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    public function testIsNumberTrue()
    {
        $this->assertTrue(NumberValidation::is(123456789), "Is a number");
        $this->assertTrue(NumberValidation::is(12345.6789), "Is a number");
        $this->assertTrue(NumberValidation::is(0.123456789), "Is a number");
        $this->assertTrue(NumberValidation::is(0), "Is a number");
    }
    public function testIsNumberFalse()
    {
        $this->assertFalse(NumberValidation::is('Is a number'), "Is not a number");
        $this->assertFalse(NumberValidation::is(""), "Is not a number");
        $this->assertFalse(NumberValidation::is(" "), "Is not a number");
        $this->assertFalse(NumberValidation::is(false), "Is not a number");
        $this->assertFalse(NumberValidation::is(null), "Is not a number");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(NumberValidation::isEmpty(0), "Is an empty number");
        $this->assertTrue(NumberValidation::isEmpty(false), "Is an empty number");
        $this->assertTrue(NumberValidation::isEmpty(null), "Is an empty number");
    }
    public function testIsEmptyFalse()
    {
        $this->assertFalse(NumberValidation::isEmpty(1), "Is not an empty number");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue(NumberValidation::isNotEmpty(1), "Is not an empty number");
    }
    public function testIsNotEmptyFalse()
    {
        $this->assertFalse(NumberValidation::isNotEmpty(0), "Is an empty number");
        $this->assertFalse(NumberValidation::isNotEmpty(false), "Is an empty number");
        $this->assertFalse(NumberValidation::isNotEmpty(null), "Is an empty number");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue(NumberValidation::isLengthGreatherThan(123456789, 8), "Is a number with a length greather than 8");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse(NumberValidation::isLengthGreatherThan(123456789, 15), "Is not a number with a length greather than 15");
        $this->assertFalse(NumberValidation::isLengthGreatherThan(123456789, 11), "Is not a number with a length greather than 11");
        $this->assertFalse(NumberValidation::isLengthGreatherThan(123456789, 10), "Is not a number with a length greather than 10");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue(NumberValidation::isLengthGreatherOrEqualsThan(123456789, 8), "Is a number with a length greather than 8");
        $this->assertTrue(NumberValidation::isLengthGreatherOrEqualsThan(123456789, 9), "Is a number with a length equals than 9");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse(NumberValidation::isLengthGreatherOrEqualsThan(123456789, 15), "Is not a number with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue(NumberValidation::isLengthLessOrEqualsThan(123456789, 15), "Is a number with a length less than 15");
        $this->assertTrue(NumberValidation::isLengthLessOrEqualsThan(123456789, 9), "Is a number with a length equals than 9");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse(NumberValidation::isLengthLessOrEqualsThan(123456789, 8), "Is not a number with length less than 8");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue(NumberValidation::isLengthLessThan(123456789, 15), "Is a number with a length less than 15");
        $this->assertTrue(NumberValidation::isLengthLessThan(123456789, 12), "Is a number with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse(NumberValidation::isLengthLessThan(123456789, 8), "Is not a number with length less than 10");
    }
}