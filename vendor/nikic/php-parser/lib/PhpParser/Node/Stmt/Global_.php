<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node;

<<<<<<< HEAD
class Global_ extends Node\Stmt {
    /** @var Node\Expr[] Variables */
    public array $vars;
=======
class Global_ extends Node\Stmt
{
    /** @var Node\Expr[] Variables */
    public $vars;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a global variables list node.
     *
<<<<<<< HEAD
     * @param Node\Expr[] $vars Variables to unset
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Node\Expr[] $vars       Variables to unset
     * @param array       $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(array $vars, array $attributes = []) {
        $this->attributes = $attributes;
        $this->vars = $vars;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['vars'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['vars'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_Global';
    }
}
