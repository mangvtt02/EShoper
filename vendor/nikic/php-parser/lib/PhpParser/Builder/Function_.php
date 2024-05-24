<?php declare(strict_types=1);

namespace PhpParser\Builder;

use PhpParser;
use PhpParser\BuilderHelpers;
use PhpParser\Node;
use PhpParser\Node\Stmt;

<<<<<<< HEAD
class Function_ extends FunctionLike {
    protected string $name;
    /** @var list<Stmt> */
    protected array $stmts = [];

    /** @var list<Node\AttributeGroup> */
    protected array $attributeGroups = [];
=======
class Function_ extends FunctionLike
{
    protected $name;
    protected $stmts = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Creates a function builder.
     *
     * @param string $name Name of the function
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Adds a statement.
     *
     * @param Node|PhpParser\Builder $stmt The statement to add
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function addStmt($stmt) {
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
     * Returns the built function node.
     *
     * @return Stmt\Function_ The built function node
     */
<<<<<<< HEAD
    public function getNode(): Node {
=======
    public function getNode() : Node {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new Stmt\Function_($this->name, [
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
