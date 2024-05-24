<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\ErrorHandler;

<<<<<<< HEAD
use Symfony\Component\ErrorHandler\Exception\SilencedErrorContext;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal
 */
class ThrowableUtils
{
<<<<<<< HEAD
    /**
     * @param SilencedErrorContext|\Throwable
     */
    public static function getSeverity($throwable): int
    {
        if ($throwable instanceof \ErrorException || $throwable instanceof SilencedErrorContext) {
=======
    public static function getSeverity(\Throwable $throwable): int
    {
        if ($throwable instanceof \ErrorException) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $throwable->getSeverity();
        }

        if ($throwable instanceof \ParseError) {
            return \E_PARSE;
        }

        if ($throwable instanceof \TypeError) {
            return \E_RECOVERABLE_ERROR;
        }

        return \E_ERROR;
    }
}
