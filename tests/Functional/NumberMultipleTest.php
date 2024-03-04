<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\NumberValidations;
use PHPUnit\Framework\TestCase;

class NumberMultipleTest extends TestCase
{

    public function testLongNumber()
    {
        $validator = new NumberValidations(1234567890123456);
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($validator->success());
        //echo print_r($validator->getResults(), true);
    }

    public function testLongNumberFail()
    {
        $validator = new NumberValidations(123456789);
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($validator->success());
        //echo print_r($validator->getResults(), true);
    }
    public function testLessNumber()
    {
        $validator = new NumberValidations(1234567890123456);
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(25);

        $this->assertTrue($validator->success());
        //echo print_r($validator->getResults(), true);
    }

    public function testLessNumberFail()
    {
        $validator = new NumberValidations(123456789);
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthLessThan(5);

        $this->assertFalse($validator->success());
        //echo print_r($validator->getResults(), true);
    }

}