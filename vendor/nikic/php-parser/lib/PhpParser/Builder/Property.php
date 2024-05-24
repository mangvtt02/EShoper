<?php declare(strict_types=1);

namespace PhpParser\Builder;

use PhpParser;
use PhpParser\BuilderHelpers;
<<<<<<< HEAD
use PhpParser\Modifiers;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt;
use PhpParser\Node\ComplexType;

class Property implements PhpParser\Builder {
    protected string $name;

    protected int $flags = 0;

    protected ?Node\Expr $default = null;
    /** @var array<string, mixed> */
    protected array $attributes = [];
    /** @var null|Identifier|Name|ComplexType */
    protected ?Node $type = null;
    /** @var list<Node\AttributeGroup> */
    protected array $attributeGroups = [];
=======
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Stmt;

class Property implements PhpParser\Builder
{
    protected $name;

    protected $flags = 0;
    protected $default = null;
    protected $attributes = [];

    /** @var null|Identifier|Name|NullableType */
    protected $type;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Creates a property builder.
     *
     * @param string $name Name of the property
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Makes the property public.
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function makePublic() {
<<<<<<< HEAD
        $this->flags = BuilderHelpers::addModifier($this->flags, Modifiers::PUBLIC);
=======
        $this->flags = BuilderHelpers::addModifier($this->flags, Stmt\Class_::MODIFIER_PUBLIC);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $this;
    }

    /**
     * Makes the property protected.
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function makeProtected() {
<<<<<<< HEAD
        $this->flags = BuilderHelpers::addModifier($this->flags, Modifiers::PROTECTED);
=======
        $this->flags = BuilderHelpers::addModifier($this->flags, Stmt\Class_::MODIFIER_PROTECTED);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $this;
    }

    /**
     * Makes the property private.
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function makePrivate() {
<<<<<<< HEAD
        $this->flags = BuilderHelpers::addModifier($this->flags, Modifiers::PRIVATE);
=======
        $this->flags = BuilderHelpers::addModifier($this->flags, Stmt\Class_::MODIFIER_PRIVATE);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $this;
    }

    /**
     * Makes the property static.
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function makeStatic() {
<<<<<<< HEAD
        $this->flags = BuilderHelpers::addModifier($this->flags, Modifiers::STATIC);

        return $this;
    }

    /**
     * Makes the property readonly.
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function makeReadonly() {
        $this->flags = BuilderHelpers::addModifier($this->flags, Modifiers::READONLY);
=======
        $this->flags = BuilderHelpers::addModifier($this->flags, Stmt\Class_::MODIFIER_STATIC);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $this;
    }

    /**
     * Sets default value for the property.
     *
     * @param mixed $value Default value to use
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function setDefault($value) {
        $this->default = BuilderHelpers::normalizeValue($value);

        return $this;
    }

    /**
     * Sets doc comment for the property.
     *
     * @param PhpParser\Comment\Doc|string $docComment Doc comment to set
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function setDocComment($docComment) {
        $this->attributes = [
            'comments' => [BuilderHelpers::normalizeDocComment($docComment)]
        ];

        return $this;
    }

    /**
     * Sets the property type for PHP 7.4+.
     *
<<<<<<< HEAD
     * @param string|Name|Identifier|ComplexType $type
=======
     * @param string|Name|NullableType|Identifier $type
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @return $this
     */
    public function setType($type) {
        $this->type = BuilderHelpers::normalizeType($type);

        return $this;
    }

    /**
<<<<<<< HEAD
     * Adds an attribute group.
     *
     * @param Node\Attribute|Node\AttributeGroup $attribute
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function addAttribute($attribute) {
        $this->attributeGroups[] = BuilderHelpers::normalizeAttribute($attribute);

        return $this;
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Returns the built class node.
     *
     * @return Stmt\Property The built property node
     */
<<<<<<< HEAD
    public function getNode(): PhpParser\Node {
        return new Stmt\Property(
            $this->flags !== 0 ? $this->flags : Modifiers::PUBLIC,
            [
                new Node\PropertyItem($this->name, $this->default)
            ],
            $this->attributes,
            $this->type,
            $this->attributeGroups
=======
    public function getNode() : PhpParser\Node {
        return new Stmt\Property(
            $this->flags !== 0 ? $this->flags : Stmt\Class_::MODIFIER_PUBLIC,
            [
                new Stmt\PropertyProperty($this->name, $this->default)
            ],
            $this->attributes,
            $this->type
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );
    }
}
