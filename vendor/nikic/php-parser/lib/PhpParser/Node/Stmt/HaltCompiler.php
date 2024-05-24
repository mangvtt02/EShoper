<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node\Stmt;

<<<<<<< HEAD
class HaltCompiler extends Stmt {
    /** @var string Remaining text after halt compiler statement. */
    public string $remaining;
=======
class HaltCompiler extends Stmt
{
    /** @var string Remaining text after halt compiler statement. */
    public $remaining;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a __halt_compiler node.
     *
<<<<<<< HEAD
     * @param string $remaining Remaining text after halt compiler statement.
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param string $remaining  Remaining text after halt compiler statement.
     * @param array  $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(string $remaining, array $attributes = []) {
        $this->attributes = $attributes;
        $this->remaining = $remaining;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['remaining'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['remaining'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_HaltCompiler';
    }
}
