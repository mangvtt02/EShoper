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

use Carbon\CarbonInterface;
use InvalidArgumentException as BaseInvalidArgumentException;
use Throwable;
=======
namespace Carbon\Exceptions;

use Carbon\CarbonInterface;
use Exception;
use InvalidArgumentException as BaseInvalidArgumentException;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

class NotACarbonClassException extends BaseInvalidArgumentException implements InvalidArgumentException
{
    /**
<<<<<<< HEAD
     * The className.
     *
     * @var string
     */
    protected $className;

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Constructor.
     *
     * @param string         $className
     * @param int            $code
<<<<<<< HEAD
     * @param Throwable|null $previous
     */
    public function __construct($className, $code = 0, Throwable $previous = null)
    {
        $this->className = $className;

        parent::__construct(sprintf('Given class does not implement %s: %s', CarbonInterface::class, $className), $code, $previous);
    }

    /**
     * Get the className.
     *
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
=======
     * @param Exception|null $previous
     */
    public function __construct($className, $code = 0, Exception $previous = null)
    {
        parent::__construct(sprintf(
            'Given class does not implement %s: %s',
            CarbonInterface::class,
            $className
        ), $code, $previous);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
