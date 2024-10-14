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

    public function testIsLengthEqualsTrue()
    {
        $this->assertTrue(FloatValidation::isLengthEqualsThan(123456789, 9), "Is a number with a length equals to 9");
    }
    public function testIsLengthEqualsFalse()
    {
        $this->assertFalse(FloatValidation::isLengthEqualsThan(123456789, 8), "Is not a number with a length equals to 8");
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
    
    public function testIsValueEqualsTrue()
    {
        $this->assertTrue(FloatValidation::isValueEqualsThan(123456789.2, 123456789.2), "Is a number with value equals to");
        $this->assertTrue(FloatValidation::isValueEqualsThan(123456789.0, 123456789), "Is a number with value equals to");
    }
    public function testIsValueEqualsFalse()
    {
        $this->assertFalse(FloatValidation::isValueEqualsThan(123456789.0, 123456788), "Is not a number with value equals to");
    }

    public function testIsValueGreatherOrEqualsTrue()
    {
        $this->assertTrue(FloatValidation::isValueGreatherThanOrEquals(123456789.0, 123456789), "Is a number with value greather than or equals to");
        $this->assertTrue(FloatValidation::isValueGreatherThanOrEquals(123456789, 123456789.0), "Is a number with value greather than or equals to");
        $this->assertTrue(FloatValidation::isValueGreatherThanOrEquals(123456789.1, 123456789.1), "Is a number with value greather than or equals to");
        $this->assertTrue(FloatValidation::isValueGreatherThanOrEquals(123456789.2, 123456789.0), "Is a number with value greather than or equals to");
    }
    public function testIsValueGreatherOrEqualsFalse()
    {
        $this->assertFalse(FloatValidation::isValueGreatherThanOrEquals(123456787.2, 123456788), "Is not a number with value greather than or equals to");
        $this->assertFalse(FloatValidation::isValueGreatherThanOrEquals(123456787.0, 123456788), "Is not a number with value greather than or equals to");
    }

    public function testIsValueGreatherTrue()
    {
        $this->assertTrue(FloatValidation::isValueGreatherThan(123456790, 123456789), "Is a number with value greather than to");
    }
    public function testIsValueGreatherFalse()
    {
        $this->assertFalse(FloatValidation::isValueGreatherThan(123456789, 123456789), "Is not a number with value greather than to");
        $this->assertFalse(FloatValidation::isValueGreatherThan(123456787, 123456788), "Is not a number with value greather than to");
    }
    
    public function testIsValueLessOrEqualsTrue()
    {
        $this->assertTrue(FloatValidation::isValueLessThanOrEquals(123456789, 123456789), "Is a number with value Less than or equals to");
        $this->assertTrue(FloatValidation::isValueLessThanOrEquals(123456788, 123456789), "Is a number with value Less than or equals to");
    }
    public function testIsValueLessOrEqualsFalse()
    {
        $this->assertFalse(FloatValidation::isValueLessThanOrEquals(123456789, 123456788), "Is not a number with value Less than or equals to");
    }
    
    public function testIsValueLessTrue()
    {
        $this->assertTrue(FloatValidation::isValueLessThan(123456788, 123456789), "Is a number with value Less than or equals to");
    }
    public function testIsValueLessFalse()
    {
        $this->assertFalse(FloatValidation::isValueLessThan(123456789, 123456789), "Is not a number with value Less than to");
        $this->assertFalse(FloatValidation::isValueLessThan(123456789, 123456788), "Is not a number with value Less than to");
    }
}