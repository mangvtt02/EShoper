<?php declare(strict_types=1);

namespace PhpParser\Internal;

use PhpParser\Node;
use PhpParser\Node\Expr;

/**
 * This node is used internally by the format-preserving pretty printer to print anonymous classes.
 *
 * The normal anonymous class structure violates assumptions about the order of token offsets.
 * Namely, the constructor arguments are part of the Expr\New_ node and follow the class node, even
 * though they are actually interleaved with them. This special node type is used temporarily to
 * restore a sane token offset order.
 *
 * @internal
 */
<<<<<<< HEAD
class PrintableNewAnonClassNode extends Expr {
    /** @var Node\AttributeGroup[] PHP attribute groups */
    public array $attrGroups;
    /** @var int Modifiers */
    public int $flags;
    /** @var (Node\Arg|Node\VariadicPlaceholder)[] Arguments */
    public array $args;
    /** @var null|Node\Name Name of extended class */
    public ?Node\Name $extends;
    /** @var Node\Name[] Names of implemented interfaces */
    public array $implements;
    /** @var Node\Stmt[] Statements */
    public array $stmts;

    /**
     * @param Node\AttributeGroup[] $attrGroups PHP attribute groups
     * @param (Node\Arg|Node\VariadicPlaceholder)[] $args Arguments
     * @param Node\Name|null $extends Name of extended class
     * @param Node\Name[] $implements Names of implemented interfaces
     * @param Node\Stmt[] $stmts Statements
     * @param array<string, mixed> $attributes Attributes
     */
    public function __construct(
        array $attrGroups, int $flags, array $args, ?Node\Name $extends, array $implements,
=======
class PrintableNewAnonClassNode extends Expr
{
    /** @var Node\AttributeGroup[] PHP attribute groups */
    public $attrGroups;
    /** @var Node\Arg[] Arguments */
    public $args;
    /** @var null|Node\Name Name of extended class */
    public $extends;
    /** @var Node\Name[] Names of implemented interfaces */
    public $implements;
    /** @var Node\Stmt[] Statements */
    public $stmts;

    public function __construct(
        array $attrGroups, array $args, Node\Name $extends = null, array $implements,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        array $stmts, array $attributes
    ) {
        parent::__construct($attributes);
        $this->attrGroups = $attrGroups;
<<<<<<< HEAD
        $this->flags = $flags;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->args = $args;
        $this->extends = $extends;
        $this->implements = $implements;
        $this->stmts = $stmts;
    }

<<<<<<< HEAD
    public static function fromNewNode(Expr\New_ $newNode): self {
=======
    public static function fromNewNode(Expr\New_ $newNode) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $class = $newNode->class;
        assert($class instanceof Node\Stmt\Class_);
        // We don't assert that $class->name is null here, to allow consumers to assign unique names
        // to anonymous classes for their own purposes. We simplify ignore the name here.
        return new self(
<<<<<<< HEAD
            $class->attrGroups, $class->flags, $newNode->args, $class->extends, $class->implements,
=======
            $class->attrGroups, $newNode->args, $class->extends, $class->implements,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $class->stmts, $newNode->getAttributes()
        );
    }

<<<<<<< HEAD
    public function getType(): string {
        return 'Expr_PrintableNewAnonClass';
    }

    public function getSubNodeNames(): array {
        return ['attrGroups', 'flags', 'args', 'extends', 'implements', 'stmts'];
=======
    public function getType() : string {
        return 'Expr_PrintableNewAnonClass';
    }

    public function getSubNodeNames() : array {
        return ['attrGroups', 'args', 'extends', 'implements', 'stmts'];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
