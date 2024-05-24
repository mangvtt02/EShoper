<?php declare(strict_types=1);

namespace PhpParser;

<<<<<<< HEAD
interface ErrorHandler {
=======
interface ErrorHandler
{
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    /**
     * Handle an error generated during lexing, parsing or some other operation.
     *
     * @param Error $error The error that needs to be handled
     */
<<<<<<< HEAD
    public function handleError(Error $error): void;
=======
    public function handleError(Error $error);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
