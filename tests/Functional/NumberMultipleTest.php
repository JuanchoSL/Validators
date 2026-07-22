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
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($this->validator->getResult(1234567890123456));
        $this->assertTrue($this->validator->__invoke(1234567890123456));
        $this->assertTrue($validator(1234567890123456));
    }

    public function testLongNumberFail()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($this->validator->getResult(123456789));
        $this->assertFalse($this->validator->__invoke(123456789));
        $this->assertFalse($validator(123456789));
    }

    public function testLessNumber()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(25);

        $this->assertTrue($this->validator->getResult(1234567890123456));
        $this->assertTrue($this->validator->__invoke(1234567890123456));
        $this->assertTrue($validator(1234567890123456));
    }

    public function testLessNumberFail()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(5);

        $this->assertFalse($this->validator->getResult(123456789));
        $this->assertFalse($this->validator->__invoke(123456789));
        $this->assertFalse($validator(123456789));
    }
    public function testLessValue()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueLessThan(25);

        $this->assertTrue($this->validator->getResult(24));
        $this->assertTrue($this->validator->__invoke(24));
        $this->assertTrue($validator(24));
    }

    public function testLessValueFail()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueLessThan(5);

        foreach ([5, 6] as $comparator) {
            $this->assertFalse($this->validator->getResult($comparator));
            $this->assertFalse($this->validator->__invoke($comparator));
            $this->assertFalse($validator($comparator));
        }
    }
    public function testLessOrEqualsValue()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueLessThanOrEquals(25);

        foreach ([24, 25] as $comparator) {
            $this->assertTrue($this->validator->getResult($comparator));
            $this->assertTrue($this->validator->__invoke($comparator));
            $this->assertTrue($validator($comparator));
        }
    }

    public function testLessOrEqualsValueFail()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueLessThanOrEquals(5);

        foreach ([6, 7] as $comparator) {
            $this->assertFalse($this->validator->getResult($comparator));
            $this->assertFalse($this->validator->__invoke($comparator));
            $this->assertFalse($validator($comparator));
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
    public function testIsContaining()
    {
        $this->assertTrue($this->validator->isValueContaining(1)->getResult(14), "containing true");
    }
    public function testIsContainingFalse()
    {
        $this->assertFalse($this->validator->isValueContaining(5)->getResult(14), "containing false");
    }
    public function testIsContainingAny()
    {
        $this->assertTrue($this->validator->isValueContainingAny(1, 5)->getResult(14), "containing any true");
        $this->assertTrue($this->validator->isValueContainingAny(5, 1)->getResult(14), "containing any true");
        $this->assertTrue($this->validator->isValueContainingAny(4, 1)->getResult(14), "containing any true");
    }
    public function testIsContainingAnyFalse()
    {
        $this->assertFalse($this->validator->isValueContainingAny(2, 3)->getResult(14), "containing any false");
    }
    public function testIsStarting()
    {
        $this->assertTrue($this->validator->isValueStartingWith(1)->getResult(14), "starting true");
        $this->assertFalse($this->validator->isValueStartingWith(4)->getResult(14), "starting false");
        $this->assertFalse($this->validator->isValueStartingWith(5)->getResult(14), "starting false");
    }
    public function testIsStartingAny()
    {
        $this->assertTrue($this->validator->isValueStartingWith(1, 4, 5)->getResult(14), "starting any true");
        $this->assertFalse($this->validator->isValueStartingWith(5, 6, 7)->getResult(14), "starting any false");
    }
    public function testIsEnding()
    {
        $this->assertTrue($this->validator->isValueEndingWith(4)->getResult(14), "ending true");
        $this->assertFalse($this->validator->isValueEndingWith(1)->getResult(14), "ending false");
        $this->assertFalse($this->validator->isValueEndingWith(5)->getResult(14), "ending false");
    }
    public function testIsEndingAny()
    {
        $this->assertTrue($this->validator->isValueEndingWithAny(4, 1)->getResult(14), "ending any true");
        $this->assertFalse($this->validator->isValueEndingWithAny(5, 6)->getResult(14), "ending any false");
    }
}