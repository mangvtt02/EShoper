<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node;
<<<<<<< HEAD
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\VariadicPlaceholder;

class New_ extends CallLike {
    /** @var Node\Name|Expr|Node\Stmt\Class_ Class name */
    public Node $class;
    /** @var array<Arg|VariadicPlaceholder> Arguments */
    public array $args;
=======
use PhpParser\Node\Expr;

class New_ extends Expr
{
    /** @var Node\Name|Expr|Node\Stmt\Class_ Class name */
    public $class;
    /** @var Node\Arg[] Arguments */
    public $args;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a function call node.
     *
<<<<<<< HEAD
     * @param Node\Name|Expr|Node\Stmt\Class_ $class Class name (or class node for anonymous classes)
     * @param array<Arg|VariadicPlaceholder> $args Arguments
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(Node $class, array $args = [], array $attributes = []) {
=======
     * @param Node\Name|Expr|Node\Stmt\Class_ $class      Class name (or class node for anonymous classes)
     * @param Node\Arg[]                      $args       Arguments
     * @param array                           $attributes Additional attributes
     */
    public function __construct($class, array $args = [], array $attributes = []) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->attributes = $attributes;
        $this->class = $class;
        $this->args = $args;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['class', 'args'];
    }

    public function getType(): string {
        return 'Expr_New';
    }

    public function getRawArgs(): array {
        return $this->args;
    }
=======
    public function getSubNodeNames() : array {
        return ['class', 'args'];
    }
    
    public function getType() : string {
        return 'Expr_New';
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
