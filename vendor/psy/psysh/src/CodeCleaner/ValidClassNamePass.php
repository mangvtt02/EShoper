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

namespace Psy\CodeCleaner;

use PhpParser\Node;
use PhpParser\Node\Expr;
<<<<<<< HEAD
use PhpParser\Node\Expr\Ternary;
=======
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Do_;
use PhpParser\Node\Stmt\If_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Switch_;
use PhpParser\Node\Stmt\Trait_;
use PhpParser\Node\Stmt\While_;
use Psy\Exception\FatalErrorException;

/**
 * Validate that classes exist.
 *
 * This pass throws a FatalErrorException rather than letting PHP run
 * headfirst into a real fatal error and die.
 */
class ValidClassNamePass extends NamespaceAwarePass
{
<<<<<<< HEAD
    const CLASS_TYPE = 'class';
    const INTERFACE_TYPE = 'interface';
    const TRAIT_TYPE = 'trait';
=======
    const CLASS_TYPE     = 'class';
    const INTERFACE_TYPE = 'interface';
    const TRAIT_TYPE     = 'trait';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    private $conditionalScopes = 0;

    /**
     * Validate class, interface and trait definitions.
     *
     * Validate them upon entering the node, so that we know about their
     * presence and can validate constant fetches and static calls in class or
     * trait methods.
     *
     * @param Node $node
<<<<<<< HEAD
     *
     * @return int|Node|null Replacement node (or special return value)
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function enterNode(Node $node)
    {
        parent::enterNode($node);

        if (self::isConditional($node)) {
            $this->conditionalScopes++;
<<<<<<< HEAD

            return;
        }

        if ($this->conditionalScopes === 0) {
            if ($node instanceof Class_) {
                $this->validateClassStatement($node);
            } elseif ($node instanceof Interface_) {
                $this->validateInterfaceStatement($node);
            } elseif ($node instanceof Trait_) {
                $this->validateTraitStatement($node);
=======
        } else {
            // @todo add an "else" here which adds a runtime check for instances where we can't tell
            // whether a class is being redefined by static analysis alone.
            if ($this->conditionalScopes === 0) {
                if ($node instanceof Class_) {
                    $this->validateClassStatement($node);
                } elseif ($node instanceof Interface_) {
                    $this->validateInterfaceStatement($node);
                } elseif ($node instanceof Trait_) {
                    $this->validateTraitStatement($node);
                }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }
    }

    /**
<<<<<<< HEAD
     * @param Node $node
     *
     * @return int|Node|Node[]|null Replacement node (or special return value)
=======
     * Validate `new` expressions, class constant fetches, and static calls.
     *
     * @throws FatalErrorException if a class, interface or trait is referenced which does not exist
     * @throws FatalErrorException if a class extends something that is not a class
     * @throws FatalErrorException if a class implements something that is not an interface
     * @throws FatalErrorException if an interface extends something that is not an interface
     * @throws FatalErrorException if a class, interface or trait redefines an existing class, interface or trait name
     *
     * @param Node $node
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function leaveNode(Node $node)
    {
        if (self::isConditional($node)) {
            $this->conditionalScopes--;
<<<<<<< HEAD
        }
    }

    private static function isConditional(Node $node): bool
=======
        } elseif ($node instanceof New_) {
            $this->validateNewExpression($node);
        } elseif ($node instanceof ClassConstFetch) {
            $this->validateClassConstFetchExpression($node);
        } elseif ($node instanceof StaticCall) {
            $this->validateStaticCallExpression($node);
        }
    }

    private static function isConditional(Node $node)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $node instanceof If_ ||
            $node instanceof While_ ||
            $node instanceof Do_ ||
<<<<<<< HEAD
            $node instanceof Switch_ ||
            $node instanceof Ternary;
=======
            $node instanceof Switch_;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Validate a class definition statement.
     *
     * @param Class_ $stmt
     */
    protected function validateClassStatement(Class_ $stmt)
    {
        $this->ensureCanDefine($stmt, self::CLASS_TYPE);
        if (isset($stmt->extends)) {
            $this->ensureClassExists($this->getFullyQualifiedName($stmt->extends), $stmt);
        }
        $this->ensureInterfacesExist($stmt->implements, $stmt);
    }

    /**
     * Validate an interface definition statement.
     *
     * @param Interface_ $stmt
     */
    protected function validateInterfaceStatement(Interface_ $stmt)
    {
        $this->ensureCanDefine($stmt, self::INTERFACE_TYPE);
        $this->ensureInterfacesExist($stmt->extends, $stmt);
    }

