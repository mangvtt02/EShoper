<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node\Stmt;

<<<<<<< HEAD
class InlineHTML extends Stmt {
    /** @var string String */
    public string $value;
=======
class InlineHTML extends Stmt
{
    /** @var string String */
    public $value;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs an inline HTML node.
     *
<<<<<<< HEAD
     * @param string $value String
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param string $value      String
     * @param array  $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(string $value, array $attributes = []) {
        $this->attributes = $attributes;
        $this->value = $value;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['value'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['value'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Stmt_InlineHTML';
    }
}
