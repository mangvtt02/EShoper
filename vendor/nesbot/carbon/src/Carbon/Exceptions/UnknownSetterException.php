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

class UnknownSetterException extends BaseInvalidArgumentException implements BadMethodCallException
{
    /**
<<<<<<< HEAD
     * The setter.
     *
     * @var string
     */
    protected $setter;

    /**
     * Constructor.
     *
     * @param string         $setter   setter name
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($setter, $code = 0, Throwable $previous = null)
    {
        $this->setter = $setter;

        parent::__construct("Unknown setter '$setter'", $code, $previous);
    }

    /**
     * Get the setter.
     *
     * @return string
     */
    public function getSetter(): string
    {
        return $this->setter;
=======
     * Constructor.
     *
     * @param string         $name     setter name
     * @param int            $code
     * @param Exception|null $previous
     */
    public function __construct($name, $code = 0, Exception $previous = null)
    {
        parent::__construct("Unknown setter '$name'", $code, $previous);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
