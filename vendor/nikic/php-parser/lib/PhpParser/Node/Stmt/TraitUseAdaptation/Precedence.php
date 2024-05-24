<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt\TraitUseAdaptation;

use PhpParser\Node;

<<<<<<< HEAD
class Precedence extends Node\Stmt\TraitUseAdaptation {
    /** @var Node\Name[] Overwritten traits */
    public array $insteadof;
=======
class Precedence extends Node\Stmt\TraitUseAdaptation
{
    /** @var Node\Name[] Overwritten traits */
    public $insteadof;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a trait use precedence adaptation node.
     *
<<<<<<< HEAD
     * @param Node\Name $trait Trait name
     * @param string|Node\Identifier $method Method name
     * @param Node\Name[] $insteadof Overwritten traits
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Node\Name              $trait       Trait name
     * @param string|Node\Identifier $method      Method name
     * @param Node\Name[]            $insteadof   Overwritten traits
     * @param array                  $attributes  Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Node\Name $trait, $method, array $insteadof, array $attributes = []) {
        $this->attributes = $attributes;
        $this->trait = $trait;
        $this->method = \is_string($method) ? new Node\Identifier($method) : $method;
        $this->insteadof = $insteadof;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['trait', 'method', 'insteadof'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['trait', 'method', 'insteadof'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_TraitUseAdaptation_Precedence';
    }
}
