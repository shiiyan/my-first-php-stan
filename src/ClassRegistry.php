<?php

declare(strict_types=1);

namespace Shiiyan\MyFirstPhpStan;

class ClassRegistry
{
    static function init(string $path): string
    {
        return 'init ' . $path;
    }
}
