<?php declare(strict_types=1);

namespace PhpParser\Builder;

use PhpParser;
use PhpParser\BuilderHelpers;
<<<<<<< HEAD
use PhpParser\Modifiers;
use PhpParser\Node;
use PhpParser\Node\Stmt;

class Method extends FunctionLike {
    protected string $name;

    protected int $flags = 0;

    /** @var list<Stmt>|null */
    protected ?array $stmts = [];

    /** @var list<Node\AttributeGroup> */
    protected array $attributeGroups = [];
=======
use PhpParser\Node;
use PhpParser\Node\Stmt;

class Method extends FunctionLike
{
    protected $name;
    protected $flags = 0;

    /** @var array|null */
    protected $stmts = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Creates a method builder.
     *
     * @param string $name Name of the method
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Makes the method public.
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
     * Makes the method protected.
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
     * Makes the method private.
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
     * Makes the method static.
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function makeStatic() {
<<<<<<< HEAD
        $this->flags = BuilderHelpers::addModifier($this->flags, Modifiers::STATIC);
=======
        $this->flags = BuilderHelpers::addModifier($this->flags, Stmt\Class_::MODIFIER_STATIC);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $this;
    }

    /**
     * Makes the method abstract.
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function makeAbstract() {
        if (!empty($this->stmts)) {
            throw new \LogicException('Cannot make method with statements abstract');
        }

<<<<<<< HEAD
        $this->flags = BuilderHelpers::addModifier($this->flags, Modifiers::ABSTRACT);
=======
        $this->flags = BuilderHelpers::addModifier($this->flags, Stmt\Class_::MODIFIER_ABSTRACT);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->stmts = null; // abstract methods don't have statements

        return $this;
    }

    /**
     * Makes the method final.
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function makeFinal() {
<<<<<<< HEAD
        $this->flags = BuilderHelpers::addModifier($this->flags, Modifiers::FINAL);
=======
        $this->flags = BuilderHelpers::addModifier($this->flags, Stmt\Class_::MODIFIER_FINAL);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $this;
    }

    /**
     * Adds a statement.
     *
     * @param Node|PhpParser\Builder $stmt The statement to add
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function addStmt($stmt) {
        if (null === $this->stmts) {
            throw new \LogicException('Cannot add statements to an abstract method');
        }

        $this->stmts[] = BuilderHelpers::normalizeStmt($stmt);

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
     * Returns the built method node.
     *
     * @return Stmt\ClassMethod The built method node
     */
<<<<<<< HEAD
    public function getNode(): Node {
=======
    public function getNode() : Node {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new Stmt\ClassMethod($this->name, [
            'flags'      => $this->flags,
            'byRef'      => $this->returnByRef,
            'params'     => $this->params,
            'returnType' => $this->returnType,
            'stmts'      => $this->stmts,
<<<<<<< HEAD
            'attrGroups' => $this->attributeGroups,
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        ], $this->attributes);
    }
}
