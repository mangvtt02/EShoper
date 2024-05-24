<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node;

<<<<<<< HEAD
class Finally_ extends Node\Stmt {
    /** @var Node\Stmt[] Statements */
    public array $stmts;
=======
class Finally_ extends Node\Stmt
{
    /** @var Node\Stmt[] Statements */
    public $stmts;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a finally node.
     *
<<<<<<< HEAD
     * @param Node\Stmt[] $stmts Statements
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Node\Stmt[] $stmts      Statements
     * @param array       $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(array $stmts = [], array $attributes = []) {
        $this->attributes = $attributes;
        $this->stmts = $stmts;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['stmts'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['stmts'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_Finally';
    }
}
