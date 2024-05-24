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
use Closure;

/**
 * @method Expectation withArgs(array|Closure $args)
 */
class HigherOrderMessage
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var LegacyMockInterface|MockInterface
     */
    private $mock;
=======
/**
 * @method \Mockery\Expectation withArgs(\Closure|array $args)
 */
class HigherOrderMessage
{
    private $mock;
    private $method;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    public function __construct(MockInterface $mock, $method)
    {
        $this->mock = $mock;
        $this->method = $method;
    }

    /**
<<<<<<< HEAD
     * @param string $method
     * @param array $args
     *
     * @return Expectation|ExpectationInterface|HigherOrderMessage
=======
     * @return \Mockery\Expectation
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __call($method, $args)
    {
        if ($this->method === 'shouldNotHaveReceived') {
            return $this->mock->{$this->method}($method, $args);
        }

        $expectation = $this->mock->{$this->method}($method);
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $expectation->withArgs($args);
    }
}
