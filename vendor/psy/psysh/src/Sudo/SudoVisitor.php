<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Sudo;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
<<<<<<< HEAD
use PhpParser\Node\Expr\New_;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\StaticPropertyFetch;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified as FullyQualifiedName;
use PhpParser\Node\Scalar\String_;
use PhpParser\NodeVisitorAbstract;
use Psy\Sudo;

/**
 * A PHP Parser node visitor which rewrites property and method access to use
 * the Psy\Sudo visibility bypass methods.
 *
 * @todo handle assigning by reference
 */
class SudoVisitor extends NodeVisitorAbstract
{
<<<<<<< HEAD
    const PROPERTY_FETCH = 'fetchProperty';
    const PROPERTY_ASSIGN = 'assignProperty';
    const METHOD_CALL = 'callMethod';
    const STATIC_PROPERTY_FETCH = 'fetchStaticProperty';
    const STATIC_PROPERTY_ASSIGN = 'assignStaticProperty';
    const STATIC_CALL = 'callStatic';
    const CLASS_CONST_FETCH = 'fetchClassConst';
    const NEW_INSTANCE = 'newInstance';

    /**
     * {@inheritdoc}
     *
     * @return int|Node|null Replacement node (or special return value)
=======
    const PROPERTY_FETCH         = 'fetchProperty';
    const PROPERTY_ASSIGN        = 'assignProperty';
    const METHOD_CALL            = 'callMethod';
    const STATIC_PROPERTY_FETCH  = 'fetchStaticProperty';
    const STATIC_PROPERTY_ASSIGN = 'assignStaticProperty';
    const STATIC_CALL            = 'callStatic';
    const CLASS_CONST_FETCH      = 'fetchClassConst';

    /**
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function enterNode(Node $node)
    {
        if ($node instanceof PropertyFetch) {
            $name = $node->name instanceof Identifier ? $node->name->toString() : $node->name;
            $args = [
                $node->var,
                \is_string($name) ? new String_($name) : $name,
            ];

            return $this->prepareCall(self::PROPERTY_FETCH, $args);
        } elseif ($node instanceof Assign && $node->var instanceof PropertyFetch) {
            $target = $node->var;
<<<<<<< HEAD
            $name = $target->name instanceof Identifier ? $target->name->toString() : $target->name;
            $args = [
=======
            $name   = $target->name instanceof Identifier ? $target->name->toString() : $target->name;
            $args   = [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $target->var,
                \is_string($name) ? new String_($name) : $name,
                $node->expr,
            ];

            return $this->prepareCall(self::PROPERTY_ASSIGN, $args);
        } elseif ($node instanceof MethodCall) {
            $name = $node->name instanceof Identifier ? $node->name->toString() : $node->name;
            $args = $node->args;
            \array_unshift($args, new Arg(\is_string($name) ? new String_($name) : $name));
            \array_unshift($args, new Arg($node->var));

            // not using prepareCall because the $node->args we started with are already Arg instances
            return new StaticCall(new FullyQualifiedName(Sudo::class), self::METHOD_CALL, $args);
        } elseif ($node instanceof StaticPropertyFetch) {
            $class = $node->class instanceof Name ? $node->class->toString() : $node->class;
            $name = $node->name instanceof Identifier ? $node->name->toString() : $node->name;
<<<<<<< HEAD
            $args = [
=======
            $args  = [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                \is_string($class) ? new String_($class) : $class,
                \is_string($name) ? new String_($name) : $name,
            ];

            return $this->prepareCall(self::STATIC_PROPERTY_FETCH, $args);
        } elseif ($node instanceof Assign && $node->var instanceof StaticPropertyFetch) {
            $target = $node->var;
<<<<<<< HEAD
            $class = $target->class instanceof Name ? $target->class->toString() : $target->class;
            $name = $target->name instanceof Identifier ? $target->name->toString() : $target->name;
            $args = [
=======
            $class  = $target->class instanceof Name ? $target->class->toString() : $target->class;
            $name   = $target->name instanceof Identifier ? $target->name->toString() : $target->name;
            $args   = [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                \is_string($class) ? new String_($class) : $class,
                \is_string($name) ? new String_($name) : $name,
                $node->expr,
            ];

            return $this->prepareCall(self::STATIC_PROPERTY_ASSIGN, $args);
        } elseif ($node instanceof StaticCall) {
<<<<<<< HEAD
            $args = $node->args;
            $class = $node->class instanceof Name ? $node->class->toString() : $node->class;
            $name = $node->name instanceof Identifier ? $node->name->toString() : $node->name;
=======
            $args  = $node->args;
            $class = $node->class instanceof Name ? $node->class->toString() : $node->class;
            $name  = $node->name instanceof Identifier ? $node->name->toString() : $node->name;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            \array_unshift($args, new Arg(\is_string($name) ? new String_($name) : $name));
            \array_unshift($args, new Arg(\is_string($class) ? new String_($class) : $class));

            // not using prepareCall because the $node->args we started with are already Arg instances
            return new StaticCall(new FullyQualifiedName(Sudo::class), self::STATIC_CALL, $args);
        } elseif ($node instanceof ClassConstFetch) {
            $class = $node->class instanceof Name ? $node->class->toString() : $node->class;
<<<<<<< HEAD
            $name = $node->name instanceof Identifier ? $node->name->toString() : $node->name;
            $args = [
=======
            $name  = $node->name instanceof Identifier ? $node->name->toString() : $node->name;
            $args  = [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                \is_string($class) ? new String_($class) : $class,
                \is_string($name) ? new String_($name) : $name,
            ];

            return $this->prepareCall(self::CLASS_CONST_FETCH, $args);
<<<<<<< HEAD
        } elseif ($node instanceof New_) {
            $args = $node->args;
            $class = $node->class instanceof Name ? $node->class->toString() : $node->class;
            \array_unshift($args, new Arg(\is_string($class) ? new String_($class) : $class));

            // not using prepareCall because the $node->args we started with are already Arg instances
            return new StaticCall(new FullyQualifiedName(Sudo::class), self::NEW_INSTANCE, $args);
        }
    }

    private function prepareCall(string $method, array $args): StaticCall
=======
        }
    }

    private function prepareCall($method, $args)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new StaticCall(new FullyQualifiedName(Sudo::class), $method, \array_map(function ($arg) {
            return new Arg($arg);
        }, $args));
    }
}
