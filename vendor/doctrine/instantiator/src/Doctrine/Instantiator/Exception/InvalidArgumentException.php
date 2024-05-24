<?php

namespace Doctrine\Instantiator\Exception;

use InvalidArgumentException as BaseInvalidArgumentException;
use ReflectionClass;
<<<<<<< HEAD

=======
use const PHP_VERSION_ID;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use function interface_exists;
use function sprintf;
use function trait_exists;

/**
 * Exception for invalid arguments provided to the instantiator
 */
class InvalidArgumentException extends BaseInvalidArgumentException implements ExceptionInterface
{
<<<<<<< HEAD
    public static function fromNonExistingClass(string $className): self
    {
        if (interface_exists($className)) {
            return new self(sprintf('The provided type "%s" is an interface, and cannot be instantiated', $className));
        }

        if (trait_exists($className)) {
            return new self(sprintf('The provided type "%s" is a trait, and cannot be instantiated', $className));
=======
    public static function fromNonExistingClass(string $className) : self
    {
        if (interface_exists($className)) {
            return new self(sprintf('The provided type "%s" is an interface, and can not be instantiated', $className));
        }

        if (PHP_VERSION_ID >= 50400 && trait_exists($className)) {
            return new self(sprintf('The provided type "%s" is a trait, and can not be instantiated', $className));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return new self(sprintf('The provided class "%s" does not exist', $className));
    }

<<<<<<< HEAD
    /**
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
     */
    public static function fromAbstractClass(ReflectionClass $reflectionClass): self
    {
        return new self(sprintf(
            'The provided class "%s" is abstract, and cannot be instantiated',
            $reflectionClass->getName()
        ));
    }

    public static function fromEnum(string $className): self
    {
        return new self(sprintf(
            'The provided class "%s" is an enum, and cannot be instantiated',
            $className
        ));
    }
=======
    public static function fromAbstractClass(ReflectionClass $reflectionClass) : self
    {
        return new self(sprintf(
            'The provided class "%s" is abstract, and can not be instantiated',
            $reflectionClass->getName()
        ));
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
