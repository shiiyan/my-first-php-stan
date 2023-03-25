<?php

declare(strict_types=1);

namespace Shiiyan\MyFirstPhpStan;

class HelloWorld
{
    public function sayHello(\DateTimeImmutable $date): void
    {
        echo 'Hello,  ' . $date->format('j. n. Y');
    }
}
