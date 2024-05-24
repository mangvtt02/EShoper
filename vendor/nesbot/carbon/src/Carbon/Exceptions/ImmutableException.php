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

use RuntimeException as BaseRuntimeException;
use Throwable;
=======
namespace Carbon\Exceptions;

use Exception;
use RuntimeException as BaseRuntimeException;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

class ImmutableException extends BaseRuntimeException implements RuntimeException
{
    /**
<<<<<<< HEAD
     * The value.
     *
     * @var string
     */
    protected $value;

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Constructor.
     *
     * @param string         $value    the immutable type/value
     * @param int            $code
<<<<<<< HEAD
     * @param Throwable|null $previous
     */
    public function __construct($value, $code = 0, Throwable $previous = null)
    {
        $this->value = $value;
        parent::__construct("$value is immutable.", $code, $previous);
    }

    /**
     * Get the value.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
=======
     * @param Exception|null $previous
     */
    public function __construct($value, $code = 0, Exception $previous = null)
    {
        parent::__construct("$value is immutable.", $code, $previous);
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
