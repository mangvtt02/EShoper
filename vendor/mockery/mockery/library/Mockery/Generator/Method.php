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

namespace Mockery\Generator;

use Mockery\Reflector;
<<<<<<< HEAD
use ReflectionMethod;
use ReflectionParameter;

use function array_map;

class Method
{
    /**
     * @var ReflectionMethod
     */
    private $method;

    public function __construct(ReflectionMethod $method)
=======

class Method
{
    /** @var \ReflectionMethod */
    private $method;

    public function __construct(\ReflectionMethod $method)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->method = $method;
    }

    public function __call($method, $args)
    {
<<<<<<< HEAD
        return $this->method->{$method}(...$args);
=======
        return call_user_func_array(array($this->method, $method), $args);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return Parameter[]
     */
    public function getParameters()
    {
<<<<<<< HEAD
        return array_map(static function (ReflectionParameter $parameter) {
=======
        return array_map(function (\ReflectionParameter $parameter) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return new Parameter($parameter);
        }, $this->method->getParameters());
    }

    /**
<<<<<<< HEAD
     * @return null|string
=======
     * @return string|null
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function getReturnType()
    {
        return Reflector::getReturnType($this->method);
    }
}
