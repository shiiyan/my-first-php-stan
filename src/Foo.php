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

    public function init(): void
    {
        $Model1 = ClassRegistry::init(ClassRegistryPath::MY_CLASS);
        $Model2 = ClassRegistry::init('aaa');
    }
}
