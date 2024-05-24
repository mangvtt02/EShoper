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

namespace Mockery\Matcher;

<<<<<<< HEAD
/**
 * @deprecated Implement \Mockery\Matcher\MatcherInterface instead of extending this class
 * @see https://github.com/mockery/mockery/pull/1338
 */
abstract class MatcherAbstract implements MatcherInterface
=======
abstract class MatcherAbstract
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
{
    /**
     * The expected value (or part thereof)
     *
<<<<<<< HEAD
     * @template TExpected
     *
     * @var TExpected
=======
     * @var mixed
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $_expected = null;

    /**
     * Set the expected value
     *
<<<<<<< HEAD
     * @template TExpected
     *
     * @param TExpected $expected
=======
     * @param mixed $expected
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($expected = null)
    {
        $this->_expected = $expected;
    }
<<<<<<< HEAD
=======

    /**
     * Check if the actual value matches the expected.
     * Actual passed by reference to preserve reference trail (where applicable)
     * back to the original method parameter.
     *
     * @param mixed $actual
     * @return bool
     */
    abstract public function match(&$actual);

    /**
     * Return a string representation of this Matcher
     *
     * @return string
     */
    abstract public function __toString();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
