<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;

<<<<<<< HEAD
class Variable extends Expr {
=======
class Variable extends Expr
{
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    /** @var string|Expr Name */
    public $name;

    /**
     * Constructs a variable node.
     *
<<<<<<< HEAD
     * @param string|Expr $name Name
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param string|Expr $name       Name
     * @param array                      $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($name, array $attributes = []) {
        $this->attributes = $attributes;
        $this->name = $name;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['name'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['name'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_Variable';
    }
}
