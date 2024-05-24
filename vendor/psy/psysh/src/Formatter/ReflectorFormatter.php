<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Formatter;

/**
 * Reflector formatter interface.
 */
interface ReflectorFormatter
{
    /**
     * @param \Reflector $reflector
<<<<<<< HEAD
     */
    public static function format(\Reflector $reflector): string;
=======
     *
     * @return string
     */
    public static function format(\Reflector $reflector);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
