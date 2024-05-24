<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node;

<<<<<<< HEAD
class Echo_ extends Node\Stmt {
    /** @var Node\Expr[] Expressions */
    public array $exprs;
=======
class Echo_ extends Node\Stmt
{
    /** @var Node\Expr[] Expressions */
    public $exprs;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs an echo node.
     *
<<<<<<< HEAD
     * @param Node\Expr[] $exprs Expressions
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Node\Expr[] $exprs      Expressions
     * @param array       $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(array $exprs, array $attributes = []) {
        $this->attributes = $attributes;
        $this->exprs = $exprs;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['exprs'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['exprs'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_Echo';
    }
}
