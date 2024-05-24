<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Exception;

/**
 * A throw-up exception, used for throwing an exception out of the Psy Shell.
 */
class ThrowUpException extends \Exception implements Exception
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function __construct(\Throwable $throwable)
    {
        $message = \sprintf("Throwing %s with message '%s'", \get_class($throwable), $throwable->getMessage());
        parent::__construct($message, $throwable->getCode(), $throwable);
=======
    public function __construct(\Exception $exception)
    {
        $message = \sprintf("Throwing %s with message '%s'", \get_class($exception), $exception->getMessage());
        parent::__construct($message, $exception->getCode(), $exception);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Return a raw (unformatted) version of the error message.
<<<<<<< HEAD
     */
    public function getRawMessage(): string
=======
     *
     * @return string
     */
    public function getRawMessage()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->getPrevious()->getMessage();
    }

    /**
     * Create a ThrowUpException from a Throwable.
     *
<<<<<<< HEAD
     * @deprecated PsySH no longer wraps Throwables
     *
     * @param \Throwable $throwable
     */
    public static function fromThrowable($throwable)
    {
        @\trigger_error('PsySH no longer wraps Throwables', \E_USER_DEPRECATED);
=======
     * @param \Throwable $throwable
     *
     * @return ThrowUpException
     */
    public static function fromThrowable($throwable)
    {
        if ($throwable instanceof \Error) {
            $throwable = ErrorException::fromError($throwable);
        }

        if (!$throwable instanceof \Exception) {
            throw new \InvalidArgumentException('throw-up can only throw Exceptions and Errors');
        }

        return new self($throwable);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
