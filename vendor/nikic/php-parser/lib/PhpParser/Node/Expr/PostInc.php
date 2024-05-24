<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;

<<<<<<< HEAD
class PostInc extends Expr {
    /** @var Expr Variable */
    public Expr $var;
=======
class PostInc extends Expr
{
    /** @var Expr Variable */
    public $var;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a post increment node.
     *
<<<<<<< HEAD
     * @param Expr $var Variable
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Expr  $var        Variable
     * @param array $attributes Additional attributes
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Expr $var, array $attributes = []) {
        $this->attributes = $attributes;
        $this->var = $var;
    }

<<<<<<< HEAD
    public function getSubNodeNames(): array {
        return ['var'];
    }

    public function getType(): string {
=======
    public function getSubNodeNames() : array {
        return ['var'];
    }
    
    public function getType() : string {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return 'Expr_PostInc';
    }
}
