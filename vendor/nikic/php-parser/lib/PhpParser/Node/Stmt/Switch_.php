<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node;

<<<<<<< HEAD
class Switch_ extends Node\Stmt {
    /** @var Node\Expr Condition */
    public Node\Expr $cond;
    /** @var Case_[] Case list */
    public array $cases;
=======
class Switch_ extends Node\Stmt
{
    /** @var Node\Expr Condition */
    public $cond;
    /** @var Case_[] Case list */
    public $cases;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a case node.
     *
<<<<<<< HEAD
     * @param Node\Expr $cond Condition
     * @param Case_[] $cases Case list
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Node\Expr $cond       Condition
     * @param Case_[]   $cases      Case list
     * @param array     $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Node\Expr $cond, array $cases, array $attributes = []) {
        $this->attributes = $attributes;
        $this->cond = $cond;
        $this->cases = $cases;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['cond', 'cases'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['cond', 'cases'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_Switch';
    }
}
