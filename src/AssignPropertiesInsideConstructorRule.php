<?php

declare(strict_types=1);

namespace Shiiyan\MyFirstPhpStan;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Expr\Assign>
 */
class AssignPropertiesInsideConstructorRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\Assign::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$scope->isInClass()) {
            return [];
        }

        if (!$node->var instanceof Node\Expr\PropertyFetch) {
            return [];
        }

        if (!$node->var->name instanceof Node\Identifier) {
            return [];
        }

        $inMethod = $scope->getFunction();
        if (!$inMethod instanceof MethodReflection) {
            return [];
        }

        if ($inMethod->getName() === '__construct') {
            return [];
        }

        return [
            RuleErrorBuilder::message(
                sprintf(
                    'Immutability violated - assigning $%s property outside constructor.',
                    $node->var->name->toString()
                )
            )->build()
        ];
    }
}
