<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use PhpParser\Node\FunctionLike;

<<<<<<< HEAD
class Function_ extends Node\Stmt implements FunctionLike {
    /** @var bool Whether function returns by reference */
    public bool $byRef;
    /** @var Node\Identifier Name */
    public Node\Identifier $name;
    /** @var Node\Param[] Parameters */
    public array $params;
    /** @var null|Node\Identifier|Node\Name|Node\ComplexType Return type */
    public ?Node $returnType;
    /** @var Node\Stmt[] Statements */
    public array $stmts;
    /** @var Node\AttributeGroup[] PHP attribute groups */
    public array $attrGroups;

    /** @var Node\Name|null Namespaced name (if using NameResolver) */
    public ?Node\Name $namespacedName;
=======
/**
 * @property Node\Name $namespacedName Namespaced name (if using NameResolver)
 */
class Function_ extends Node\Stmt implements FunctionLike
{
    /** @var bool Whether function returns by reference */
    public $byRef;
    /** @var Node\Identifier Name */
    public $name;
    /** @var Node\Param[] Parameters */
    public $params;
    /** @var null|Node\Identifier|Node\Name|Node\NullableType|Node\UnionType Return type */
    public $returnType;
    /** @var Node\Stmt[] Statements */
    public $stmts;
    /** @var Node\AttributeGroup[] PHP attribute groups */
    public $attrGroups;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a function node.
     *
     * @param string|Node\Identifier $name Name
<<<<<<< HEAD
     * @param array{
     *     byRef?: bool,
     *     params?: Node\Param[],
     *     returnType?: null|Node\Identifier|Node\Name|Node\ComplexType,
     *     stmts?: Node\Stmt[],
     *     attrGroups?: Node\AttributeGroup[],
     * } $subNodes Array of the following optional subnodes:
     *             'byRef'      => false  : Whether to return by reference
     *             'params'     => array(): Parameters
     *             'returnType' => null   : Return type
     *             'stmts'      => array(): Statements
     *             'attrGroups' => array(): PHP attribute groups
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param array  $subNodes   Array of the following optional subnodes:
     *                           'byRef'      => false  : Whether to return by reference
     *                           'params'     => array(): Parameters
     *                           'returnType' => null   : Return type
     *                           'stmts'      => array(): Statements
     *                           'attrGroups' => array(): PHP attribute groups
     * @param array  $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($name, array $subNodes = [], array $attributes = []) {
        $this->attributes = $attributes;
        $this->byRef = $subNodes['byRef'] ?? false;
        $this->name = \is_string($name) ? new Node\Identifier($name) : $name;
        $this->params = $subNodes['params'] ?? [];
<<<<<<< HEAD
        $this->returnType = $subNodes['returnType'] ?? null;
=======
        $returnType = $subNodes['returnType'] ?? null;
        $this->returnType = \is_string($returnType) ? new Node\Identifier($returnType) : $returnType;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->stmts = $subNodes['stmts'] ?? [];
        $this->attrGroups = $subNodes['attrGroups'] ?? [];
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['attrGroups', 'byRef', 'name', 'params', 'returnType', 'stmts'];
    }

    public function returnsByRef(): bool {
        return $this->byRef;
    }

    public function getParams(): array {
=======
    public function getSubNodeNames() : array {
        return ['attrGroups', 'byRef', 'name', 'params', 'returnType', 'stmts'];
    }

    public function returnsByRef() : bool {
        return $this->byRef;
    }

    public function getParams() : array {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->params;
    }

    public function getReturnType() {
        return $this->returnType;
    }

<<<<<<< HEAD
    public function getAttrGroups(): array {
=======
    public function getAttrGroups() : array {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->attrGroups;
    }

    /** @return Node\Stmt[] */
<<<<<<< HEAD
    public function getStmts(): array {
        return $this->stmts;
    }

    public function getType(): string {
=======
    public function getStmts() : array {
        return $this->stmts;
    }

    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_Function';
    }
}
