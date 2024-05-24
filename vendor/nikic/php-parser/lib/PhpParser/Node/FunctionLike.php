<?php declare(strict_types=1);

namespace PhpParser\Node;

use PhpParser\Node;

<<<<<<< HEAD
interface FunctionLike extends Node {
    /**
     * Whether to return by reference
     */
    public function returnsByRef(): bool;
=======
interface FunctionLike extends Node
{
    /**
     * Whether to return by reference
     *
     * @return bool
     */
    public function returnsByRef() : bool;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * List of parameters
     *
     * @return Param[]
     */
<<<<<<< HEAD
    public function getParams(): array;
=======
    public function getParams() : array;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Get the declared return type or null
     *
<<<<<<< HEAD
     * @return null|Identifier|Name|ComplexType
=======
     * @return null|Identifier|Name|NullableType|UnionType
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function getReturnType();

    /**
     * The function body
     *
     * @return Stmt[]|null
     */
<<<<<<< HEAD
    public function getStmts(): ?array;
=======
    public function getStmts();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Get PHP attribute groups.
     *
     * @return AttributeGroup[]
     */
<<<<<<< HEAD
    public function getAttrGroups(): array;
=======
    public function getAttrGroups() : array;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
