<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

<<<<<<< HEAD
use PhpParser\Modifiers;
use PhpParser\Node;

class ClassConst extends Node\Stmt {
    /** @var int Modifiers */
    public int $flags;
    /** @var Node\Const_[] Constant declarations */
    public array $consts;
    /** @var Node\AttributeGroup[] PHP attribute groups */
    public array $attrGroups;
    /** @var Node\Identifier|Node\Name|Node\ComplexType|null Type declaration */
    public ?Node $type;
=======
use PhpParser\Node;

class ClassConst extends Node\Stmt
{
    /** @var int Modifiers */
    public $flags;
    /** @var Node\Const_[] Constant declarations */
    public $consts;
    /** @var Node\AttributeGroup[] */
    public $attrGroups;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a class const list node.
     *
<<<<<<< HEAD
     * @param Node\Const_[] $consts Constant declarations
     * @param int $flags Modifiers
     * @param array<string, mixed> $attributes Additional attributes
     * @param list<Node\AttributeGroup> $attrGroups PHP attribute groups
     * @param null|Node\Identifier|Node\Name|Node\ComplexType $type Type declaration
=======
     * @param Node\Const_[]         $consts     Constant declarations
     * @param int                   $flags      Modifiers
     * @param array                 $attributes Additional attributes
     * @param Node\AttributeGroup[] $attrGroups PHP attribute groups
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(
        array $consts,
        int $flags = 0,
        array $attributes = [],
<<<<<<< HEAD
        array $attrGroups = [],
        ?Node $type = null
=======
        array $attrGroups = []
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    ) {
        $this->attributes = $attributes;
        $this->flags = $flags;
        $this->consts = $consts;
        $this->attrGroups = $attrGroups;
<<<<<<< HEAD
        $this->type = $type;
    }

    public function getSubNodeNames(): array {
        return ['attrGroups', 'flags', 'type', 'consts'];
=======
    }

    public function getSubNodeNames() : array {
        return ['attrGroups', 'flags', 'consts'];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Whether constant is explicitly or implicitly public.
<<<<<<< HEAD
     */
    public function isPublic(): bool {
        return ($this->flags & Modifiers::PUBLIC) !== 0
            || ($this->flags & Modifiers::VISIBILITY_MASK) === 0;
=======
     *
     * @return bool
     */
    public function isPublic() : bool {
        return ($this->flags & Class_::MODIFIER_PUBLIC) !== 0
            || ($this->flags & Class_::VISIBILITY_MODIFIER_MASK) === 0;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Whether constant is protected.
<<<<<<< HEAD
     */
    public function isProtected(): bool {
        return (bool) ($this->flags & Modifiers::PROTECTED);
=======
     *
     * @return bool
     */
    public function isProtected() : bool {
        return (bool) ($this->flags & Class_::MODIFIER_PROTECTED);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Whether constant is private.
<<<<<<< HEAD
     */
    public function isPrivate(): bool {
        return (bool) ($this->flags & Modifiers::PRIVATE);
    }

    /**
     * Whether constant is final.
     */
    public function isFinal(): bool {
        return (bool) ($this->flags & Modifiers::FINAL);
    }

    public function getType(): string {
=======
     *
     * @return bool
     */
    public function isPrivate() : bool {
        return (bool) ($this->flags & Class_::MODIFIER_PRIVATE);
    }

    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_ClassConst';
    }
}
