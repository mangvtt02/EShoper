<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules\Portuguese;

use Doctrine\Inflector\Rules\Pattern;

final class Uninflected
{
<<<<<<< HEAD
    /** @return Pattern[] */
    public static function getSingular(): iterable
=======
    /**
     * @return Pattern[]
     */
    public static function getSingular() : iterable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        yield from self::getDefault();
    }

<<<<<<< HEAD
    /** @return Pattern[] */
    public static function getPlural(): iterable
=======
    /**
     * @return Pattern[]
     */
    public static function getPlural() : iterable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        yield from self::getDefault();
    }

<<<<<<< HEAD
    /** @return Pattern[] */
    private static function getDefault(): iterable
=======
    /**
     * @return Pattern[]
     */
    private static function getDefault() : iterable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        yield new Pattern('tórax');
        yield new Pattern('tênis');
        yield new Pattern('ônibus');
        yield new Pattern('lápis');
        yield new Pattern('fênix');
    }
}
