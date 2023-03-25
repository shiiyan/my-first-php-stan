<?php

declare(strict_types=1);

namespace Shiiyan\MyFirstPhpStan;

class Person
{
    /**
     * !!! DO NOT INSTANTIATE Person DIRECTLY! Use PersonFactory instead !!!
     */
    public function __construct(string $email)
    {
    }
}
