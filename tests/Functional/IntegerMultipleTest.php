<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Integers\IntegerValidations;
use PHPUnit\Framework\TestCase;

class IntegerMultipleTest extends TestCase
{
    protected $validator;

    public function setUp(): void
    {
        $this->validator = new IntegerValidations();
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
}