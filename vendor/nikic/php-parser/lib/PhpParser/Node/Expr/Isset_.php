<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;

<<<<<<< HEAD
class Isset_ extends Expr {
    /** @var Expr[] Variables */
    public array $vars;
=======
class Isset_ extends Expr
{
    /** @var Expr[] Variables */
    public $vars;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs an array node.
     *
<<<<<<< HEAD
     * @param Expr[] $vars Variables
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param Expr[] $vars       Variables
     * @param array  $attributes Additional attributes
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
        return 'Expr_Isset';
    }
}
