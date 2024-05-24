<?php

namespace Doctrine\Instantiator\Exception;

use Exception;
use ReflectionClass;
use UnexpectedValueException as BaseUnexpectedValueException;
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use function sprintf;

/**
 * Exception for given parameters causing invalid/unexpected state on instantiation
 */
class UnexpectedValueException extends BaseUnexpectedValueException implements ExceptionInterface
{
<<<<<<< HEAD
    /**
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
     */
    public static function fromSerializationTriggeredException(
        ReflectionClass $reflectionClass,
        Exception $exception
    ): self {
=======
    public static function fromSerializationTriggeredException(
        ReflectionClass $reflectionClass,
        Exception $exception
    ) : self {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new self(
            sprintf(
                'An exception was raised while trying to instantiate an instance of "%s" via un-serialization',
                $reflectionClass->getName()
            ),
            0,
            $exception
        );
    }

<<<<<<< HEAD
    /**
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public static function fromUncleanUnSerialization(
        ReflectionClass $reflectionClass,
        string $errorString,
        int $errorCode,
        string $errorFile,
        int $errorLine
<<<<<<< HEAD
    ): self {
=======
    ) : self {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new self(
            sprintf(
                'Could not produce an instance of "%s" via un-serialization, since an error was triggered '
                . 'in file "%s" at line "%d"',
                $reflectionClass->getName(),
                $errorFile,
                $errorLine
            ),
            0,
            new Exception($errorString, $errorCode)
        );
    }
}
