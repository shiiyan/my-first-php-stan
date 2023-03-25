<?php

declare(strict_types=1);

namespace Shiiyan\MyFirstPhpStan;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Expr\StaticCall>
 */
class ClassRegistryInitWithEnumRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\StaticCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node->class instanceof Node\Name) {
            return [];
        }

        if ($node->class->toString() !== ClassRegistry::class) {
            return [];
        }

        if (!$node->name instanceof Node\Identifier) {
            return [];
        }

        if ($node->name->toString() !== 'init') {
            return [];
        }

        $firstArg = $node->args[0]->value;
        if (
            $firstArg instanceof Node\Expr\ClassConstFetch
            && $firstArg->class->toString() === ClassRegistryPath::class
        ) {
            return [];
        }

        return [
            RuleErrorBuilder::message(
                'ClassRegistry::init must use ClassRegistryPath as its first argument'
            )->build()
        ];
    }
}
