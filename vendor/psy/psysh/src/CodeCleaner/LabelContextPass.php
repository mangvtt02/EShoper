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
use PhpParser\Node\FunctionLike;
use PhpParser\Node\Stmt\Goto_;
use PhpParser\Node\Stmt\Label;
use Psy\Exception\FatalErrorException;

/**
 * CodeCleanerPass for label context.
 *
 * This class partially emulates the PHP label specification.
 * PsySH can not declare labels by sequentially executing lines with eval,
 * but since it is not a syntax error, no error is raised.
 * This class warns before invalid goto causes a fatal error.
 * Since this is a simple checker, it does not block real fatal error
 * with complex syntax.  (ex. it does not parse inside function.)
 *
 * @see http://php.net/goto
 */
class LabelContextPass extends CodeCleanerPass
{
    /** @var int */
    private $functionDepth;

    /** @var array */
    private $labelDeclarations;
    /** @var array */
    private $labelGotos;

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
        $this->labelDeclarations = [];
        $this->labelGotos = [];
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

        if ($node instanceof Goto_) {
<<<<<<< HEAD
            $this->labelGotos[\strtolower($node->name)] = $node->getStartLine();
        } elseif ($node instanceof Label) {
            $this->labelDeclarations[\strtolower($node->name)] = $node->getStartLine();
=======
            $this->labelGotos[\strtolower($node->name)] = $node->getLine();
        } elseif ($node instanceof Label) {
            $this->labelDeclarations[\strtolower($node->name)] = $node->getLine();
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

<<<<<<< HEAD
    /**
     * @return Node[]|null Array of nodes
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function afterTraverse(array $nodes)
    {
        foreach ($this->labelGotos as $name => $line) {
            if (!isset($this->labelDeclarations[$name])) {
                $msg = "'goto' to undefined label '{$name}'";
<<<<<<< HEAD
                throw new FatalErrorException($msg, 0, \E_ERROR, null, $line);
=======
                throw new FatalErrorException($msg, 0, E_ERROR, null, $line);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }
    }
}
