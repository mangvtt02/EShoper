<?php

<<<<<<< HEAD
/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carbon\PHPStan;

use Carbon\CarbonInterface;
use PHPStan\Reflection\ReflectionProvider;
=======
namespace Carbon\PHPStan;

use Carbon\CarbonInterface;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use ReflectionClass;
use ReflectionException;

final class MacroScanner
{
    /**
<<<<<<< HEAD
     * @var \PHPStan\Reflection\ReflectionProvider
     */
    private $reflectionProvider;

    /**
     * MacroScanner constructor.
     *
     * @param \PHPStan\Reflection\ReflectionProvider $reflectionProvider
     */
    public function __construct(ReflectionProvider $reflectionProvider)
    {
        $this->reflectionProvider = $reflectionProvider;
    }

    /**
     * Return true if the given pair class-method is a Carbon macro.
     *
     * @param class-string $className
     * @param string       $methodName
=======
     * Return true if the given pair class-method is a Carbon macro.
     *
     * @param string $className
     * @phpstan-param class-string $className
     *
     * @param string $methodName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @return bool
     */
    public function hasMethod(string $className, string $methodName): bool
    {
<<<<<<< HEAD
        $classReflection = $this->reflectionProvider->getClass($className);

        if (
            $classReflection->getName() !== CarbonInterface::class &&
            !$classReflection->isSubclassOf(CarbonInterface::class)
        ) {
            return false;
        }

        return \is_callable([$className, 'hasMacro']) &&
=======
        return is_a($className, CarbonInterface::class, true) &&
            is_callable([$className, 'hasMacro']) &&
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $className::hasMacro($methodName);
    }

    /**
     * Return the Macro for a given pair class-method.
     *
<<<<<<< HEAD
     * @param class-string $className
     * @param string       $methodName
=======
     * @param string $className
     * @phpstan-param class-string $className
     *
     * @param string $methodName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @throws ReflectionException
     *
     * @return Macro
     */
    public function getMethod(string $className, string $methodName): Macro
    {
        $reflectionClass = new ReflectionClass($className);
        $property = $reflectionClass->getProperty('globalMacros');

        $property->setAccessible(true);
        $macro = $property->getValue()[$methodName];

        return new Macro(
            $className,
            $methodName,
            $macro
        );
    }
}
