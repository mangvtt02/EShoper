<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt;

<<<<<<< HEAD
class Label extends Stmt {
    /** @var Identifier Name */
    public Identifier $name;
=======
class Label extends Stmt
{
    /** @var Identifier Name */
    public $name;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a label node.
     *
<<<<<<< HEAD
     * @param string|Identifier $name Name
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param string|Identifier $name       Name
     * @param array             $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($name, array $attributes = []) {
        $this->attributes = $attributes;
        $this->name = \is_string($name) ? new Identifier($name) : $name;
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
        return 'Stmt_Label';
    }
}
