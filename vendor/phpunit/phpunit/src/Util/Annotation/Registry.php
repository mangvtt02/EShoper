<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\Annotation;

<<<<<<< HEAD
use function array_key_exists;
use PHPUnit\Util\Exception;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
=======
use PHPUnit\Util\Exception;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Reflection information, and therefore DocBlock information, is static within
 * a single PHP process. It is therefore okay to use a Singleton registry here.
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Registry
{
    /** @var null|self */
    private static $instance;

    /** @var array<string, DocBlock> indexed by class name */
    private $classDocBlocks = [];

    /** @var array<string, array<string, DocBlock>> indexed by class name and method name */
    private $methodDocBlocks = [];

    public static function getInstance(): self
    {
        return self::$instance ?? self::$instance = new self;
    }

    private function __construct()
    {
    }

    /**
     * @throws Exception
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $class
     */
    public function forClassName(string $class): DocBlock
    {
<<<<<<< HEAD
        if (array_key_exists($class, $this->classDocBlocks)) {
=======
        if (\array_key_exists($class, $this->classDocBlocks)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $this->classDocBlocks[$class];
        }

        try {
<<<<<<< HEAD
            $reflection = new ReflectionClass($class);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
=======
            $reflection = new \ReflectionClass($class);
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

        return $this->classDocBlocks[$class] = DocBlock::ofClass($reflection);
    }

    /**
     * @throws Exception
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $classInHierarchy
     */
    public function forMethod(string $classInHierarchy, string $method): DocBlock
    {
        if (isset($this->methodDocBlocks[$classInHierarchy][$method])) {
            return $this->methodDocBlocks[$classInHierarchy][$method];
        }

        try {
<<<<<<< HEAD
            $reflection = new ReflectionMethod($classInHierarchy, $method);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
=======
            $reflection = new \ReflectionMethod($classInHierarchy, $method);
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

        return $this->methodDocBlocks[$classInHierarchy][$method] = DocBlock::ofMethod($reflection, $classInHierarchy);
    }
}
