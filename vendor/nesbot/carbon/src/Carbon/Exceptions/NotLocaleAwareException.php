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

class NotLocaleAwareException extends BaseInvalidArgumentException implements InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param mixed          $object
     * @param int            $code
<<<<<<< HEAD
     * @param Throwable|null $previous
     */
    public function __construct($object, $code = 0, Throwable $previous = null)
    {
        $dump = \is_object($object) ? \get_class($object) : \gettype($object);
=======
     * @param Exception|null $previous
     */
    public function __construct($object, $code = 0, Exception $previous = null)
    {
        $dump = is_object($object) ? get_class($object) : gettype($object);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        parent::__construct("$dump does neither implements Symfony\Contracts\Translation\LocaleAwareInterface nor getLocale() method.", $code, $previous);
    }
}
