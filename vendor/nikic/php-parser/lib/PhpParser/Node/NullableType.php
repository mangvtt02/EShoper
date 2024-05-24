<?php declare(strict_types=1);

namespace PhpParser\Node;

<<<<<<< HEAD
use PhpParser\Node;

class NullableType extends ComplexType {
    /** @var Identifier|Name Type */
    public Node $type;
=======
use PhpParser\NodeAbstract;

class NullableType extends NodeAbstract
{
    /** @var Identifier|Name Type */
    public $type;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a nullable type (wrapping another type).
     *
<<<<<<< HEAD
     * @param Identifier|Name $type Type
     * @param array<string, mixed> $attributes Additional attributes
     */
    public function __construct(Node $type, array $attributes = []) {
        $this->attributes = $attributes;
        $this->type = $type;
    }

    public function getSubNodeNames(): array {
        return ['type'];
    }

    public function getType(): string {
=======
     * @param string|Identifier|Name $type       Type
     * @param array                  $attributes Additional attributes
     */
    public function __construct($type, array $attributes = []) {
        $this->attributes = $attributes;
        $this->type = \is_string($type) ? new Identifier($type) : $type;
    }

    public function getSubNodeNames() : array {
        return ['type'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'NullableType';
    }
}
