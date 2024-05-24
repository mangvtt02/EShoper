<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules;

class Ruleset
{
    /** @var Transformations */
    private $regular;

    /** @var Patterns */
    private $uninflected;

    /** @var Substitutions */
    private $irregular;

    public function __construct(Transformations $regular, Patterns $uninflected, Substitutions $irregular)
    {
        $this->regular     = $regular;
        $this->uninflected = $uninflected;
        $this->irregular   = $irregular;
    }

<<<<<<< HEAD
    public function getRegular(): Transformations
=======
    public function getRegular() : Transformations
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->regular;
    }

<<<<<<< HEAD
    public function getUninflected(): Patterns
=======
    public function getUninflected() : Patterns
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->uninflected;
    }

<<<<<<< HEAD
    public function getIrregular(): Substitutions
=======
    public function getIrregular() : Substitutions
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->irregular;
    }
}
