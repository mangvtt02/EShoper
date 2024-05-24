<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

<<<<<<< HEAD
use PhpParser\Node;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PhpParser\Node\Expr;
use PhpParser\Node\Name;
use PhpParser\Node\VarLikeIdentifier;

<<<<<<< HEAD
class StaticPropertyFetch extends Expr {
    /** @var Name|Expr Class name */
    public Node $class;
    /** @var VarLikeIdentifier|Expr Property name */
    public Node $name;
=======
class StaticPropertyFetch extends Expr
{
    /** @var Name|Expr Class name */
    public $class;
    /** @var VarLikeIdentifier|Expr Property name */
    public $name;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a static property fetch node.
     *
<<<<<<< HEAD
     * @param Name|Expr $class Class name
     * @param string|VarLikeIdentifier|Expr $name Property name
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(Node $class, $name, array $attributes = []) {
=======
     * @param Name|Expr                     $class      Class name
     * @param string|VarLikeIdentifier|Expr $name       Property name
     * @param array                         $attributes Additional attributes
     */
    public function __construct($class, $name, array $attributes = []) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->attributes = $attributes;
        $this->class = $class;
        $this->name = \is_string($name) ? new VarLikeIdentifier($name) : $name;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['class', 'name'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['class', 'name'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_StaticPropertyFetch';
    }
}
