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
 * A break exception, used for halting the Psy Shell.
 */
class BreakException extends \Exception implements Exception
{
    private $rawMessage;

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function __construct($message = '', $code = 0, ?\Throwable $previous = null)
=======
    public function __construct($message = '', $code = 0, \Exception $previous = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->rawMessage = $message;
        parent::__construct(\sprintf('Exit:  %s', $message), $code, $previous);
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
        return $this->rawMessage;
    }

    /**
     * Throws BreakException.
     *
     * Since `throw` can not be inserted into arbitrary expressions, it wraps with function call.
     *
     * @throws BreakException
     */
    public static function exitShell()
    {
        throw new self('Goodbye');
    }
}
