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

class UnknownGetterException extends BaseInvalidArgumentException implements InvalidArgumentException
{
    /**
<<<<<<< HEAD
     * The getter.
     *
     * @var string
     */
    protected $getter;

    /**
     * Constructor.
     *
     * @param string         $getter   getter name
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($getter, $code = 0, Throwable $previous = null)
    {
        $this->getter = $getter;

        parent::__construct("Unknown getter '$getter'", $code, $previous);
    }

    /**
     * Get the getter.
     *
     * @return string
     */
    public function getGetter(): string
    {
        return $this->getter;
=======
     * Constructor.
     *
     * @param string         $name     getter name
     * @param int            $code
     * @param Exception|null $previous
     */
    public function __construct($name, $code = 0, Exception $previous = null)
    {
        parent::__construct("Unknown getter '$name'", $code, $previous);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
