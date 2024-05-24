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

namespace Mockery\Exception;

<<<<<<< HEAD
use Mockery\CountValidator\Exception;
use Mockery\LegacyMockInterface;

use function in_array;

class InvalidCountException extends Exception
{
    protected $actual = null;
=======
use Mockery;
use Mockery\Exception\RuntimeException;

class InvalidCountException extends Mockery\CountValidator\Exception
{
    protected $method = null;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    protected $expected = 0;

    protected $expectedComparative = '<=';

<<<<<<< HEAD
    protected $method = null;

    protected $mockObject = null;

    public function getActualCount()
    {
        return $this->actual;
    }

    public function getExpectedCount()
    {
        return $this->expected;
    }

    public function getExpectedCountComparative()
    {
        return $this->expectedComparative;
    }

    public function getMethodName()
    {
        return $this->method;
    }

    public function getMock()
    {
        return $this->mockObject;
    }

    public function getMockName()
    {
        return $this->getMock()->mockery_getName();
=======
    protected $actual = null;

    protected $mockObject = null;

    public function setMock(Mockery\LegacyMockInterface $mock)
    {
        $this->mockObject = $mock;
        return $this;
    }

    public function setMethodName($name)
    {
        $this->method = $name;
        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function setActualCount($count)
    {
        $this->actual = $count;
        return $this;
    }

    public function setExpectedCount($count)
    {
        $this->expected = $count;
        return $this;
    }

    public function setExpectedCountComparative($comp)
    {
<<<<<<< HEAD
        if (! in_array($comp, ['=', '>', '<', '>=', '<='], true)) {
            throw new RuntimeException('Illegal comparative for expected call counts set: ' . $comp);
        }

=======
        if (!in_array($comp, array('=', '>', '<', '>=', '<='))) {
            throw new RuntimeException(
                'Illegal comparative for expected call counts set: ' . $comp
            );
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->expectedComparative = $comp;
        return $this;
    }

<<<<<<< HEAD
    public function setMethodName($name)
    {
        $this->method = $name;
        return $this;
    }

    public function setMock(LegacyMockInterface $mock)
    {
        $this->mockObject = $mock;
        return $this;
=======
    public function getMock()
    {
        return $this->mockObject;
    }

    public function getMethodName()
    {
        return $this->method;
    }

    public function getActualCount()
    {
        return $this->actual;
    }

    public function getExpectedCount()
    {
        return $this->expected;
    }

    public function getMockName()
    {
        return $this->getMock()->mockery_getName();
    }

    public function getExpectedCountComparative()
    {
        return $this->expectedComparative;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
