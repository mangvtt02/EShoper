<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;

<<<<<<< HEAD
class BitwiseNot extends Expr {
    /** @var Expr Expression */
    public Expr $expr;
=======
class BitwiseNot extends Expr
{
    /** @var Expr Expression */
    public $expr;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a bitwise not node.
     *
<<<<<<< HEAD
     * @param Expr $expr Expression
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Expr  $expr       Expression
     * @param array $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Expr $expr, array $attributes = []) {
        $this->attributes = $attributes;
        $this->expr = $expr;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['expr'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['expr'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_BitwiseNot';
    }
}
