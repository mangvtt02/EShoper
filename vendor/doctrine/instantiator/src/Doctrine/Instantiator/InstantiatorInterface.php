<?php

namespace Doctrine\Instantiator;

use Doctrine\Instantiator\Exception\ExceptionInterface;

/**
 * Instantiator provides utility methods to build objects without invoking their constructors
 */
interface InstantiatorInterface
{
    /**
     * @param string $className
<<<<<<< HEAD
     * @phpstan-param class-string<T> $className
     *
     * @return object
     * @phpstan-return T
     *
     * @throws ExceptionInterface
     *
     * @template T of object
=======
     *
     * @return object
     *
     * @throws ExceptionInterface
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function instantiate($className);
}
