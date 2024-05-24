<?php declare(strict_types=1);

namespace PhpParser\Builder;

use PhpParser;
use PhpParser\BuilderHelpers;
use PhpParser\Node;
use PhpParser\Node\Stmt;

<<<<<<< HEAD
class Namespace_ extends Declaration {
    private ?Node\Name $name;
    /** @var Stmt[] */
    private array $stmts = [];
=======
class Namespace_ extends Declaration
{
    private $name;
    private $stmts = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Creates a namespace builder.
     *
     * @param Node\Name|string|null $name Name of the namespace
     */
    public function __construct($name) {
        $this->name = null !== $name ? BuilderHelpers::normalizeName($name) : null;
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
     * Returns the built node.
     *
<<<<<<< HEAD
     * @return Stmt\Namespace_ The built node
     */
    public function getNode(): Node {
=======
     * @return Node The built node
     */
    public function getNode() : Node {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new Stmt\Namespace_($this->name, $this->stmts, $this->attributes);
    }
}
