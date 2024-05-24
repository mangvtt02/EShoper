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

namespace Psy\Util;

/**
 * A static class to wrap JSON encoding/decoding with PsySH's default options.
 */
class Json
{
    /**
     * Encode a value as JSON.
     *
     * @param mixed $val
     * @param int   $opt
<<<<<<< HEAD
     */
    public static function encode($val, int $opt = 0): string
    {
        $opt |= \JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE;
=======
     *
     * @return string
     */
    public static function encode($val, $opt = 0)
    {
        $opt |= JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return \json_encode($val, $opt);
    }
}