    /**
     * Validate a trait definition statement.
     *
     * @param Trait_ $stmt
     */
    protected function validateTraitStatement(Trait_ $stmt)
    {
        $this->ensureCanDefine($stmt, self::TRAIT_TYPE);
    }

    /**
<<<<<<< HEAD
=======
     * Validate a `new` expression.
     *
     * @param New_ $stmt
     */
    protected function validateNewExpression(New_ $stmt)
    {
        // if class name is an expression or an anonymous class, give it a pass for now
        if (!$stmt->class instanceof Expr && !$stmt->class instanceof Class_) {
            $this->ensureClassExists($this->getFullyQualifiedName($stmt->class), $stmt);
        }
    }

    /**
     * Validate a class constant fetch expression's class.
     *
     * @param ClassConstFetch $stmt
     */
    protected function validateClassConstFetchExpression(ClassConstFetch $stmt)
    {
        // there is no need to check exists for ::class const
        if (\strtolower($stmt->name) === 'class') {
            return;
        }

        // if class name is an expression, give it a pass for now
        if (!$stmt->class instanceof Expr) {
            $this->ensureClassOrInterfaceExists($this->getFullyQualifiedName($stmt->class), $stmt);
        }
    }

    /**
     * Validate a class constant fetch expression's class.
     *
     * @param StaticCall $stmt
     */
    protected function validateStaticCallExpression(StaticCall $stmt)
    {
        // if class name is an expression, give it a pass for now
        if (!$stmt->class instanceof Expr) {
            $this->ensureMethodExists($this->getFullyQualifiedName($stmt->class), $stmt->name, $stmt);
        }
    }

    /**
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Ensure that no class, interface or trait name collides with a new definition.
     *
     * @throws FatalErrorException
     *
     * @param Stmt   $stmt
     * @param string $scopeType
     */
<<<<<<< HEAD
    protected function ensureCanDefine(Stmt $stmt, string $scopeType = self::CLASS_TYPE)
    {
        // Anonymous classes don't have a name, and uniqueness shouldn't be enforced.
        if ($stmt->name === null) {
            return;
        }

=======
    protected function ensureCanDefine(Stmt $stmt, $scopeType = self::CLASS_TYPE)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $name = $this->getFullyQualifiedName($stmt->name);

        // check for name collisions
        $errorType = null;
        if ($this->classExists($name)) {
            $errorType = self::CLASS_TYPE;
        } elseif ($this->interfaceExists($name)) {
            $errorType = self::INTERFACE_TYPE;
        } elseif ($this->traitExists($name)) {
            $errorType = self::TRAIT_TYPE;
        }

        if ($errorType !== null) {
            throw $this->createError(\sprintf('%s named %s already exists', \ucfirst($errorType), $name), $stmt);
        }

        // Store creation for the rest of this code snippet so we can find local
        // issue too
        $this->currentScope[\strtolower($name)] = $scopeType;
    }

    /**
     * Ensure that a referenced class exists.
     *
     * @throws FatalErrorException
     *
     * @param string $name
     * @param Stmt   $stmt
     */
<<<<<<< HEAD
    protected function ensureClassExists(string $name, Stmt $stmt)
=======
    protected function ensureClassExists($name, $stmt)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!$this->classExists($name)) {
            throw $this->createError(\sprintf('Class \'%s\' not found', $name), $stmt);
        }
    }

    /**
     * Ensure that a referenced class _or interface_ exists.
     *
     * @throws FatalErrorException
     *
     * @param string $name
     * @param Stmt   $stmt
     */
<<<<<<< HEAD
    protected function ensureClassOrInterfaceExists(string $name, Stmt $stmt)
=======
    protected function ensureClassOrInterfaceExists($name, $stmt)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!$this->classExists($name) && !$this->interfaceExists($name)) {
            throw $this->createError(\sprintf('Class \'%s\' not found', $name), $stmt);
        }
    }

    /**
     * Ensure that a referenced class _or trait_ exists.
     *
     * @throws FatalErrorException
     *
     * @param string $name
     * @param Stmt   $stmt
     */
<<<<<<< HEAD
    protected function ensureClassOrTraitExists(string $name, Stmt $stmt)
=======
    protected function ensureClassOrTraitExists($name, $stmt)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!$this->classExists($name) && !$this->traitExists($name)) {
            throw $this->createError(\sprintf('Class \'%s\' not found', $name), $stmt);
        }
    }

    /**
     * Ensure that a statically called method exists.
     *
     * @throws FatalErrorException
     *
     * @param string $class
     * @param string $name
     * @param Stmt   $stmt
     */
