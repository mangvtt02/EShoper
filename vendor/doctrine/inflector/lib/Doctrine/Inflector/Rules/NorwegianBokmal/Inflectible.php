<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules\NorwegianBokmal;

use Doctrine\Inflector\Rules\Pattern;
use Doctrine\Inflector\Rules\Substitution;
use Doctrine\Inflector\Rules\Transformation;
use Doctrine\Inflector\Rules\Word;

class Inflectible
{
<<<<<<< HEAD
    /** @return Transformation[] */
    public static function getSingular(): iterable
=======
    /**
     * @return Transformation[]
     */
    public static function getSingular() : iterable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        yield new Transformation(new Pattern('/re$/i'), 'r');
        yield new Transformation(new Pattern('/er$/i'), '');
    }

<<<<<<< HEAD
    /** @return Transformation[] */
    public static function getPlural(): iterable
=======
    /**
     * @return Transformation[]
     */
    public static function getPlural() : iterable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        yield new Transformation(new Pattern('/e$/i'), 'er');
        yield new Transformation(new Pattern('/r$/i'), 're');
        yield new Transformation(new Pattern('/$/'), 'er');
    }

<<<<<<< HEAD
    /** @return Substitution[] */
    public static function getIrregular(): iterable
=======
    /**
     * @return Substitution[]
     */
    public static function getIrregular() : iterable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        yield new Substitution(new Word('konto'), new Word('konti'));
    }
}
