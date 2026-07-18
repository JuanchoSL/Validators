<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts;

interface DebuggableInterface
{

    public function setDebug(bool $debug): void;
}