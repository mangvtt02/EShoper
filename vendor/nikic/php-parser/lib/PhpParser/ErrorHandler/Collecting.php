<?php declare(strict_types=1);

namespace PhpParser\ErrorHandler;

use PhpParser\Error;
use PhpParser\ErrorHandler;

/**
 * Error handler that collects all errors into an array.
 *
 * This allows graceful handling of errors.
 */
<<<<<<< HEAD
class Collecting implements ErrorHandler {
    /** @var Error[] Collected errors */
    private array $errors = [];

    public function handleError(Error $error): void {
=======
class Collecting implements ErrorHandler
{
    /** @var Error[] Collected errors */
    private $errors = [];

    public function handleError(Error $error) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->errors[] = $error;
    }

    /**
     * Get collected errors.
     *
     * @return Error[]
     */
<<<<<<< HEAD
    public function getErrors(): array {
=======
    public function getErrors() : array {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->errors;
    }

    /**
     * Check whether there are any errors.
<<<<<<< HEAD
     */
    public function hasErrors(): bool {
=======
     *
     * @return bool
     */
    public function hasErrors() : bool {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return !empty($this->errors);
    }

    /**
     * Reset/clear collected errors.
     */
<<<<<<< HEAD
    public function clearErrors(): void {
=======
    public function clearErrors() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->errors = [];
    }
}
