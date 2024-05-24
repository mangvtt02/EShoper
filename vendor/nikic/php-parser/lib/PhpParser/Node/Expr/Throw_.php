<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node;

<<<<<<< HEAD
class Throw_ extends Node\Expr {
    /** @var Node\Expr Expression */
    public Node\Expr $expr;
=======
class Throw_ extends Node\Expr
{
    /** @var Node\Expr Expression */
    public $expr;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a throw expression node.
     *
<<<<<<< HEAD
     * @param Node\Expr $expr Expression
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Node\Expr $expr       Expression
     * @param array     $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Node\Expr $expr, array $attributes = []) {
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
        return 'Expr_Throw';
    }
}
