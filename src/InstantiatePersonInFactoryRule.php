<?php

declare(strict_types=1);

namespace Shiiyan\MyFirstPhpStan;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements \PHPStan\Rules\Rule<Node\Expr\New_>
 */
class InstantiatePersonInFactoryRule implements \PHPStan\Rules\Rule
{
    public function getNodeType(): string
    {
        return Node\Expr\New_::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node->class instanceof Node\Name) {
            return [];
        }

        if ($node->class->toString() !== Person::class) {
            return [];
        }

        if (
            $scope->isInClass()
            && $scope->getClassReflection()->getName() === PersonFactory::class
        ) {
            return [];
        }

        return [
            RuleErrorBuilder::message(
                'New Person instance can be created only in PersonFactory'
            )->build()
        ];
    }
}
