<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class StringMultipleTest extends TestCase
{

    public function testLongString()
    {
        $validator = new StringValidations('pepeillo surname');
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($validator->success());
        //echo print_r($validator->getResults(), true);
    }

    public function testLongStringFail()
    {
        $validator = new StringValidations('pepeillo');
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($validator->success());
        //echo print_r($validator->getResults(), true);
    }

    public function testLongEmail()
    {
        $validator = new StringValidations('pepeillo@mydomain.com');
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isEmail();

        $this->assertTrue($validator->success());
        //echo print_r($validator->getResults(), true);
    }

    public function testLongDomain()
    {
        $validator = new StringValidations('mylongdomain.com');
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isDomain();

        $this->assertTrue($validator->success());
        //echo print_r($validator->getResults(), true);
    }

    public function testLongUrl()
    {
        $validator = new StringValidations('https://mylongdomain.com');
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isUrl();

        $this->assertTrue($validator->success());
        //echo print_r($validator->getResults(), true);
    }
}