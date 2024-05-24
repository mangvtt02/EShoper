<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt\TraitUseAdaptation;

use PhpParser\Node;

<<<<<<< HEAD
class Alias extends Node\Stmt\TraitUseAdaptation {
    /** @var null|int New modifier */
    public ?int $newModifier;
    /** @var null|Node\Identifier New name */
    public ?Node\Identifier $newName;
=======
class Alias extends Node\Stmt\TraitUseAdaptation
{
    /** @var null|int New modifier */
    public $newModifier;
    /** @var null|Node\Identifier New name */
    public $newName;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a trait use precedence adaptation node.
     *
<<<<<<< HEAD
     * @param null|Node\Name $trait Trait name
     * @param string|Node\Identifier $method Method name
     * @param null|int $newModifier New modifier
     * @param null|string|Node\Identifier $newName New name
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(?Node\Name $trait, $method, ?int $newModifier, $newName, array $attributes = []) {
=======
     * @param null|Node\Name              $trait       Trait name
     * @param string|Node\Identifier      $method      Method name
     * @param null|int                    $newModifier New modifier
     * @param null|string|Node\Identifier $newName     New name
     * @param array                       $attributes  Additional attributes
     */
    public function __construct($trait, $method, $newModifier, $newName, array $attributes = []) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->attributes = $attributes;
        $this->trait = $trait;
        $this->method = \is_string($method) ? new Node\Identifier($method) : $method;
        $this->newModifier = $newModifier;
        $this->newName = \is_string($newName) ? new Node\Identifier($newName) : $newName;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['trait', 'method', 'newModifier', 'newName'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['trait', 'method', 'newModifier', 'newName'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_TraitUseAdaptation_Alias';
    }
}
