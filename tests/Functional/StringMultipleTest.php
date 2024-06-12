<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class StringMultipleTest extends TestCase
{

    public function testLongString()
    {
        $validator = new StringValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($validator->getResult('pepeillo surname'));
        //echo print_r($validator->getResults(), true);
    }

    public function testLongStringFail()
    {
        $validator = new StringValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($validator->getResult('pepeillo'));
        //echo print_r($validator->getResults(), true);
    }

    public function testLongEmail()
    {
        $validator = new StringValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isEmail();

        $this->assertTrue($validator->getResult('pepeillo@mydomain.com'));
        //echo print_r($validator->getResults(), true);
    }

    public function testLongEmails()
    {
        $validator = new StringValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isEmail();

        foreach (['pepeillo@mydomain.com', 'manolete@mydomain.com'] as $email) {
            $this->assertTrue($validator->getResult($email));
        }
        //echo print_r($validator->getResults(), true);
    }

    public function testLongDomain()
    {
        $validator = new StringValidations;
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isDomain();

        $this->assertTrue($validator->getResult('mylongdomain.com'));
        //echo print_r($validator->getResults(), true);
    }

    public function testLongUrl()
    {
        $validator = new StringValidations();
        $validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isUrl();

        $this->assertTrue($validator->getResult('https://mylongdomain.com'));
        //echo print_r($validator->getResults(), true);
    }
}