<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

<<<<<<< HEAD
use function array_diff;
use function array_values;
use function class_exists;
use function get_declared_classes;
use function realpath;
use function sprintf;
use function str_replace;
use function strlen;
use function substr;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\FileLoader;
use PHPUnit\Util\Filesystem;
use ReflectionClass;
use ReflectionException;
=======
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\FileLoader;
use PHPUnit\Util\Filesystem;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class StandardTestSuiteLoader implements TestSuiteLoader
{
    /**
<<<<<<< HEAD
     * @throws \PHPUnit\Framework\Exception
     * @throws Exception
     */
    public function load(string $suiteClassName, string $suiteClassFile = ''): ReflectionClass
    {
        $suiteClassName = str_replace('.php', '', $suiteClassName);
=======
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     */
    public function load(string $suiteClassName, string $suiteClassFile = ''): \ReflectionClass
    {
        $suiteClassName = \str_replace('.php', '', $suiteClassName);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $filename       = null;

        if (empty($suiteClassFile)) {
            $suiteClassFile = Filesystem::classNameToFilename(
                $suiteClassName
            );
        }

<<<<<<< HEAD
        if (!class_exists($suiteClassName, false)) {
            $loadedClasses = get_declared_classes();

            $filename = FileLoader::checkAndLoad($suiteClassFile);

            $loadedClasses = array_values(
                array_diff(get_declared_classes(), $loadedClasses)
            );
        }

        if (!empty($loadedClasses) && !class_exists($suiteClassName, false)) {
            $offset = 0 - strlen($suiteClassName);

            foreach ($loadedClasses as $loadedClass) {
                try {
                    $class = new ReflectionClass($loadedClass);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
=======
        if (!\class_exists($suiteClassName, false)) {
            $loadedClasses = \get_declared_classes();

            $filename = FileLoader::checkAndLoad($suiteClassFile);

            $loadedClasses = \array_values(
                \array_diff(\get_declared_classes(), $loadedClasses)
            );
        }

        if (!empty($loadedClasses) && !\class_exists($suiteClassName, false)) {
            $offset = 0 - \strlen($suiteClassName);

            foreach ($loadedClasses as $loadedClass) {
                try {
                    $class = new \ReflectionClass($loadedClass);
                    // @codeCoverageIgnoreStart
                } catch (\ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

<<<<<<< HEAD
                if (substr($loadedClass, $offset) === $suiteClassName &&
=======
                if (\substr($loadedClass, $offset) === $suiteClassName &&
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $class->getFileName() == $filename) {
                    $suiteClassName = $loadedClass;

                    break;
                }
            }
        }

<<<<<<< HEAD
        if (!empty($loadedClasses) && !class_exists($suiteClassName, false)) {
=======
        if (!empty($loadedClasses) && !\class_exists($suiteClassName, false)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $testCaseClass = TestCase::class;

            foreach ($loadedClasses as $loadedClass) {
                try {
<<<<<<< HEAD
                    $class = new ReflectionClass($loadedClass);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
=======
                    $class = new \ReflectionClass($loadedClass);
                    // @codeCoverageIgnoreStart
                } catch (\ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                $classFile = $class->getFileName();

                if ($class->isSubclassOf($testCaseClass) && !$class->isAbstract()) {
                    $suiteClassName = $loadedClass;
                    $testCaseClass  = $loadedClass;

<<<<<<< HEAD
                    if ($classFile == realpath($suiteClassFile)) {
=======
                    if ($classFile == \realpath($suiteClassFile)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        break;
                    }
                }

                if ($class->hasMethod('suite')) {
                    try {
                        $method = $class->getMethod('suite');
                        // @codeCoverageIgnoreStart
<<<<<<< HEAD
                    } catch (ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            $e->getCode(),
=======
                    } catch (\ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            $e
                        );
                    }
                    // @codeCoverageIgnoreEnd

                    if (!$method->isAbstract() && $method->isPublic() && $method->isStatic()) {
                        $suiteClassName = $loadedClass;

<<<<<<< HEAD
                        if ($classFile == realpath($suiteClassFile)) {
=======
                        if ($classFile == \realpath($suiteClassFile)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            break;
                        }
                    }
                }
            }
        }

<<<<<<< HEAD
        if (class_exists($suiteClassName, false)) {
            try {
                $class = new ReflectionClass($suiteClassName);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
=======
        if (\class_exists($suiteClassName, false)) {
            try {
                $class = new \ReflectionClass($suiteClassName);
                // @codeCoverageIgnoreStart
            } catch (\ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

<<<<<<< HEAD
            if ($class->getFileName() == realpath($suiteClassFile)) {
=======
            if ($class->getFileName() == \realpath($suiteClassFile)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                return $class;
            }
        }

        throw new Exception(
<<<<<<< HEAD
            sprintf(
=======
            \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                "Class '%s' could not be found in '%s'.",
                $suiteClassName,
                $suiteClassFile
            )
        );
    }

<<<<<<< HEAD
    public function reload(ReflectionClass $aClass): ReflectionClass
=======
    public function reload(\ReflectionClass $aClass): \ReflectionClass
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $aClass;
    }
}
