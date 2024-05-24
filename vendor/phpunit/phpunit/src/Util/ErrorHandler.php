<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

<<<<<<< HEAD
use const E_DEPRECATED;
use const E_NOTICE;
use const E_STRICT;
use const E_USER_DEPRECATED;
use const E_USER_NOTICE;
use const E_USER_WARNING;
use const E_WARNING;
use function error_reporting;
use function restore_error_handler;
use function set_error_handler;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Error\Deprecated;
use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\Error\Warning;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ErrorHandler
{
    /**
     * @var bool
     */
    private $convertDeprecationsToExceptions;

    /**
     * @var bool
     */
    private $convertErrorsToExceptions;

    /**
     * @var bool
     */
    private $convertNoticesToExceptions;

    /**
     * @var bool
     */
    private $convertWarningsToExceptions;

    /**
     * @var bool
     */
    private $registered = false;

    public static function invokeIgnoringWarnings(callable $callable)
    {
<<<<<<< HEAD
        set_error_handler(
            static function ($errorNumber, $errorString)
            {
                if ($errorNumber === E_WARNING) {
=======
        \set_error_handler(
            static function ($errorNumber, $errorString) {
                if ($errorNumber === \E_WARNING) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    return;
                }

                return false;
            }
        );

        $result = $callable();

<<<<<<< HEAD
        restore_error_handler();
=======
        \restore_error_handler();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $result;
    }

    public function __construct(bool $convertDeprecationsToExceptions, bool $convertErrorsToExceptions, bool $convertNoticesToExceptions, bool $convertWarningsToExceptions)
    {
        $this->convertDeprecationsToExceptions = $convertDeprecationsToExceptions;
        $this->convertErrorsToExceptions       = $convertErrorsToExceptions;
        $this->convertNoticesToExceptions      = $convertNoticesToExceptions;
        $this->convertWarningsToExceptions     = $convertWarningsToExceptions;
    }

    public function __invoke(int $errorNumber, string $errorString, string $errorFile, int $errorLine): bool
    {
        /*
         * Do not raise an exception when the error suppression operator (@) was used.
         *
         * @see https://github.com/sebastianbergmann/phpunit/issues/3739
         */
<<<<<<< HEAD
        if (!($errorNumber & error_reporting())) {
=======
        if (!($errorNumber & \error_reporting())) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        switch ($errorNumber) {
<<<<<<< HEAD
            case E_NOTICE:
            case E_USER_NOTICE:
            case E_STRICT:
=======
            case \E_NOTICE:
            case \E_USER_NOTICE:
            case \E_STRICT:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if (!$this->convertNoticesToExceptions) {
                    return false;
                }

                throw new Notice($errorString, $errorNumber, $errorFile, $errorLine);

<<<<<<< HEAD
            case E_WARNING:
            case E_USER_WARNING:
=======
            case \E_WARNING:
            case \E_USER_WARNING:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if (!$this->convertWarningsToExceptions) {
                    return false;
                }

                throw new Warning($errorString, $errorNumber, $errorFile, $errorLine);

<<<<<<< HEAD
            case E_DEPRECATED:
            case E_USER_DEPRECATED:
=======
            case \E_DEPRECATED:
            case \E_USER_DEPRECATED:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if (!$this->convertDeprecationsToExceptions) {
                    return false;
                }

                throw new Deprecated($errorString, $errorNumber, $errorFile, $errorLine);

            default:
                if (!$this->convertErrorsToExceptions) {
                    return false;
                }

                throw new Error($errorString, $errorNumber, $errorFile, $errorLine);
        }
    }

    public function register(): void
    {
        if ($this->registered) {
            return;
        }

<<<<<<< HEAD
        $oldErrorHandler = set_error_handler($this);

        if ($oldErrorHandler !== null) {
            restore_error_handler();
=======
        $oldErrorHandler = \set_error_handler($this);

        if ($oldErrorHandler !== null) {
            \restore_error_handler();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            return;
        }

        $this->registered = true;
    }

    public function unregister(): void
    {
        if (!$this->registered) {
            return;
        }

<<<<<<< HEAD
        restore_error_handler();
=======
        \restore_error_handler();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