<<<<<<< HEAD
    protected function ensureMethodExists(string $class, string $name, Stmt $stmt)
=======
    protected function ensureMethodExists($class, $name, $stmt)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->ensureClassOrTraitExists($class, $stmt);

        // let's pretend all calls to self, parent and static are valid
        if (\in_array(\strtolower($class), ['self', 'parent', 'static'])) {
            return;
        }

        // ... and all calls to classes defined right now
        if ($this->findInScope($class) === self::CLASS_TYPE) {
            return;
        }

        // if method name is an expression, give it a pass for now
        if ($name instanceof Expr) {
            return;
        }

        if (!\method_exists($class, $name) && !\method_exists($class, '__callStatic')) {
            throw $this->createError(\sprintf('Call to undefined method %s::%s()', $class, $name), $stmt);
        }
    }

    /**
     * Ensure that a referenced interface exists.
     *
     * @throws FatalErrorException
     *
     * @param Interface_[] $interfaces
     * @param Stmt         $stmt
     */
<<<<<<< HEAD
    protected function ensureInterfacesExist(array $interfaces, Stmt $stmt)
=======
    protected function ensureInterfacesExist($interfaces, $stmt)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        foreach ($interfaces as $interface) {
            /** @var string $name */
            $name = $this->getFullyQualifiedName($interface);
            if (!$this->interfaceExists($name)) {
                throw $this->createError(\sprintf('Interface \'%s\' not found', $name), $stmt);
            }
        }
    }

    /**
<<<<<<< HEAD
=======
     * Get a symbol type key for storing in the scope name cache.
     *
     * @deprecated No longer used. Scope type should be passed into ensureCanDefine directly.
     * @codeCoverageIgnore
     *
     * @param Stmt $stmt
     *
     * @return string
     */
    protected function getScopeType(Stmt $stmt)
    {
        if ($stmt instanceof Class_) {
            return self::CLASS_TYPE;
        } elseif ($stmt instanceof Interface_) {
            return self::INTERFACE_TYPE;
        } elseif ($stmt instanceof Trait_) {
            return self::TRAIT_TYPE;
        }
    }

    /**
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Check whether a class exists, or has been defined in the current code snippet.
     *
     * Gives `self`, `static` and `parent` a free pass.
     *
     * @param string $name
<<<<<<< HEAD
     */
    protected function classExists(string $name): bool
=======
     *
     * @return bool
     */
    protected function classExists($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // Give `self`, `static` and `parent` a pass. This will actually let
        // some errors through, since we're not checking whether the keyword is
        // being used in a class scope.
        if (\in_array(\strtolower($name), ['self', 'static', 'parent'])) {
            return true;
        }

        return \class_exists($name) || $this->findInScope($name) === self::CLASS_TYPE;
    }

    /**
     * Check whether an interface exists, or has been defined in the current code snippet.
     *
     * @param string $name
<<<<<<< HEAD
     */
    protected function interfaceExists(string $name): bool
=======
     *
     * @return bool
     */
    protected function interfaceExists($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \interface_exists($name) || $this->findInScope($name) === self::INTERFACE_TYPE;
    }

    /**
     * Check whether a trait exists, or has been defined in the current code snippet.
     *
     * @param string $name
<<<<<<< HEAD
     */
    protected function traitExists(string $name): bool
=======
     *
     * @return bool
     */
    protected function traitExists($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \trait_exists($name) || $this->findInScope($name) === self::TRAIT_TYPE;
    }

    /**
     * Find a symbol in the current code snippet scope.
     *
     * @param string $name
     *
     * @return string|null
     */
<<<<<<< HEAD
    protected function findInScope(string $name)
=======
    protected function findInScope($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $name = \strtolower($name);
        if (isset($this->currentScope[$name])) {
            return $this->currentScope[$name];
        }
    }

    /**
     * Error creation factory.
     *
     * @param string $msg
     * @param Stmt   $stmt
<<<<<<< HEAD
     */
    protected function createError(string $msg, Stmt $stmt): FatalErrorException
    {
        return new FatalErrorException($msg, 0, \E_ERROR, null, $stmt->getStartLine());
=======
     *
     * @return FatalErrorException
     */
    protected function createError($msg, $stmt)
    {
        return new FatalErrorException($msg, 0, E_ERROR, null, $stmt->getLine());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
