<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

<<<<<<< HEAD
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Identifier;

class PropertyFetch extends Expr {
    /** @var Expr Variable holding object */
    public Expr $var;
    /** @var Identifier|Expr Property name */
    public Node $name;
=======
use PhpParser\Node\Expr;
use PhpParser\Node\Identifier;

class PropertyFetch extends Expr
{
    /** @var Expr Variable holding object */
    public $var;
    /** @var Identifier|Expr Property name */
    public $name;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a function call node.
     *
<<<<<<< HEAD
     * @param Expr $var Variable holding object
     * @param string|Identifier|Expr $name Property name
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Expr                   $var        Variable holding object
     * @param string|Identifier|Expr $name       Property name
     * @param array                  $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Expr $var, $name, array $attributes = []) {
        $this->attributes = $attributes;
        $this->var = $var;
        $this->name = \is_string($name) ? new Identifier($name) : $name;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['var', 'name'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['var', 'name'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_PropertyFetch';
    }
}
