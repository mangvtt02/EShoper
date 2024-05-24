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

namespace Mockery\CountValidator;

<<<<<<< HEAD
use Mockery\Expectation;

abstract class CountValidatorAbstract implements CountValidatorInterface
=======
abstract class CountValidatorAbstract
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
{
    /**
     * Expectation for which this validator is assigned
     *
<<<<<<< HEAD
     * @var Expectation
=======
     * @var \Mockery\Expectation
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $_expectation = null;

    /**
     * Call count limit
     *
     * @var int
     */
    protected $_limit = null;

    /**
     * Set Expectation object and upper call limit
     *
<<<<<<< HEAD
     * @param int $limit
     */
    public function __construct(Expectation $expectation, $limit)
=======
     * @param \Mockery\Expectation $expectation
     * @param int $limit
     */
    public function __construct(\Mockery\Expectation $expectation, $limit)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->_expectation = $expectation;
        $this->_limit = $limit;
    }

    /**
     * Checks if the validator can accept an additional nth call
     *
     * @param int $n
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    public function isEligible($n)
    {
<<<<<<< HEAD
        return $n < $this->_limit;
=======
        return ($n < $this->_limit);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Validate the call count against this validator
     *
     * @param int $n
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    abstract public function validate($n);
}
