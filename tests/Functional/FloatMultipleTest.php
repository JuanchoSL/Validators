<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Floats\FloatValidations;
use PHPUnit\Framework\TestCase;

class FloatMultipleTest extends TestCase
{
    protected $validator;

    public function setUp(): void
    {
        $this->validator = new FloatValidations();
    }
    public function testLongNumber()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(12);

        $this->assertTrue($this->validator->getResult(1234567890.123456789));
        $this->assertTrue($this->validator->__invoke(1234567890.123456789));
        $this->assertTrue($validator(1234567890.123456789));
    }

    public function testLongNumberFail()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($this->validator->getResult(1234.56789));
        $this->assertFalse($this->validator->__invoke(1234.56789));
        $this->assertFalse($validator(1234.56789));
    }

    public function testLessNumber()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(25);

        $this->assertTrue($this->validator->getResult(1234567890.123456));
        $this->assertTrue($this->validator->__invoke(1234567890.123456));
        $this->assertTrue($validator(1234567890.123456));
    }

    public function testLessNumberFail()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(5);

        $this->assertFalse($this->validator->getResult(123456.789));
        $this->assertFalse($this->validator->__invoke(123456.789));
        $this->assertFalse($validator(123456.789));
    }
}