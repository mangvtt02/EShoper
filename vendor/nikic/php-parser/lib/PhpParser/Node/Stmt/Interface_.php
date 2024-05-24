<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node;

<<<<<<< HEAD
class Interface_ extends ClassLike {
    /** @var Node\Name[] Extended interfaces */
    public array $extends;
=======
class Interface_ extends ClassLike
{
    /** @var Node\Name[] Extended interfaces */
    public $extends;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a class node.
     *
     * @param string|Node\Identifier $name Name
<<<<<<< HEAD
     * @param array{
     *     extends?: Node\Name[],
     *     stmts?: Node\Stmt[],
     *     attrGroups?: Node\AttributeGroup[],
     * } $subNodes Array of the following optional subnodes:
     *             'extends'    => array(): Name of extended interfaces
     *             'stmts'      => array(): Statements
     *             'attrGroups' => array(): PHP attribute groups
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param array  $subNodes   Array of the following optional subnodes:
     *                           'extends'    => array(): Name of extended interfaces
     *                           'stmts'      => array(): Statements
     *                           'attrGroups' => array(): PHP attribute groups
     * @param array  $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($name, array $subNodes = [], array $attributes = []) {
        $this->attributes = $attributes;
        $this->name = \is_string($name) ? new Node\Identifier($name) : $name;
        $this->extends = $subNodes['extends'] ?? [];
        $this->stmts = $subNodes['stmts'] ?? [];
        $this->attrGroups = $subNodes['attrGroups'] ?? [];
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['attrGroups', 'name', 'extends', 'stmts'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['attrGroups', 'name', 'extends', 'stmts'];
    }

    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_Interface';
    }
}
