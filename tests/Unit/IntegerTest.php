<?php

namespace JuanchoSL\Validators\Tests\Unit;

use JuanchoSL\Validators\Types\Integers\IntegerValidation;
use PHPUnit\Framework\TestCase;

class IntegerTest extends TestCase
{
    public function testIsNumberTrue()
    {
        $this->assertTrue(IntegerValidation::is(123456789), "Is a number");
        $this->assertFalse(IntegerValidation::is(12345.6789), "Is a number");
        $this->assertFalse(IntegerValidation::is(0.123456789), "Is a number");
        $this->assertTrue(IntegerValidation::is(0), "Is a number");
    }
    public function testIsNumberFalse()
    {
        $this->assertFalse(IntegerValidation::is('Is a number'), "Is not a number");
        $this->assertFalse(IntegerValidation::is(""), "Is not a number");
        $this->assertFalse(IntegerValidation::is(" "), "Is not a number");
        $this->assertFalse(IntegerValidation::is(false), "Is not a number");
        $this->assertFalse(IntegerValidation::is(null), "Is not a number");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(IntegerValidation::isEmpty(0), "Is an empty number");
        $this->assertTrue(IntegerValidation::isEmpty(false), "Is an empty number");
        $this->assertTrue(IntegerValidation::isEmpty(null), "Is an empty number");
    }
    public function testIsEmptyFalse()
    {
        $this->assertFalse(IntegerValidation::isEmpty(1), "Is not an empty number");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue(IntegerValidation::isNotEmpty(1), "Is not an empty number");
    }
    public function testIsNotEmptyFalse()
    {
        $this->assertFalse(IntegerValidation::isNotEmpty(0), "Is an empty number");
        $this->assertFalse(IntegerValidation::isNotEmpty(false), "Is an empty number");
        $this->assertFalse(IntegerValidation::isNotEmpty(null), "Is an empty number");
    }

    public function testIsLengthEqualsTrue()
    {
        $this->assertTrue(IntegerValidation::isLengthEqualsThan(123456789, 9), "Is a number with a length equals to 9");
    }
    public function testIsLengthEqualsFalse()
    {
        $this->assertFalse(IntegerValidation::isLengthEqualsThan(123456789, 8), "Is not a number with a length equals to 8");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue(IntegerValidation::isLengthGreatherThan(123456789, 8), "Is a number with a length greather than 8");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse(IntegerValidation::isLengthGreatherThan(123456789, 15), "Is not a number with a length greather than 15");
        $this->assertFalse(IntegerValidation::isLengthGreatherThan(123456789, 11), "Is not a number with a length greather than 11");
        $this->assertFalse(IntegerValidation::isLengthGreatherThan(123456789, 10), "Is not a number with a length greather than 10");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue(IntegerValidation::isLengthGreatherOrEqualsThan(123456789, 8), "Is a number with a length greather than 8");
        $this->assertTrue(IntegerValidation::isLengthGreatherOrEqualsThan(123456789, 9), "Is a number with a length equals than 9");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse(IntegerValidation::isLengthGreatherOrEqualsThan(123456789, 15), "Is not a number with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue(IntegerValidation::isLengthLessOrEqualsThan(123456789, 15), "Is a number with a length less than 15");
        $this->assertTrue(IntegerValidation::isLengthLessOrEqualsThan(123456789, 9), "Is a number with a length equals than 9");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse(IntegerValidation::isLengthLessOrEqualsThan(123456789, 8), "Is not a number with length less than 8");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue(IntegerValidation::isLengthLessThan(123456789, 15), "Is a number with a length less than 15");
        $this->assertTrue(IntegerValidation::isLengthLessThan(123456789, 12), "Is a number with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse(IntegerValidation::isLengthLessThan(123456789, 8), "Is not a number with length less than 10");
    }
    
    public function testIsValueEqualsTrue()
    {
        $this->assertTrue(IntegerValidation::isValueEqualsThan(123456789, 123456789), "Is a number with value equals to");
    }
    public function testIsValueEqualsFalse()
    {
        $this->assertFalse(IntegerValidation::isValueEqualsThan(123456789, 123456788), "Is not a number with value equals to");
    }

    public function testIsValueGreatherOrEqualsTrue()
    {
        $this->assertTrue(IntegerValidation::isValueGreatherThanOrEquals(123456789, 123456789), "Is a number with value greather than or equals to");
        $this->assertTrue(IntegerValidation::isValueGreatherThanOrEquals(123456790, 123456789), "Is a number with value greather than or equals to");
    }
    public function testIsValueGreatherOrEqualsFalse()
    {
        $this->assertFalse(IntegerValidation::isValueGreatherThanOrEquals(123456787, 123456788), "Is not a number with value greather than or equals to");
    }

    public function testIsValueGreatherTrue()
    {
        $this->assertTrue(IntegerValidation::isValueGreatherThan(123456790, 123456789), "Is a number with value greather than to");
    }
    public function testIsValueGreatherFalse()
    {
        $this->assertFalse(IntegerValidation::isValueGreatherThan(123456789, 123456789), "Is not a number with value greather than to");
        $this->assertFalse(IntegerValidation::isValueGreatherThan(123456787, 123456788), "Is not a number with value greather than to");
    }
    
    public function testIsValueLessOrEqualsTrue()
    {
        $this->assertTrue(IntegerValidation::isValueLessThanOrEquals(123456789, 123456789), "Is a number with value Less than or equals to");
        $this->assertTrue(IntegerValidation::isValueLessThanOrEquals(123456788, 123456789), "Is a number with value Less than or equals to");
    }
    public function testIsValueLessOrEqualsFalse()
    {
        $this->assertFalse(IntegerValidation::isValueLessThanOrEquals(123456789, 123456788), "Is not a number with value Less than or equals to");
    }
    
    public function testIsValueLessTrue()
    {
        $this->assertTrue(IntegerValidation::isValueLessThan(123456788, 123456789), "Is a number with value Less than or equals to");
    }
    public function testIsValueLessFalse()
    {
        $this->assertFalse(IntegerValidation::isValueLessThan(123456789, 123456789), "Is not a number with value Less than to");
        $this->assertFalse(IntegerValidation::isValueLessThan(123456789, 123456788), "Is not a number with value Less than to");
    }
}