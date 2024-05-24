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
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Trait_;
<<<<<<< HEAD
use PhpParser\Node\VariadicPlaceholder;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\Exception\ErrorException;

/**
 * The called class pass throws warnings for get_class() and get_called_class()
 * outside a class context.
 */
class CalledClassPass extends CodeCleanerPass
{
    private $inClass;

    /**
     * @param array $nodes
<<<<<<< HEAD
     *
     * @return Node[]|null Array of nodes
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function beforeTraverse(array $nodes)
    {
        $this->inClass = false;
    }

    /**
     * @throws ErrorException if get_class or get_called_class is called without an object from outside a class
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
        if ($node instanceof Class_ || $node instanceof Trait_) {
            $this->inClass = true;
        } elseif ($node instanceof FuncCall && !$this->inClass) {
            // We'll give any args at all (besides null) a pass.
            // Technically we should be checking whether the args are objects, but this will do for now.
            //
            // @todo switch this to actually validate args when we get context-aware code cleaner passes.
            if (!empty($node->args) && !$this->isNull($node->args[0])) {
                return;
            }

            // We'll ignore name expressions as well (things like `$foo()`)
            if (!($node->name instanceof Name)) {
                return;
            }

            $name = \strtolower($node->name);
            if (\in_array($name, ['get_class', 'get_called_class'])) {
                $msg = \sprintf('%s() called without object from outside a class', $name);
<<<<<<< HEAD
                throw new ErrorException($msg, 0, \E_USER_WARNING, null, $node->getStartLine());
=======
                throw new ErrorException($msg, 0, E_USER_WARNING, null, $node->getLine());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }
    }

    /**
     * @param Node $node
<<<<<<< HEAD
     *
     * @return int|Node|Node[]|null Replacement node (or special return value)
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function leaveNode(Node $node)
    {
        if ($node instanceof Class_) {
            $this->inClass = false;
        }
    }

<<<<<<< HEAD
    private function isNull(Node $node): bool
    {
        if ($node instanceof VariadicPlaceholder) {
            return false;
        }

=======
    private function isNull(Node $node)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $node->value instanceof ConstFetch && \strtolower($node->value->name) === 'null';
    }
}
