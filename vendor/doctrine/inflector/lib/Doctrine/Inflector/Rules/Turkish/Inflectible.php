<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules\Turkish;

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
        yield new Transformation(new Pattern('/l[ae]r$/i'), '');
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
        yield new Transformation(new Pattern('/([eöiü][^aoıueöiü]{0,6})$/u'), '\1ler');
        yield new Transformation(new Pattern('/([aoıu][^aoıueöiü]{0,6})$/u'), '\1lar');
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
        yield new Substitution(new Word('ben'), new Word('biz'));
        yield new Substitution(new Word('sen'), new Word('siz'));
        yield new Substitution(new Word('o'), new Word('onlar'));
    }
}
