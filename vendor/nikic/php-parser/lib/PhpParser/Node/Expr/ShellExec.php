<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
<<<<<<< HEAD
use PhpParser\Node\InterpolatedStringPart;

class ShellExec extends Expr {
    /** @var (Expr|InterpolatedStringPart)[] Interpolated string array */
    public array $parts;
=======

class ShellExec extends Expr
{
    /** @var array Encapsed string array */
    public $parts;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a shell exec (backtick) node.
     *
<<<<<<< HEAD
     * @param (Expr|InterpolatedStringPart)[] $parts Interpolated string array
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param array $parts      Encapsed string array
     * @param array $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(array $parts, array $attributes = []) {
        $this->attributes = $attributes;
        $this->parts = $parts;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['parts'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['parts'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_ShellExec';
    }
}
