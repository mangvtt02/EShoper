<?php
<<<<<<< HEAD

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
=======
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
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */

namespace Mockery\Generator\StringManipulation\Pass;

use Mockery\Generator\MockConfiguration;

<<<<<<< HEAD
use function str_replace;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
class CallTypeHintPass implements Pass
{
    public function apply($code, MockConfiguration $config)
    {
        if ($config->requiresCallTypeHintRemoval()) {
            $code = str_replace(
                'public function __call($method, array $args)',
                'public function __call($method, $args)',
                $code
            );
        }

        if ($config->requiresCallStaticTypeHintRemoval()) {
<<<<<<< HEAD
            return str_replace(
=======
            $code = str_replace(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                'public static function __callStatic($method, array $args)',
                'public static function __callStatic($method, $args)',
                $code
            );
        }

        return $code;
    }
}
