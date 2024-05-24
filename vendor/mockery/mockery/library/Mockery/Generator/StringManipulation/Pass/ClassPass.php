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

<<<<<<< HEAD
use Mockery;
use Mockery\Generator\MockConfiguration;

use function class_exists;
use function ltrim;
use function str_replace;

=======
use Mockery\Generator\MockConfiguration;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
class ClassPass implements Pass
{
    public function apply($code, MockConfiguration $config)
    {
        $target = $config->getTargetClass();

<<<<<<< HEAD
        if (! $target) {
=======
        if (!$target) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $code;
        }

        if ($target->isFinal()) {
            return $code;
        }

<<<<<<< HEAD
        $className = ltrim($target->getName(), '\\');

        if (! class_exists($className)) {
            Mockery::declareClass($className);
        }

        return str_replace(
            'implements MockInterface',
            'extends \\' . $className . ' implements MockInterface',
            $code
        );
=======
        $className = ltrim($target->getName(), "\\");

        if (!class_exists($className)) {
            \Mockery::declareClass($className);
        }

        $code = str_replace(
            "implements MockInterface",
            "extends \\" . $className . " implements MockInterface",
            $code
        );

        return $code;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
