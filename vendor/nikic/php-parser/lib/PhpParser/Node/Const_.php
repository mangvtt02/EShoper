<?php declare(strict_types=1);

namespace PhpParser\Node;

use PhpParser\NodeAbstract;

<<<<<<< HEAD
class Const_ extends NodeAbstract {
    /** @var Identifier Name */
    public Identifier $name;
    /** @var Expr Value */
    public Expr $value;

    /** @var Name|null Namespaced name (if using NameResolver) */
    public ?Name $namespacedName;
=======
/**
 * @property Name $namespacedName Namespaced name (for global constants, if using NameResolver)
 */
class Const_ extends NodeAbstract
{
    /** @var Identifier Name */
    public $name;
    /** @var Expr Value */
    public $value;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a const node for use in class const and const statements.
     *
<<<<<<< HEAD
     * @param string|Identifier $name Name
     * @param Expr $value Value
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param string|Identifier $name       Name
     * @param Expr              $value      Value
     * @param array             $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($name, Expr $value, array $attributes = []) {
        $this->attributes = $attributes;
        $this->name = \is_string($name) ? new Identifier($name) : $name;
        $this->value = $value;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['name', 'value'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['name', 'value'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Const';
    }
}
