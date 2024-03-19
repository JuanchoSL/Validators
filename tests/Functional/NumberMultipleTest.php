<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Numbers\NumberValidations;
use PHPUnit\Framework\TestCase;

class NumberMultipleTest extends TestCase
{

    public function testLongNumber()
    {
        $validator = new NumberValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($validator->getResult(1234567890123456));
        //echo print_r($validator->getResults(), true);
    }

    public function testLongNumberFail()
    {
        $validator = new NumberValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($validator->getResult(123456789));
        //echo print_r($validator->getResults(), true);
    }
    public function testLessNumber()
    {
        $validator = new NumberValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(25);

        $this->assertTrue($validator->getResult(1234567890123456));
        //echo print_r($validator->getResults(), true);
    }

    public function testLessNumberFail()
    {
        $validator = new NumberValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(5);

        $this->assertFalse($validator->getResult(123456789));
        //echo print_r($validator->getResults(), true);
    }

}