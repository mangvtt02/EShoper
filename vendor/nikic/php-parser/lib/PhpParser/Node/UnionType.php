<?php declare(strict_types=1);

namespace PhpParser\Node;

<<<<<<< HEAD
class UnionType extends ComplexType {
    /** @var (Identifier|Name|IntersectionType)[] Types */
    public array $types;
=======
use PhpParser\NodeAbstract;

class UnionType extends NodeAbstract
{
    /** @var (Identifier|Name)[] Types */
    public $types;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a union type.
     *
<<<<<<< HEAD
     * @param (Identifier|Name|IntersectionType)[] $types Types
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param (Identifier|Name)[] $types      Types
     * @param array               $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(array $types, array $attributes = []) {
        $this->attributes = $attributes;
        $this->types = $types;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['types'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['types'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'UnionType';
    }
}
