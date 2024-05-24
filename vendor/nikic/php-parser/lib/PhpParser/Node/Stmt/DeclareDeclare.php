<?php declare(strict_types=1);

<<<<<<< HEAD
require __DIR__ . '/../DeclareItem.php';
=======
namespace PhpParser\Node\Stmt;

use PhpParser\Node;

class DeclareDeclare extends Node\Stmt
{
    /** @var Node\Identifier Key */
    public $key;
    /** @var Node\Expr Value */
    public $value;

    /**
     * Constructs a declare key=>value pair node.
     *
     * @param string|Node\Identifier $key        Key
     * @param Node\Expr              $value      Value
     * @param array                  $attributes Additional attributes
     */
    public function __construct($key, Node\Expr $value, array $attributes = []) {
        $this->attributes = $attributes;
        $this->key = \is_string($key) ? new Node\Identifier($key) : $key;
        $this->value = $value;
    }

    public function getSubNodeNames() : array {
        return ['key', 'value'];
    }
    
    public function getType() : string {
        return 'Stmt_DeclareDeclare';
    }
}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
