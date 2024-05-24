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
 * A RuntimeException for Psy.
 */
class RuntimeException extends \RuntimeException implements Exception
{
    private $rawMessage;

    /**
     * Make this bad boy.
     *
     * @param string          $message  (default: "")
     * @param int             $code     (default: 0)
<<<<<<< HEAD
     * @param \Throwable|null $previous (default: null)
     */
    public function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
=======
     * @param \Exception|null $previous (default: null)
     */
    public function __construct($message = '', $code = 0, \Exception $previous = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->rawMessage = $message;
        parent::__construct($message, $code, $previous);
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
}
