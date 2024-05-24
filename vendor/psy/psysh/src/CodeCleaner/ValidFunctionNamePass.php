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
<<<<<<< HEAD
=======
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\Variable;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PhpParser\Node\Stmt\Do_;
use PhpParser\Node\Stmt\Function_;
use PhpParser\Node\Stmt\If_;
use PhpParser\Node\Stmt\Switch_;
use PhpParser\Node\Stmt\While_;
use Psy\Exception\FatalErrorException;

/**
 * Validate that function calls will succeed.
 *
 * This pass throws a FatalErrorException rather than letting PHP run
 * headfirst into a real fatal error and die.
 */
class ValidFunctionNamePass extends NamespaceAwarePass
{
    private $conditionalScopes = 0;

    /**
     * Store newly defined function names on the way in, to allow recursion.
     *
<<<<<<< HEAD
     * @throws FatalErrorException if a function is redefined in a non-conditional scope
     *
     * @param Node $node
     *
     * @return int|Node|null Replacement node (or special return value)
=======
     * @param Node $node
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function enterNode(Node $node)
    {
        parent::enterNode($node);

        if (self::isConditional($node)) {
            $this->conditionalScopes++;
        } elseif ($node instanceof Function_) {
            $name = $this->getFullyQualifiedName($node->name);

            // @todo add an "else" here which adds a runtime check for instances where we can't tell
            // whether a function is being redefined by static analysis alone.
            if ($this->conditionalScopes === 0) {
                if (\function_exists($name) ||
                    isset($this->currentScope[\strtolower($name)])) {
                    $msg = \sprintf('Cannot redeclare %s()', $name);
<<<<<<< HEAD
                    throw new FatalErrorException($msg, 0, \E_ERROR, null, $node->getStartLine());
=======
                    throw new FatalErrorException($msg, 0, E_ERROR, null, $node->getLine());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }
            }

            $this->currentScope[\strtolower($name)] = true;
        }
    }

    /**
<<<<<<< HEAD
     * @param Node $node
     *
     * @return int|Node|Node[]|null Replacement node (or special return value)
=======
     * Validate that function calls will succeed.
     *
     * @throws FatalErrorException if a function is redefined
     * @throws FatalErrorException if the function name is a string (not an expression) and is not defined
     *
     * @param Node $node
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function leaveNode(Node $node)
    {
        if (self::isConditional($node)) {
            $this->conditionalScopes--;
<<<<<<< HEAD
=======
        } elseif ($node instanceof FuncCall) {
            // if function name is an expression or a variable, give it a pass for now.
            $name = $node->name;
            if (!$name instanceof Expr && !$name instanceof Variable) {
                $shortName = \implode('\\', $name->parts);
                $fullName  = $this->getFullyQualifiedName($name);
                $inScope   = isset($this->currentScope[\strtolower($fullName)]);
                if (!$inScope && !\function_exists($shortName) && !\function_exists($fullName)) {
                    $message = \sprintf('Call to undefined function %s()', $name);
                    throw new FatalErrorException($message, 0, E_ERROR, null, $node->getLine());
                }
            }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    private static function isConditional(Node $node)
    {
        return $node instanceof If_ ||
            $node instanceof While_ ||
            $node instanceof Do_ ||
            $node instanceof Switch_;
    }
}
