<?php

declare(strict_types=1);

namespace Shiiyan\MyFirstPhpStan;

class Person
{
    public string $email;

    /**
     * !!! DO NOT INSTANTIATE Person DIRECTLY! Use PersonFactory instead !!!
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }
}
