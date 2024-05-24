<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;

<<<<<<< HEAD
abstract class BinaryOp extends Expr {
    /** @var Expr The left hand side expression */
    public Expr $left;
    /** @var Expr The right hand side expression */
    public Expr $right;
=======
abstract class BinaryOp extends Expr
{
    /** @var Expr The left hand side expression */
    public $left;
    /** @var Expr The right hand side expression */
    public $right;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a binary operator node.
     *
<<<<<<< HEAD
     * @param Expr $left The left hand side expression
     * @param Expr $right The right hand side expression
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Expr  $left       The left hand side expression
     * @param Expr  $right      The right hand side expression
     * @param array $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Expr $left, Expr $right, array $attributes = []) {
        $this->attributes = $attributes;
        $this->left = $left;
        $this->right = $right;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
=======
    public function getSubNodeNames() : array {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return ['left', 'right'];
    }

    /**
     * Get the operator sigil for this binary operation.
     *
     * In the case there are multiple possible sigils for an operator, this method does not
     * necessarily return the one used in the parsed code.
<<<<<<< HEAD
     */
    abstract public function getOperatorSigil(): string;
=======
     *
     * @return string
     */
    abstract public function getOperatorSigil() : string;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
