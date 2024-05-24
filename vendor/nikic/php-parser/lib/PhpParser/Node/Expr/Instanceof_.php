<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

<<<<<<< HEAD
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Name;

class Instanceof_ extends Expr {
    /** @var Expr Expression */
    public Expr $expr;
    /** @var Name|Expr Class name */
    public Node $class;
=======
use PhpParser\Node\Expr;
use PhpParser\Node\Name;

class Instanceof_ extends Expr
{
    /** @var Expr Expression */
    public $expr;
    /** @var Name|Expr Class name */
    public $class;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs an instanceof check node.
     *
<<<<<<< HEAD
     * @param Expr $expr Expression
     * @param Name|Expr $class Class name
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(Expr $expr, Node $class, array $attributes = []) {
=======
     * @param Expr      $expr       Expression
     * @param Name|Expr $class      Class name
     * @param array     $attributes Additional attributes
     */
    public function __construct(Expr $expr, $class, array $attributes = []) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->attributes = $attributes;
        $this->expr = $expr;
        $this->class = $class;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['expr', 'class'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['expr', 'class'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_Instanceof';
    }
}
