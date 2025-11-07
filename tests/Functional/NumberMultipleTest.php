<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Numbers\NumberValidations;
use PHPUnit\Framework\TestCase;

class NumberMultipleTest extends TestCase
{
    protected $validator;

    public function setUp(): void
    {
        $this->validator = new NumberValidations();
    }
    public function testLongNumber()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($this->validator->getResult(1234567890123456));
    }

    public function testLongNumberFail()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($this->validator->getResult(123456789));
    }

    public function testLessNumber()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(25);

        $this->assertTrue($this->validator->getResult(1234567890123456));
    }

    public function testLessNumberFail()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(5);

        $this->assertFalse($this->validator->getResult(123456789));
    }
    public function testLessValue()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueLessThan(25);

        $this->assertTrue($this->validator->getResult(24));
    }

    public function testLessValueFail()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueLessThan(5);

        foreach ([5, 6] as $comparator) {
            $this->assertFalse($this->validator->getResult($comparator));
        }
    }
    public function testLessOrEqualsValue()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueLessThanOrEquals(25);

        foreach ([24, 25] as $comparator) {
            $this->assertTrue($this->validator->getResult($comparator));
        }
    }

    public function testLessOrEqualsValueFail()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueLessThanOrEquals(5);

        foreach ([6, 7] as $comparator) {
            $this->assertFalse($this->validator->getResult($comparator));
        }
    }

    public function testIsRangeTrue()
    {
        $this->assertTrue($this->validator->isValueIntoRange(5, 10)->getResult(7), "range true");
        $this->assertTrue($this->validator->isValueIntoRange(5, 10)->getResult(5), "range true");
        $this->assertTrue($this->validator->isValueIntoRange(5, 10)->getResult(10), "range true");
    }
    public function testIsRangeFalse()
    {
        $this->assertFalse($this->validator->isValueIntoRange(5, 10)->getResult(14), "range false");
    }
}