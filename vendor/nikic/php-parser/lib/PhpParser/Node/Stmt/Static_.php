<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

<<<<<<< HEAD
use PhpParser\Node\StaticVar;
use PhpParser\Node\Stmt;

class Static_ extends Stmt {
    /** @var StaticVar[] Variable definitions */
    public array $vars;
=======
use PhpParser\Node\Stmt;

class Static_ extends Stmt
{
    /** @var StaticVar[] Variable definitions */
    public $vars;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Constructs a static variables list node.
     *
<<<<<<< HEAD
     * @param StaticVar[] $vars Variable definitions
     * @param array<string, mixed> $attributes Additional attributes
=======
     * @param StaticVar[] $vars       Variable definitions
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
        return 'Stmt_Static';
    }
}
