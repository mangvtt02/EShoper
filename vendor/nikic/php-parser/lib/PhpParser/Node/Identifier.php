<?php declare(strict_types=1);

namespace PhpParser\Node;

use PhpParser\NodeAbstract;

/**
 * Represents a non-namespaced name. Namespaced names are represented using Name nodes.
 */
<<<<<<< HEAD
class Identifier extends NodeAbstract {
    /** @var string Identifier as string */
    public string $name;

    /** @var array<string, bool> */
    private static array $specialClassNames = [
=======
class Identifier extends NodeAbstract
{
    /** @var string Identifier as string */
    public $name;

    private static $specialClassNames = [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        'self'   => true,
        'parent' => true,
        'static' => true,
    ];

    /**
     * Constructs an identifier node.
     *
<<<<<<< HEAD
     * @param string $name Identifier as string
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param string $name       Identifier as string
     * @param array  $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(string $name, array $attributes = []) {
        $this->attributes = $attributes;
        $this->name = $name;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
=======
    public function getSubNodeNames() : array {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return ['name'];
    }

    /**
     * Get identifier as string.
     *
     * @return string Identifier as string.
     */
<<<<<<< HEAD
    public function toString(): string {
=======
    public function toString() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->name;
    }

    /**
     * Get lowercased identifier as string.
     *
     * @return string Lowercased identifier as string
     */
<<<<<<< HEAD
    public function toLowerString(): string {
=======
    public function toLowerString() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return strtolower($this->name);
    }

    /**
     * Checks whether the identifier is a special class name (self, parent or static).
     *
     * @return bool Whether identifier is a special class name
     */
<<<<<<< HEAD
    public function isSpecialClassName(): bool {
=======
    public function isSpecialClassName() : bool {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return isset(self::$specialClassNames[strtolower($this->name)]);
    }

    /**
     * Get identifier as string.
     *
     * @return string Identifier as string
     */
<<<<<<< HEAD
    public function __toString(): string {
        return $this->name;
    }

    public function getType(): string {
=======
    public function __toString() : string {
        return $this->name;
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Identifier';
    }
}
