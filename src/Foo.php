<?php

declare(strict_types=1);

namespace Shiiyan\MyFirstPhpStan;

class Foo
{
    public function doFoo(): void
    {
        $p = new Person("foo@example.com");
        $p->email = "foo2@exmaple.com";
    }
}
