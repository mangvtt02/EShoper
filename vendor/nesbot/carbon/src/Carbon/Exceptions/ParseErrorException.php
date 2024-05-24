<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

namespace Carbon\Exceptions;

use InvalidArgumentException as BaseInvalidArgumentException;
use Throwable;
=======
namespace Carbon\Exceptions;

use Exception;
use InvalidArgumentException as BaseInvalidArgumentException;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

class ParseErrorException extends BaseInvalidArgumentException implements InvalidArgumentException
{
    /**
<<<<<<< HEAD
     * The expected.
     *
     * @var string
     */
    protected $expected;

    /**
     * The actual.
     *
     * @var string
     */
    protected $actual;

    /**
     * The help message.
     *
     * @var string
     */
    protected $help;

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Constructor.
     *
     * @param string         $expected
     * @param string         $actual
     * @param int            $code
<<<<<<< HEAD
     * @param Throwable|null $previous
     */
    public function __construct($expected, $actual, $help = '', $code = 0, Throwable $previous = null)
    {
        $this->expected = $expected;
        $this->actual = $actual;
        $this->help = $help;

=======
     * @param Exception|null $previous
     */
    public function __construct($expected, $actual, $help = '', $code = 0, Exception $previous = null)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $actual = $actual === '' ? 'data is missing' : "get '$actual'";

        parent::__construct(trim("Format expected $expected but $actual\n$help"), $code, $previous);
    }
<<<<<<< HEAD

    /**
     * Get the expected.
     *
     * @return string
     */
    public function getExpected(): string
    {
        return $this->expected;
    }

    /**
     * Get the actual.
     *
     * @return string
     */
    public function getActual(): string
    {
        return $this->actual;
    }

    /**
     * Get the help message.
     *
     * @return string
     */
    public function getHelp(): string
    {
        return $this->help;
    }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
