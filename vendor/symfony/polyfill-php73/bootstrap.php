<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Polyfill\Php73 as p;

<<<<<<< HEAD
if (\PHP_VERSION_ID >= 70300) {
=======
if (PHP_VERSION_ID >= 70300) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    return;
}

if (!function_exists('is_countable')) {
<<<<<<< HEAD
    function is_countable($value) { return is_array($value) || $value instanceof Countable || $value instanceof ResourceBundle || $value instanceof SimpleXmlElement; }
=======
    function is_countable($var) { return is_array($var) || $var instanceof Countable || $var instanceof ResourceBundle || $var instanceof SimpleXmlElement; }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
if (!function_exists('hrtime')) {
    require_once __DIR__.'/Php73.php';
    p\Php73::$startAt = (int) microtime(true);
<<<<<<< HEAD
    function hrtime($as_number = false) { return p\Php73::hrtime($as_number); }
=======
    function hrtime($asNum = false) { return p\Php73::hrtime($asNum); }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
if (!function_exists('array_key_first')) {
    function array_key_first(array $array) { foreach ($array as $key => $value) { return $key; } }
}
if (!function_exists('array_key_last')) {
<<<<<<< HEAD
    function array_key_last(array $array) { return key(array_slice($array, -1, 1, true)); }
=======
    function array_key_last(array $array) { end($array); return key($array); }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
