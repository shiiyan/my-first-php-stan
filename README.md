# My First PHPStan Project

## Custom Rules

- InstantiatePersonInFactoryRule
- AssignPropertiesInsideConstructorRule
- ClassRegistryInitWithEnumRule

## PHPStan Analysis

PHPStan outputs like below.

```console
 % php bin/composer phpstan:analyse;
> vendor/bin/phpstan analyse -c phpstan.neon
 9/9 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%

 ------ ------------------------------------------------------------------------
  Line   Foo.php
 ------ ------------------------------------------------------------------------
  :11    New Person instance can be created only in PersonFactory
  :12    Immutability violated - assigning $email property outside constructor.
  :18    ClassRegistry::init must use ClassRegistryPath as its first argument
 ------ ------------------------------------------------------------------------
```
