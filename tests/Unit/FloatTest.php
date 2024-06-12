<?php

namespace JuanchoSL\Validators\Tests\Unit;

use JuanchoSL\Validators\Types\Floats\FloatValidation;
use PHPUnit\Framework\TestCase;

class FloatTest extends TestCase
{
    public function testIsNumberTrue()
    {
        $this->assertFalse(FloatValidation::is(123456789), "Is a number");
        $this->assertTrue(FloatValidation::is(12345.6789), "Is a number");
        $this->assertTrue(FloatValidation::is(0.123456789), "Is a number");
        $this->assertFalse(FloatValidation::is(0), "Is a number");
    }
    public function testIsNumberFalse()
    {
        $this->assertFalse(FloatValidation::is('Is a number'), "Is not a number");
        $this->assertFalse(FloatValidation::is(""), "Is not a number");
        $this->assertFalse(FloatValidation::is(" "), "Is not a number");
        $this->assertFalse(FloatValidation::is(false), "Is not a number");
        $this->assertFalse(FloatValidation::is(null), "Is not a number");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(FloatValidation::isEmpty(0), "Is an empty number");
        $this->assertTrue(FloatValidation::isEmpty(false), "Is an empty number");
        $this->assertTrue(FloatValidation::isEmpty(null), "Is an empty number");
    }
    public function testIsEmptyFalse()
    {
        $this->assertFalse(FloatValidation::isEmpty(1), "Is not an empty number");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue(FloatValidation::isNotEmpty(1), "Is not an empty number");
    }
    public function testIsNotEmptyFalse()
    {
        $this->assertFalse(FloatValidation::isNotEmpty(0), "Is an empty number");
        $this->assertFalse(FloatValidation::isNotEmpty(false), "Is an empty number");
        $this->assertFalse(FloatValidation::isNotEmpty(null), "Is an empty number");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue(FloatValidation::isLengthGreatherThan(123456789, 8), "Is a number with a length greather than 8");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse(FloatValidation::isLengthGreatherThan(123456789, 15), "Is not a number with a length greather than 15");
        $this->assertFalse(FloatValidation::isLengthGreatherThan(123456789, 11), "Is not a number with a length greather than 11");
        $this->assertFalse(FloatValidation::isLengthGreatherThan(123456789, 10), "Is not a number with a length greather than 10");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue(FloatValidation::isLengthGreatherOrEqualsThan(123456789, 8), "Is a number with a length greather than 8");
        $this->assertTrue(FloatValidation::isLengthGreatherOrEqualsThan(123456789, 9), "Is a number with a length equals than 9");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse(FloatValidation::isLengthGreatherOrEqualsThan(123456789, 15), "Is not a number with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue(FloatValidation::isLengthLessOrEqualsThan(123456789, 15), "Is a number with a length less than 15");
        $this->assertTrue(FloatValidation::isLengthLessOrEqualsThan(123456789, 9), "Is a number with a length equals than 9");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse(FloatValidation::isLengthLessOrEqualsThan(123456789, 8), "Is not a number with length less than 8");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue(FloatValidation::isLengthLessThan(123456789, 15), "Is a number with a length less than 15");
        $this->assertTrue(FloatValidation::isLengthLessThan(123456789, 12), "Is a number with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse(FloatValidation::isLengthLessThan(123456789, 8), "Is not a number with length less than 10");
    }
}