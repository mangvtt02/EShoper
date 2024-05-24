<?php

<<<<<<< HEAD
/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

use Mockery\Matcher\AndAnyOtherArgs;
use Mockery\Matcher\AnyArgs;

if (! \function_exists('mock')) {
=======
use Mockery\Matcher\AndAnyOtherArgs;
use Mockery\Matcher\AnyArgs;

/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @copyright  Copyright (c) 2016 Dave Marshall
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */

if (!function_exists("mock")) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    function mock(...$args)
    {
        return Mockery::mock(...$args);
    }
}

<<<<<<< HEAD
if (! \function_exists('spy')) {
=======
if (!function_exists("spy")) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    function spy(...$args)
    {
        return Mockery::spy(...$args);
    }
}

<<<<<<< HEAD
if (! \function_exists('namedMock')) {
=======
if (!function_exists("namedMock")) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    function namedMock(...$args)
    {
        return Mockery::namedMock(...$args);
    }
}

<<<<<<< HEAD
if (! \function_exists('anyArgs')) {
=======
if (!function_exists("anyArgs")) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    function anyArgs()
    {
        return new AnyArgs();
    }
}

<<<<<<< HEAD
if (! \function_exists('andAnyOtherArgs')) {
=======
if (!function_exists("andAnyOtherArgs")) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    function andAnyOtherArgs()
    {
        return new AndAnyOtherArgs();
    }
}

<<<<<<< HEAD
if (! \function_exists('andAnyOthers')) {
=======
if (!function_exists("andAnyOthers")) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    function andAnyOthers()
    {
        return new AndAnyOtherArgs();
    }
}
