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
use PhpParser\Node\Expr\Yield_;
use PhpParser\Node\FunctionLike;
use Psy\Exception\FatalErrorException;

class FunctionContextPass extends CodeCleanerPass
{
    /** @var int */
    private $functionDepth;

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
        $this->functionDepth = 0;
    }

<<<<<<< HEAD
    /**
     * @return int|Node|null Replacement node (or special return value)
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function enterNode(Node $node)
    {
        if ($node instanceof FunctionLike) {
            $this->functionDepth++;

            return;
        }

        // node is inside function context
        if ($this->functionDepth !== 0) {
            return;
        }

        // It causes fatal error.
        if ($node instanceof Yield_) {
            $msg = 'The "yield" expression can only be used inside a function';
<<<<<<< HEAD
            throw new FatalErrorException($msg, 0, \E_ERROR, null, $node->getStartLine());
=======
            throw new FatalErrorException($msg, 0, E_ERROR, null, $node->getLine());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * @param \PhpParser\Node $node
<<<<<<< HEAD
     *
     * @return int|Node|Node[]|null Replacement node (or special return value)
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function leaveNode(Node $node)
    {
        if ($node instanceof FunctionLike) {
            $this->functionDepth--;
        }
    }
}
