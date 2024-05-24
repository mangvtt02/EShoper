<?php declare(strict_types=1);

namespace PhpParser\ErrorHandler;

use PhpParser\Error;
use PhpParser\ErrorHandler;

/**
 * Error handler that handles all errors by throwing them.
 *
 * This is the default strategy used by all components.
 */
<<<<<<< HEAD
class Throwing implements ErrorHandler {
    public function handleError(Error $error): void {
=======
class Throwing implements ErrorHandler
{
    public function handleError(Error $error) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        throw $error;
    }
}
