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
 * A custom error Exception for Psy with a formatted $message.
 */
class ErrorException extends \ErrorException implements Exception
{
    private $rawMessage;

    /**
     * Construct a Psy ErrorException.
     *
<<<<<<< HEAD
     * @param string          $message  (default: "")
     * @param int             $code     (default: 0)
     * @param int             $severity (default: 1)
     * @param string|null     $filename (default: null)
     * @param int|null        $lineno   (default: null)
     * @param \Throwable|null $previous (default: null)
     */
    public function __construct($message = '', $code = 0, $severity = 1, $filename = null, $lineno = null, ?\Throwable $previous = null)
=======
     * @param string         $message  (default: "")
     * @param int            $code     (default: 0)
     * @param int            $severity (default: 1)
     * @param string|null    $filename (default: null)
     * @param int|null       $lineno   (default: null)
     * @param Exception|null $previous (default: null)
     */
    public function __construct($message = '', $code = 0, $severity = 1, $filename = null, $lineno = null, $previous = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->rawMessage = $message;

        if (!empty($filename) && \preg_match('{Psy[/\\\\]ExecutionLoop}', $filename)) {
            $filename = '';
        }

        switch ($severity) {
<<<<<<< HEAD
            case \E_STRICT:
                $type = 'Strict error';
                break;

            case \E_NOTICE:
            case \E_USER_NOTICE:
                $type = 'Notice';
                break;

            case \E_WARNING:
            case \E_CORE_WARNING:
            case \E_COMPILE_WARNING:
            case \E_USER_WARNING:
                $type = 'Warning';
                break;

            case \E_DEPRECATED:
            case \E_USER_DEPRECATED:
                $type = 'Deprecated';
                break;

            case \E_RECOVERABLE_ERROR:
=======
            case E_STRICT:
                $type = 'Strict error';
                break;

            case E_NOTICE:
            case E_USER_NOTICE:
                $type = 'Notice';
                break;

            case E_WARNING:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
            case E_USER_WARNING:
                $type = 'Warning';
                break;

            case E_DEPRECATED:
            case E_USER_DEPRECATED:
                $type = 'Deprecated';
                break;

            case E_RECOVERABLE_ERROR:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $type = 'Recoverable fatal error';
                break;

            default:
                $type = 'Error';
                break;
        }

<<<<<<< HEAD
        $message = \sprintf('PHP %s:  %s%s on line %d', $type, $message, $filename ? ' in '.$filename : '', $lineno);
=======
        $message = \sprintf('PHP %s:  %s%s on line %d', $type, $message, $filename ? ' in ' . $filename : '', $lineno);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        parent::__construct($message, $code, $severity, $filename, $lineno, $previous);
    }

    /**
     * Get the raw (unformatted) message for this error.
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
     * Helper for throwing an ErrorException.
     *
     * This allows us to:
     *
     *     set_error_handler([ErrorException::class, 'throwException']);
     *
<<<<<<< HEAD
     * @throws self
=======
     * @throws ErrorException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param int    $errno   Error type
     * @param string $errstr  Message
     * @param string $errfile Filename
     * @param int    $errline Line number
     */
    public static function throwException($errno, $errstr, $errfile, $errline)
    {
        throw new self($errstr, 0, $errno, $errfile, $errline);
    }

    /**
     * Create an ErrorException from an Error.
     *
<<<<<<< HEAD
     * @deprecated PsySH no longer wraps Errors
     *
     * @param \Error $e
     */
    public static function fromError(\Error $e)
    {
        @\trigger_error('PsySH no longer wraps Errors', \E_USER_DEPRECATED);
=======
     * @param \Error $e
     *
     * @return ErrorException
     */
    public static function fromError(\Error $e)
    {
        return new self($e->getMessage(), $e->getCode(), 1, $e->getFile(), $e->getLine(), $e);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
