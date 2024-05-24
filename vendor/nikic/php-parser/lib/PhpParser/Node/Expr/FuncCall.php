<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node;
use PhpParser\Node\Expr;

<<<<<<< HEAD
class FuncCall extends CallLike {
    /** @var Node\Name|Expr Function name */
    public Node $name;
    /** @var array<Node\Arg|Node\VariadicPlaceholder> Arguments */
    public array $args;
=======
class FuncCall extends Expr
{
    /** @var Node\Name|Expr Function name */
    public $name;
    /** @var Node\Arg[] Arguments */
    public $args;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a function call node.
     *
<<<<<<< HEAD
     * @param Node\Name|Expr $name Function name
     * @param array<Node\Arg|Node\VariadicPlaceholder> $args Arguments
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(Node $name, array $args = [], array $attributes = []) {
=======
     * @param Node\Name|Expr $name       Function name
     * @param Node\Arg[]     $args       Arguments
     * @param array          $attributes Additional attributes
     */
    public function __construct($name, array $args = [], array $attributes = []) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->attributes = $attributes;
        $this->name = $name;
        $this->args = $args;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['name', 'args'];
    }

    public function getType(): string {
        return 'Expr_FuncCall';
    }

    public function getRawArgs(): array {
        return $this->args;
    }
=======
    public function getSubNodeNames() : array {
        return ['name', 'args'];
    }
    
    public function getType() : string {
        return 'Expr_FuncCall';
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
