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

namespace Mockery;

<<<<<<< HEAD
use function array_map;
use function current;
use function implode;
use function reset;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
class CompositeExpectation implements ExpectationInterface
{
    /**
     * Stores an array of all expectations for this composite
     *
<<<<<<< HEAD
     * @var array<ExpectationInterface>
     */
    protected $_expectations = [];

    /**
     * Intercept any expectation calls and direct against all expectations
     *
     * @param string $method
     *
     * @return self
     */
    public function __call($method, array $args)
    {
        foreach ($this->_expectations as $expectation) {
            $expectation->{$method}(...$args);
        }

        return $this;
    }

    /**
     * Return the string summary of this composite expectation
     *
     * @return string
     */
    public function __toString()
    {
        $parts = array_map(static function (ExpectationInterface $expectation): string {
            return (string) $expectation;
        }, $this->_expectations);

        return '[' . implode(', ', $parts) . ']';
    }
=======
     * @var array
     */
    protected $_expectations = array();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Add an expectation to the composite
     *
<<<<<<< HEAD
     * @param ExpectationInterface|HigherOrderMessage $expectation
     *
=======
     * @param \Mockery\Expectation|\Mockery\CompositeExpectation $expectation
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return void
     */
    public function add($expectation)
    {
        $this->_expectations[] = $expectation;
    }

    /**
     * @param mixed ...$args
     */
    public function andReturn(...$args)
    {
        return $this->__call(__FUNCTION__, $args);
    }

    /**
     * Set a return value, or sequential queue of return values
     *
     * @param mixed ...$args
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return self
     */
    public function andReturns(...$args)
    {
<<<<<<< HEAD
        return $this->andReturn(...$args);
    }

    /**
     * Return the parent mock of the first expectation
     *
     * @return LegacyMockInterface&MockInterface
     */
    public function getMock()
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
        return $first->getMock();
=======
        return call_user_func_array([$this, 'andReturn'], $args);
    }

    /**
     * Intercept any expectation calls and direct against all expectations
     *
     * @param string $method
     * @param array $args
     * @return self
     */
    public function __call($method, array $args)
    {
        foreach ($this->_expectations as $expectation) {
            call_user_func_array(array($expectation, $method), $args);
        }
        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Return order number of the first expectation
     *
     * @return int
     */
    public function getOrderNumber()
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
        return $first->getOrderNumber();
    }

    /**
<<<<<<< HEAD
     * Mockery API alias to getMock
     *
     * @return LegacyMockInterface&MockInterface
=======
     * Return the parent mock of the first expectation
     *
     * @return \Mockery\MockInterface|\Mockery\LegacyMockInterface
     */
    public function getMock()
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
        return $first->getMock();
    }

    /**
     * Mockery API alias to getMock
     *
     * @return \Mockery\LegacyMockInterface|\Mockery\MockInterface
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function mock()
    {
        return $this->getMock();
    }

    /**
<<<<<<< HEAD
     * Starts a new expectation addition on the first mock which is the primary target outside of a demeter chain
     *
     * @param mixed ...$args
     *
     * @return Expectation
     */
    public function shouldNotReceive(...$args)
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
        return $first->getMock()->shouldNotReceive(...$args);
    }

    /**
     * Starts a new expectation addition on the first mock which is the primary target, outside of a demeter chain
     *
     * @param mixed ...$args
     *
     * @return Expectation
=======
     * Starts a new expectation addition on the first mock which is the primary
     * target outside of a demeter chain
     *
     * @param mixed ...$args
     * @return \Mockery\Expectation
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function shouldReceive(...$args)
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
<<<<<<< HEAD
        return $first->getMock()->shouldReceive(...$args);
=======
        return call_user_func_array(array($first->getMock(), 'shouldReceive'), $args);
    }

    /**
     * Starts a new expectation addition on the first mock which is the primary
     * target outside of a demeter chain
     *
     * @param mixed ...$args
     * @return \Mockery\Expectation
     */
    public function shouldNotReceive(...$args)
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
        return call_user_func_array(array($first->getMock(), 'shouldNotReceive'), $args);
    }

    /**
     * Return the string summary of this composite expectation
     *
     * @return string
     */
    public function __toString()
    {
        $return = '[';
        $parts = array();
        foreach ($this->_expectations as $exp) {
            $parts[] = (string) $exp;
        }
        $return .= implode(', ', $parts) . ']';
        return $return;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
