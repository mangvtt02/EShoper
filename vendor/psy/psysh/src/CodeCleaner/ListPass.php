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
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayDimFetch;
// @todo Switch to PhpParser\Node\ArrayItem once we drop support for PHP-Parser 4.x
=======
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayDimFetch;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\List_;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
use Psy\Exception\ParseErrorException;

/**
 * Validate that the list assignment.
 */
class ListPass extends CodeCleanerPass
{
<<<<<<< HEAD
=======
    private $atLeastPhp71;

    public function __construct()
    {
        $this->atLeastPhp71 = \version_compare(PHP_VERSION, '7.1', '>=');
    }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    /**
     * Validate use of list assignment.
     *
     * @throws ParseErrorException if the user used empty with anything but a variable
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
        if (!$node instanceof Assign) {
            return;
        }

        if (!$node->var instanceof Array_ && !$node->var instanceof List_) {
            return;
        }

<<<<<<< HEAD
=======
        if (!$this->atLeastPhp71 && $node->var instanceof Array_) {
            $msg = "syntax error, unexpected '='";
            throw new ParseErrorException($msg, $node->expr->getLine());
        }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        // Polyfill for PHP-Parser 2.x
        $items = isset($node->var->items) ? $node->var->items : $node->var->vars;

        if ($items === [] || $items === [null]) {
<<<<<<< HEAD
            throw new ParseErrorException('Cannot use empty list', ['startLine' => $node->var->getStartLine(), 'endLine' => $node->var->getEndLine()]);
=======
            throw new ParseErrorException('Cannot use empty list', $node->var->getLine());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $itemFound = false;
        foreach ($items as $item) {
            if ($item === null) {
                continue;
            }

            $itemFound = true;

<<<<<<< HEAD
            if (!self::isValidArrayItem($item)) {
                $msg = 'Assignments can only happen to writable values';
                throw new ParseErrorException($msg, ['startLine' => $item->getStartLine(), 'endLine' => $item->getEndLine()]);
=======
            // List_->$vars in PHP-Parser 2.x is Variable instead of ArrayItem.
            if (!$this->atLeastPhp71 && $item instanceof ArrayItem && $item->key !== null) {
                $msg = 'Syntax error, unexpected T_CONSTANT_ENCAPSED_STRING, expecting \',\' or \')\'';
                throw new ParseErrorException($msg, $item->key->getLine());
            }

            if (!self::isValidArrayItem($item)) {
                $msg = 'Assignments can only happen to writable values';
                throw new ParseErrorException($msg, $item->getLine());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        if (!$itemFound) {
            throw new ParseErrorException('Cannot use empty list');
        }
    }

    /**
     * Validate whether a given item in an array is valid for short assignment.
     *
<<<<<<< HEAD
     * @param Node $item
     */
    private static function isValidArrayItem(Node $item): bool
=======
     * @param Expr $item
     *
     * @return bool
     */
    private static function isValidArrayItem(Expr $item)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $value = ($item instanceof ArrayItem) ? $item->value : $item;

        while ($value instanceof ArrayDimFetch || $value instanceof PropertyFetch) {
            $value = $value->var;
        }

        // We just kind of give up if it's a method call. We can't tell if it's
        // valid via static analysis.
        return $value instanceof Variable || $value instanceof MethodCall || $value instanceof FuncCall;
    }
}
