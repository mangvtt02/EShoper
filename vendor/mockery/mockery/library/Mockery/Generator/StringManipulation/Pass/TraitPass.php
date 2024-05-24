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
use function array_map;
use function implode;
use function ltrim;
use function preg_replace;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
class TraitPass implements Pass
{
    public function apply($code, MockConfiguration $config)
    {
        $traits = $config->getTargetTraits();

<<<<<<< HEAD
        if ($traits === []) {
            return $code;
        }

        $useStatements = array_map(static function ($trait) {
            return 'use \\\\' . ltrim($trait->getName(), '\\') . ';';
        }, $traits);

        return preg_replace('/^{$/m', "{\n    " . implode("\n    ", $useStatements) . "\n", $code);
=======
        if (empty($traits)) {
            return $code;
        }

        $useStatements = array_map(function ($trait) {
            return "use \\\\" . ltrim($trait->getName(), "\\") . ";";
        }, $traits);

        $code = preg_replace(
            '/^{$/m',
            "{\n    " . implode("\n    ", $useStatements) . "\n",
            $code
        );

        return $code;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
