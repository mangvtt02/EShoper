<?php declare(strict_types=1);

namespace PhpParser\Builder;

use PhpParser;
use PhpParser\BuilderHelpers;
<<<<<<< HEAD
use PhpParser\Node;
use PhpParser\Node\Stmt;

class Trait_ extends Declaration {
    protected string $name;
    /** @var list<Stmt\TraitUse> */
    protected array $uses = [];
    /** @var list<Stmt\ClassConst> */
    protected array $constants = [];
    /** @var list<Stmt\Property> */
    protected array $properties = [];
    /** @var list<Stmt\ClassMethod> */
    protected array $methods = [];
    /** @var list<Node\AttributeGroup> */
    protected array $attributeGroups = [];
=======
use PhpParser\Node\Stmt;

class Trait_ extends Declaration
{
    protected $name;
    protected $uses = [];
    protected $properties = [];
    protected $methods = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Creates an interface builder.
     *
     * @param string $name Name of the interface
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Adds a statement.
     *
     * @param Stmt|PhpParser\Builder $stmt The statement to add
     *
     * @return $this The builder instance (for fluid interface)
     */
    public function addStmt($stmt) {
        $stmt = BuilderHelpers::normalizeNode($stmt);

        if ($stmt instanceof Stmt\Property) {
            $this->properties[] = $stmt;
        } elseif ($stmt instanceof Stmt\ClassMethod) {
            $this->methods[] = $stmt;
        } elseif ($stmt instanceof Stmt\TraitUse) {
            $this->uses[] = $stmt;
<<<<<<< HEAD
        } elseif ($stmt instanceof Stmt\ClassConst) {
            $this->constants[] = $stmt;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } else {
            throw new \LogicException(sprintf('Unexpected node of type "%s"', $stmt->getType()));
        }

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
     * Returns the built trait node.
     *
     * @return Stmt\Trait_ The built interface node
     */
<<<<<<< HEAD
    public function getNode(): PhpParser\Node {
        return new Stmt\Trait_(
            $this->name, [
                'stmts' => array_merge($this->uses, $this->constants, $this->properties, $this->methods),
                'attrGroups' => $this->attributeGroups,
=======
    public function getNode() : PhpParser\Node {
        return new Stmt\Trait_(
            $this->name, [
                'stmts' => array_merge($this->uses, $this->properties, $this->methods)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ], $this->attributes
        );
    }
}
