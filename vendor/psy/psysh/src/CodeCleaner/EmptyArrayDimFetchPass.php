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
use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\Assign;
<<<<<<< HEAD
use PhpParser\Node\Expr\AssignRef;
use PhpParser\Node\Stmt\Foreach_;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\Exception\FatalErrorException;

/**
 * Validate empty brackets are only used for assignment.
 */
class EmptyArrayDimFetchPass extends CodeCleanerPass
{
    const EXCEPTION_MESSAGE = 'Cannot use [] for reading';

    private $theseOnesAreFine = [];

<<<<<<< HEAD
    /**
     * @return Node[]|null Array of nodes
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function beforeTraverse(array $nodes)
    {
        $this->theseOnesAreFine = [];
    }

    /**
<<<<<<< HEAD
     * @throws FatalErrorException if the user used empty array dim fetch outside of assignment
     *
     * @param Node $node
     *
     * @return int|Node|null Replacement node (or special return value)
=======
     * @throws FatalErrorException if the user used empty empty array dim fetch outside of assignment
     *
     * @param Node $node
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function enterNode(Node $node)
    {
        if ($node instanceof Assign && $node->var instanceof ArrayDimFetch) {
            $this->theseOnesAreFine[] = $node->var;
<<<<<<< HEAD
        } elseif ($node instanceof AssignRef && $node->expr instanceof ArrayDimFetch) {
            $this->theseOnesAreFine[] = $node->expr;
        } elseif ($node instanceof Foreach_ && $node->valueVar instanceof ArrayDimFetch) {
            $this->theseOnesAreFine[] = $node->valueVar;
        } elseif ($node instanceof ArrayDimFetch && $node->var instanceof ArrayDimFetch) {
            // $a[]['b'] = 'c'
            if (\in_array($node, $this->theseOnesAreFine)) {
                $this->theseOnesAreFine[] = $node->var;
            }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($node instanceof ArrayDimFetch && $node->dim === null) {
            if (!\in_array($node, $this->theseOnesAreFine)) {
<<<<<<< HEAD
                throw new FatalErrorException(self::EXCEPTION_MESSAGE, $node->getStartLine());
=======
                throw new FatalErrorException(self::EXCEPTION_MESSAGE, $node->getLine());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }
    }
}
