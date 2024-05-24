<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject;

<<<<<<< HEAD
use const DIRECTORY_SEPARATOR;
use const PHP_EOL;
use const PHP_MAJOR_VERSION;
use const PREG_OFFSET_CAPTURE;
use const WSDL_CACHE_NONE;
use function array_diff_assoc;
use function array_map;
use function array_merge;
use function array_pop;
use function array_unique;
use function class_exists;
use function count;
use function explode;
use function extension_loaded;
use function implode;
use function in_array;
use function interface_exists;
use function is_array;
use function is_object;
use function is_string;
use function md5;
use function mt_rand;
use function preg_match;
use function preg_match_all;
use function range;
use function serialize;
use function sort;
use function sprintf;
use function str_replace;
use function strlen;
use function strpos;
use function strtolower;
use function substr;
use function trait_exists;
use Doctrine\Instantiator\Exception\ExceptionInterface as InstantiatorException;
use Doctrine\Instantiator\Instantiator;
use Exception;
use Iterator;
use IteratorAggregate;
use PHPUnit\Framework\InvalidArgumentException;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use SoapClient;
use SoapFault;
use Text_Template;
use Throwable;
use Traversable;
=======
use Doctrine\Instantiator\Exception\ExceptionInterface as InstantiatorException;
use Doctrine\Instantiator\Instantiator;
use PHPUnit\Framework\InvalidArgumentException;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Generator
{
<<<<<<< HEAD
    private const MOCKED_CLONE_METHOD_WITH_VOID_RETURN_TYPE_TRAIT = <<<'EOT'
namespace PHPUnit\Framework\MockObject;

trait MockedCloneMethodWithVoidReturnType
{
    public function __clone(): void
    {
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationHandler();
    }
}
EOT;
    private const MOCKED_CLONE_METHOD_WITHOUT_RETURN_TYPE_TRAIT = <<<'EOT'
namespace PHPUnit\Framework\MockObject;

trait MockedCloneMethodWithoutReturnType
{
    public function __clone()
    {
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationHandler();
    }
}
EOT;
    private const UNMOCKED_CLONE_METHOD_WITH_VOID_RETURN_TYPE_TRAIT = <<<'EOT'
namespace PHPUnit\Framework\MockObject;

trait UnmockedCloneMethodWithVoidReturnType
{
    public function __clone(): void
    {
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationHandler();

        parent::__clone();
    }
}
EOT;
    private const UNMOCKED_CLONE_METHOD_WITHOUT_RETURN_TYPE_TRAIT = <<<'EOT'
namespace PHPUnit\Framework\MockObject;

trait UnmockedCloneMethodWithoutReturnType
{
    public function __clone()
    {
        $this->__phpunit_invocationMocker = clone $this->__phpunit_getInvocationHandler();

        parent::__clone();
    }
}
EOT;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    /**
     * @var array
     */
    private const BLACKLISTED_METHOD_NAMES = [
        '__CLASS__'       => true,
        '__DIR__'         => true,
        '__FILE__'        => true,
        '__FUNCTION__'    => true,
        '__LINE__'        => true,
        '__METHOD__'      => true,
        '__NAMESPACE__'   => true,
        '__TRAIT__'       => true,
        '__clone'         => true,
        '__halt_compiler' => true,
    ];

    /**
     * @var array
     */
    private static $cache = [];

    /**
<<<<<<< HEAD
     * @var Text_Template[]
=======
     * @var \Text_Template[]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private static $templates = [];

    /**
     * Returns a mock object for the specified class.
     *
     * @param string|string[] $type
     * @param null|array      $methods
     *
     * @throws RuntimeException
     */
<<<<<<< HEAD
    public function getMock($type, $methods = [], array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, bool $cloneArguments = true, bool $callOriginalMethods = false, ?object $proxyTarget = null, bool $allowMockingUnknownTypes = true, bool $returnValueGeneration = true): MockObject
    {
        if (!is_array($type) && !is_string($type)) {
            throw InvalidArgumentException::create(1, 'array or string');
        }

        if (!is_array($methods) && null !== $methods) {
=======
    public function getMock($type, $methods = [], array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, bool $cloneArguments = true, bool $callOriginalMethods = false, object $proxyTarget = null, bool $allowMockingUnknownTypes = true, bool $returnValueGeneration = true): MockObject
    {
        if (!\is_array($type) && !\is_string($type)) {
            throw InvalidArgumentException::create(1, 'array or string');
        }

        if (!\is_array($methods) && null !== $methods) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw InvalidArgumentException::create(2, 'array');
        }

        if ($type === 'Traversable' || $type === '\\Traversable') {
            $type = 'Iterator';
        }

<<<<<<< HEAD
        if (is_array($type)) {
            $type = array_unique(
                array_map(
                    static function ($type)
                    {
=======
        if (\is_array($type)) {
            $type = \array_unique(
                \array_map(
                    static function ($type) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        if ($type === 'Traversable' ||
                            $type === '\\Traversable' ||
                            $type === '\\Iterator') {
                            return 'Iterator';
                        }

                        return $type;
                    },
                    $type
                )
            );
        }

        if (!$allowMockingUnknownTypes) {
<<<<<<< HEAD
            if (is_array($type)) {
                foreach ($type as $_type) {
                    if (!class_exists($_type, $callAutoload) &&
                        !interface_exists($_type, $callAutoload)) {
                        throw new RuntimeException(
                            sprintf(
=======
            if (\is_array($type)) {
                foreach ($type as $_type) {
                    if (!\class_exists($_type, $callAutoload) &&
                        !\interface_exists($_type, $callAutoload)) {
                        throw new RuntimeException(
                            \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                'Cannot stub or mock class or interface "%s" which does not exist',
                                $_type
                            )
                        );
                    }
                }
<<<<<<< HEAD
            } elseif (!class_exists($type, $callAutoload) && !interface_exists($type, $callAutoload)) {
                throw new RuntimeException(
                    sprintf(
=======
            } elseif (!\class_exists($type, $callAutoload) && !\interface_exists($type, $callAutoload)) {
                throw new RuntimeException(
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'Cannot stub or mock class or interface "%s" which does not exist',
                        $type
                    )
                );
            }
        }

        if (null !== $methods) {
            foreach ($methods as $method) {
<<<<<<< HEAD
                if (!preg_match('~[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*~', (string) $method)) {
                    throw new RuntimeException(
                        sprintf(
=======
                if (!\preg_match('~[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*~', (string) $method)) {
                    throw new RuntimeException(
                        \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            'Cannot stub or mock method with invalid name "%s"',
                            $method
                        )
                    );
                }
            }

<<<<<<< HEAD
            if ($methods !== array_unique($methods)) {
                throw new RuntimeException(
                    sprintf(
                        'Cannot stub or mock using a method list that contains duplicates: "%s" (duplicate: "%s")',
                        implode(', ', $methods),
                        implode(', ', array_unique(array_diff_assoc($methods, array_unique($methods))))
=======
            if ($methods !== \array_unique($methods)) {
                throw new RuntimeException(
                    \sprintf(
                        'Cannot stub or mock using a method list that contains duplicates: "%s" (duplicate: "%s")',
                        \implode(', ', $methods),
                        \implode(', ', \array_unique(\array_diff_assoc($methods, \array_unique($methods))))
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    )
                );
            }
        }

<<<<<<< HEAD
        if ($mockClassName !== '' && class_exists($mockClassName, false)) {
            try {
                $reflector = new ReflectionClass($mockClassName);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    $e->getCode(),
=======
        if ($mockClassName !== '' && \class_exists($mockClassName, false)) {
            try {
                $reflector = new \ReflectionClass($mockClassName);
                // @codeCoverageIgnoreStart
            } catch (\ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            if (!$reflector->implementsInterface(MockObject::class)) {
                throw new RuntimeException(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'Class "%s" already exists.',
                        $mockClassName
                    )
                );
            }
        }

        if (!$callOriginalConstructor && $callOriginalMethods) {
            throw new RuntimeException(
                'Proxying to original methods requires invoking the original constructor'
            );
        }

        $mock = $this->generate(
            $type,
            $methods,
            $mockClassName,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments,
            $callOriginalMethods
        );

        return $this->getObject(
            $mock,
            $type,
            $callOriginalConstructor,
            $callAutoload,
            $arguments,
            $callOriginalMethods,
            $proxyTarget,
            $returnValueGeneration
        );
    }

    /**
     * Returns a mock object for the specified abstract class with all abstract
     * methods of the class mocked. Concrete methods to mock can be specified with
<<<<<<< HEAD
     * the $mockedMethods parameter.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
=======
     * the $mockedMethods parameter
     *
     * @psalm-template RealInstanceType of object
     * @psalm-param class-string<RealInstanceType> $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return MockObject&RealInstanceType
     *
     * @throws RuntimeException
     */
<<<<<<< HEAD
    public function getMockForAbstractClass(string $originalClassName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, ?array $mockedMethods = null, bool $cloneArguments = true): MockObject
    {
        if (class_exists($originalClassName, $callAutoload) ||
            interface_exists($originalClassName, $callAutoload)) {
            try {
                $reflector = new ReflectionClass($originalClassName);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    $e->getCode(),
=======
    public function getMockForAbstractClass(string $originalClassName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, array $mockedMethods = null, bool $cloneArguments = true): MockObject
    {
        if (\class_exists($originalClassName, $callAutoload) ||
            \interface_exists($originalClassName, $callAutoload)) {
            try {
                $reflector = new \ReflectionClass($originalClassName);
                // @codeCoverageIgnoreStart
            } catch (\ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            $methods = $mockedMethods;

            foreach ($reflector->getMethods() as $method) {
<<<<<<< HEAD
                if ($method->isAbstract() && !in_array($method->getName(), $methods ?? [], true)) {
=======
                if ($method->isAbstract() && !\in_array($method->getName(), $methods ?? [], true)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $methods[] = $method->getName();
                }
            }

            if (empty($methods)) {
                $methods = null;
            }

            return $this->getMock(
                $originalClassName,
                $methods,
                $arguments,
                $mockClassName,
                $callOriginalConstructor,
                $callOriginalClone,
                $callAutoload,
                $cloneArguments
            );
        }

        throw new RuntimeException(
<<<<<<< HEAD
            sprintf('Class "%s" does not exist.', $originalClassName)
=======
            \sprintf('Class "%s" does not exist.', $originalClassName)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );
    }

    /**
     * Returns a mock object for the specified trait with all abstract methods
     * of the trait mocked. Concrete methods to mock can be specified with the
     * `$mockedMethods` parameter.
     *
     * @throws RuntimeException
     */
<<<<<<< HEAD
    public function getMockForTrait(string $traitName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, ?array $mockedMethods = null, bool $cloneArguments = true): MockObject
    {
        if (!trait_exists($traitName, $callAutoload)) {
            throw new RuntimeException(
                sprintf(
=======
    public function getMockForTrait(string $traitName, array $arguments = [], string $mockClassName = '', bool $callOriginalConstructor = true, bool $callOriginalClone = true, bool $callAutoload = true, array $mockedMethods = null, bool $cloneArguments = true): MockObject
    {
        if (!\trait_exists($traitName, $callAutoload)) {
            throw new RuntimeException(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Trait "%s" does not exist.',
                    $traitName
                )
            );
        }

        $className = $this->generateClassName(
            $traitName,
            '',
            'Trait_'
        );

        $classTemplate = $this->getTemplate('trait_class.tpl');

        $classTemplate->setVar(
            [
                'prologue'   => 'abstract ',
                'class_name' => $className['className'],
                'trait_name' => $traitName,
            ]
        );

        $mockTrait = new MockTrait($classTemplate->render(), $className['className']);
        $mockTrait->generate();

        return $this->getMockForAbstractClass($className['className'], $arguments, $mockClassName, $callOriginalConstructor, $callOriginalClone, $callAutoload, $mockedMethods, $cloneArguments);
    }

    /**
     * Returns an object for the specified trait.
     *
     * @throws RuntimeException
     */
    public function getObjectForTrait(string $traitName, string $traitClassName = '', bool $callAutoload = true, bool $callOriginalConstructor = false, array $arguments = []): object
    {
<<<<<<< HEAD
        if (!trait_exists($traitName, $callAutoload)) {
            throw new RuntimeException(
                sprintf(
=======
        if (!\trait_exists($traitName, $callAutoload)) {
            throw new RuntimeException(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Trait "%s" does not exist.',
                    $traitName
                )
            );
        }

        $className = $this->generateClassName(
            $traitName,
            $traitClassName,
            'Trait_'
        );

        $classTemplate = $this->getTemplate('trait_class.tpl');

        $classTemplate->setVar(
            [
                'prologue'   => '',
                'class_name' => $className['className'],
                'trait_name' => $traitName,
            ]
        );

        return $this->getObject(
            new MockTrait(
                $classTemplate->render(),
                $className['className']
            ),
            '',
            $callOriginalConstructor,
            $callAutoload,
            $arguments
        );
    }

<<<<<<< HEAD
    public function generate($type, ?array $methods = null, string $mockClassName = '', bool $callOriginalClone = true, bool $callAutoload = true, bool $cloneArguments = true, bool $callOriginalMethods = false): MockClass
    {
        if (is_array($type)) {
            sort($type);
=======
    public function generate($type, array $methods = null, string $mockClassName = '', bool $callOriginalClone = true, bool $callAutoload = true, bool $cloneArguments = true, bool $callOriginalMethods = false): MockClass
    {
        if (\is_array($type)) {
            \sort($type);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($mockClassName !== '') {
            return $this->generateMock(
                $type,
                $methods,
                $mockClassName,
                $callOriginalClone,
                $callAutoload,
                $cloneArguments,
                $callOriginalMethods
            );
        }

<<<<<<< HEAD
        $key = md5(
            is_array($type) ? implode('_', $type) : $type .
            serialize($methods) .
            serialize($callOriginalClone) .
            serialize($cloneArguments) .
            serialize($callOriginalMethods)
=======
        $key = \md5(
            \is_array($type) ? \implode('_', $type) : $type .
            \serialize($methods) .
            \serialize($callOriginalClone) .
            \serialize($cloneArguments) .
            \serialize($callOriginalMethods)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );

        if (!isset(self::$cache[$key])) {
            self::$cache[$key] = $this->generateMock(
                $type,
                $methods,
                $mockClassName,
                $callOriginalClone,
                $callAutoload,
                $cloneArguments,
                $callOriginalMethods
            );
        }

        return self::$cache[$key];
    }

    /**
     * @throws RuntimeException
     */
    public function generateClassFromWsdl(string $wsdlFile, string $className, array $methods = [], array $options = []): string
    {
<<<<<<< HEAD
        if (!extension_loaded('soap')) {
=======
        if (!\extension_loaded('soap')) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new RuntimeException(
                'The SOAP extension is required to generate a mock object from WSDL.'
            );
        }

<<<<<<< HEAD
        $options = array_merge($options, ['cache_wsdl' => WSDL_CACHE_NONE]);

        try {
            $client   = new SoapClient($wsdlFile, $options);
            $_methods = array_unique($client->__getFunctions());
            unset($client);
        } catch (SoapFault $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
=======
        $options  = \array_merge($options, ['cache_wsdl' => \WSDL_CACHE_NONE]);

        try {
            $client   = new \SoapClient($wsdlFile, $options);
            $_methods = \array_unique($client->__getFunctions());
            unset($client);
        } catch (\SoapFault $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e
            );
        }

<<<<<<< HEAD
        sort($_methods);
=======
        \sort($_methods);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $methodTemplate = $this->getTemplate('wsdl_method.tpl');
        $methodsBuffer  = '';

        foreach ($_methods as $method) {
<<<<<<< HEAD
            preg_match_all('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\(/', $method, $matches, PREG_OFFSET_CAPTURE);
            $lastFunction = array_pop($matches[0]);
            $nameStart    = $lastFunction[1];
            $nameEnd      = $nameStart + strlen($lastFunction[0]) - 1;
            $name         = str_replace('(', '', $lastFunction[0]);

            if (empty($methods) || in_array($name, $methods, true)) {
                $args = explode(
                    ',',
                    str_replace(')', '', substr($method, $nameEnd + 1))
                );

                foreach (range(0, count($args) - 1) as $i) {
                    $parameterStart = strpos($args[$i], '$');

                    if (!$parameterStart) {
                        continue;
                    }

                    $args[$i] = substr($args[$i], $parameterStart);
=======
            \preg_match_all('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*\(/', $method, $matches, \PREG_OFFSET_CAPTURE);
            $lastFunction = \array_pop($matches[0]);
            $nameStart    = $lastFunction[1];
            $nameEnd      = $nameStart + \strlen($lastFunction[0]) - 1;
            $name         = \str_replace('(', '', $lastFunction[0]);

            if (empty($methods) || \in_array($name, $methods, true)) {
                $args = \explode(
                    ',',
                    \str_replace(')', '', \substr($method, $nameEnd + 1))
                );

                foreach (\range(0, \count($args) - 1) as $i) {
                    $args[$i] = \substr($args[$i], \strpos($args[$i], '$'));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }

                $methodTemplate->setVar(
                    [
                        'method_name' => $name,
<<<<<<< HEAD
                        'arguments'   => implode(', ', $args),
=======
                        'arguments'   => \implode(', ', $args),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    ]
                );

                $methodsBuffer .= $methodTemplate->render();
            }
        }

        $optionsBuffer = '[';

        foreach ($options as $key => $value) {
            $optionsBuffer .= $key . ' => ' . $value;
        }

        $optionsBuffer .= ']';

        $classTemplate = $this->getTemplate('wsdl_class.tpl');
        $namespace     = '';

<<<<<<< HEAD
        if (strpos($className, '\\') !== false) {
            $parts     = explode('\\', $className);
            $className = array_pop($parts);
            $namespace = 'namespace ' . implode('\\', $parts) . ';' . "\n\n";
=======
        if (\strpos($className, '\\') !== false) {
            $parts     = \explode('\\', $className);
            $className = \array_pop($parts);
            $namespace = 'namespace ' . \implode('\\', $parts) . ';' . "\n\n";
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $classTemplate->setVar(
            [
                'namespace'  => $namespace,
                'class_name' => $className,
                'wsdl'       => $wsdlFile,
                'options'    => $optionsBuffer,
                'methods'    => $methodsBuffer,
            ]
        );

        return $classTemplate->render();
    }

    /**
     * @throws RuntimeException
     *
     * @return string[]
     */
    public function getClassMethods(string $className): array
    {
        try {
<<<<<<< HEAD
            $class = new ReflectionClass($className);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
=======
            $class = new \ReflectionClass($className);
            // @codeCoverageIgnoreStart
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        $methods = [];

        foreach ($class->getMethods() as $method) {
            if ($method->isPublic() || $method->isAbstract()) {
                $methods[] = $method->getName();
            }
        }

        return $methods;
    }

    /**
     * @throws RuntimeException
     *
     * @return MockMethod[]
     */
    public function mockClassMethods(string $className, bool $callOriginalMethods, bool $cloneArguments): array
    {
        try {
<<<<<<< HEAD
            $class = new ReflectionClass($className);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
=======
            $class = new \ReflectionClass($className);
            // @codeCoverageIgnoreStart
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        $methods = [];

        foreach ($class->getMethods() as $method) {
            if (($method->isPublic() || $method->isAbstract()) && $this->canMockMethod($method)) {
                $methods[] = MockMethod::fromReflection($method, $callOriginalMethods, $cloneArguments);
            }
        }

        return $methods;
    }

    /**
     * @throws RuntimeException
     *
     * @return MockMethod[]
     */
    public function mockInterfaceMethods(string $interfaceName, bool $cloneArguments): array
    {
        try {
<<<<<<< HEAD
            $class = new ReflectionClass($interfaceName);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
=======
            $class = new \ReflectionClass($interfaceName);
            // @codeCoverageIgnoreStart
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        $methods = [];

        foreach ($class->getMethods() as $method) {
            $methods[] = MockMethod::fromReflection($method, false, $cloneArguments);
        }

        return $methods;
    }

    /**
     * @psalm-param class-string $interfaceName
     *
<<<<<<< HEAD
     * @return ReflectionMethod[]
=======
     * @return \ReflectionMethod[]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function userDefinedInterfaceMethods(string $interfaceName): array
    {
        try {
            // @codeCoverageIgnoreStart
<<<<<<< HEAD
            $interface = new ReflectionClass($interfaceName);
        } catch (ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
=======
            $interface = new \ReflectionClass($interfaceName);
        } catch (\ReflectionException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        $methods = [];

        foreach ($interface->getMethods() as $method) {
            if (!$method->isUserDefined()) {
                continue;
            }

            $methods[] = $method;
        }

        return $methods;
    }

<<<<<<< HEAD
    private function getObject(MockType $mockClass, $type = '', bool $callOriginalConstructor = false, bool $callAutoload = false, array $arguments = [], bool $callOriginalMethods = false, ?object $proxyTarget = null, bool $returnValueGeneration = true)
=======
    private function getObject(MockType $mockClass, $type = '', bool $callOriginalConstructor = false, bool $callAutoload = false, array $arguments = [], bool $callOriginalMethods = false, object $proxyTarget = null, bool $returnValueGeneration = true)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $className = $mockClass->generate();

        if ($callOriginalConstructor) {
<<<<<<< HEAD
            if (count($arguments) === 0) {
                $object = new $className;
            } else {
                try {
                    $class = new ReflectionClass($className);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        $e->getCode(),
=======
            if (\count($arguments) === 0) {
                $object = new $className;
            } else {
                try {
                    $class = new \ReflectionClass($className);
                    // @codeCoverageIgnoreStart
                } catch (\ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                $object = $class->newInstanceArgs($arguments);
            }
        } else {
            try {
                $object = (new Instantiator)->instantiate($className);
            } catch (InstantiatorException $exception) {
                throw new RuntimeException($exception->getMessage());
            }
        }

        if ($callOriginalMethods) {
<<<<<<< HEAD
            if (!is_object($proxyTarget)) {
                if (count($arguments) === 0) {
                    $proxyTarget = new $type;
                } else {
                    try {
                        $class = new ReflectionClass($type);
                        // @codeCoverageIgnoreStart
                    } catch (ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            $e->getCode(),
=======
            if (!\is_object($proxyTarget)) {
                if (\count($arguments) === 0) {
                    $proxyTarget = new $type;
                } else {
                    try {
                        $class = new \ReflectionClass($type);
                        // @codeCoverageIgnoreStart
                    } catch (\ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            $e
                        );
                    }
                    // @codeCoverageIgnoreEnd

                    $proxyTarget = $class->newInstanceArgs($arguments);
                }
            }

            $object->__phpunit_setOriginalObject($proxyTarget);
        }

        if ($object instanceof MockObject) {
            $object->__phpunit_setReturnValueGeneration($returnValueGeneration);
        }

        return $object;
    }

    /**
     * @param array|string $type
     *
     * @throws RuntimeException
     */
    private function generateMock($type, ?array $explicitMethods, string $mockClassName, bool $callOriginalClone, bool $callAutoload, bool $cloneArguments, bool $callOriginalMethods): MockClass
    {
        $classTemplate        = $this->getTemplate('mocked_class.tpl');
        $additionalInterfaces = [];
        $mockedCloneMethod    = false;
        $unmockedCloneMethod  = false;
        $isClass              = false;
        $isInterface          = false;
        $class                = null;
        $mockMethods          = new MockMethodSet;

<<<<<<< HEAD
        if (is_array($type)) {
            $interfaceMethods = [];

            foreach ($type as $_type) {
                if (!interface_exists($_type, $callAutoload)) {
                    throw new RuntimeException(
                        sprintf(
=======
        if (\is_array($type)) {
            $interfaceMethods = [];

            foreach ($type as $_type) {
                if (!\interface_exists($_type, $callAutoload)) {
                    throw new RuntimeException(
                        \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            'Interface "%s" does not exist.',
                            $_type
                        )
                    );
                }

                $additionalInterfaces[] = $_type;

                try {
<<<<<<< HEAD
                    $typeClass = new ReflectionClass($_type);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        $e->getCode(),
=======
                    $typeClass = new \ReflectionClass($_type);
                    // @codeCoverageIgnoreStart
                } catch (\ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                foreach ($this->getClassMethods($_type) as $method) {
<<<<<<< HEAD
                    if (in_array($method, $interfaceMethods, true)) {
                        throw new RuntimeException(
                            sprintf(
=======
                    if (\in_array($method, $interfaceMethods, true)) {
                        throw new RuntimeException(
                            \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                'Duplicate method "%s" not allowed.',
                                $method
                            )
                        );
                    }

                    try {
                        $methodReflection = $typeClass->getMethod($method);
                        // @codeCoverageIgnoreStart
<<<<<<< HEAD
                    } catch (ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            $e->getCode(),
=======
                    } catch (\ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            $e
                        );
                    }
                    // @codeCoverageIgnoreEnd

                    if ($this->canMockMethod($methodReflection)) {
                        $mockMethods->addMethods(
                            MockMethod::fromReflection($methodReflection, $callOriginalMethods, $cloneArguments)
                        );

                        $interfaceMethods[] = $method;
                    }
                }
            }

            unset($interfaceMethods);
        }

        $mockClassName = $this->generateClassName(
            $type,
            $mockClassName,
            'Mock_'
        );

<<<<<<< HEAD
        if (class_exists($mockClassName['fullClassName'], $callAutoload)) {
            $isClass = true;
        } elseif (interface_exists($mockClassName['fullClassName'], $callAutoload)) {
=======
        if (\class_exists($mockClassName['fullClassName'], $callAutoload)) {
            $isClass = true;
        } elseif (\interface_exists($mockClassName['fullClassName'], $callAutoload)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $isInterface = true;
        }

        if (!$isClass && !$isInterface) {
            $prologue = 'class ' . $mockClassName['originalClassName'] . "\n{\n}\n\n";

            if (!empty($mockClassName['namespaceName'])) {
                $prologue = 'namespace ' . $mockClassName['namespaceName'] .
                            " {\n\n" . $prologue . "}\n\n" .
                            "namespace {\n\n";

                $epilogue = "\n\n}";
            }

            $mockedCloneMethod = true;
        } else {
            try {
<<<<<<< HEAD
                $class = new ReflectionClass($mockClassName['fullClassName']);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    $e->getCode(),
=======
                $class = new \ReflectionClass($mockClassName['fullClassName']);
                // @codeCoverageIgnoreStart
            } catch (\ReflectionException $e) {
                throw new RuntimeException(
                    $e->getMessage(),
                    (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            if ($class->isFinal()) {
                throw new RuntimeException(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'Class "%s" is declared "final" and cannot be mocked.',
                        $mockClassName['fullClassName']
                    )
                );
            }

            // @see https://github.com/sebastianbergmann/phpunit/issues/2995
<<<<<<< HEAD
            if ($isInterface && $class->implementsInterface(Throwable::class)) {
                $actualClassName        = Exception::class;
=======
            if ($isInterface && $class->implementsInterface(\Throwable::class)) {
                $actualClassName        = \Exception::class;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $additionalInterfaces[] = $class->getName();
                $isInterface            = false;

                try {
<<<<<<< HEAD
                    $class = new ReflectionClass($actualClassName);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        $e->getCode(),
=======
                    $class = new \ReflectionClass($actualClassName);
                    // @codeCoverageIgnoreStart
                } catch (\ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                foreach ($this->userDefinedInterfaceMethods($mockClassName['fullClassName']) as $method) {
                    $methodName = $method->getName();

                    if ($class->hasMethod($methodName)) {
                        try {
                            $classMethod = $class->getMethod($methodName);
                            // @codeCoverageIgnoreStart
<<<<<<< HEAD
                        } catch (ReflectionException $e) {
                            throw new RuntimeException(
                                $e->getMessage(),
                                $e->getCode(),
=======
                        } catch (\ReflectionException $e) {
                            throw new RuntimeException(
                                $e->getMessage(),
                                (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                $e
                            );
                        }
                        // @codeCoverageIgnoreEnd

                        if (!$this->canMockMethod($classMethod)) {
                            continue;
                        }
                    }

                    $mockMethods->addMethods(
                        MockMethod::fromReflection($method, $callOriginalMethods, $cloneArguments)
                    );
                }

                $mockClassName = $this->generateClassName(
                    $actualClassName,
                    $mockClassName['className'],
                    'Mock_'
                );
            }

            // @see https://github.com/sebastianbergmann/phpunit-mock-objects/issues/103
<<<<<<< HEAD
            if ($isInterface && $class->implementsInterface(Traversable::class) &&
                !$class->implementsInterface(Iterator::class) &&
                !$class->implementsInterface(IteratorAggregate::class)) {
                $additionalInterfaces[] = Iterator::class;

                $mockMethods->addMethods(
                    ...$this->mockClassMethods(Iterator::class, $callOriginalMethods, $cloneArguments)
=======
            if ($isInterface && $class->implementsInterface(\Traversable::class) &&
                !$class->implementsInterface(\Iterator::class) &&
                !$class->implementsInterface(\IteratorAggregate::class)) {
                $additionalInterfaces[] = \Iterator::class;

                $mockMethods->addMethods(
                    ...$this->mockClassMethods(\Iterator::class, $callOriginalMethods, $cloneArguments)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                );
            }

            if ($class->hasMethod('__clone')) {
                try {
                    $cloneMethod = $class->getMethod('__clone');
                    // @codeCoverageIgnoreStart
<<<<<<< HEAD
                } catch (ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        $e->getCode(),
=======
                } catch (\ReflectionException $e) {
                    throw new RuntimeException(
                        $e->getMessage(),
                        (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                if (!$cloneMethod->isFinal()) {
                    if ($callOriginalClone && !$isInterface) {
                        $unmockedCloneMethod = true;
                    } else {
                        $mockedCloneMethod = true;
                    }
                }
            } else {
                $mockedCloneMethod = true;
            }
        }

        if ($isClass && $explicitMethods === []) {
            $mockMethods->addMethods(
                ...$this->mockClassMethods($mockClassName['fullClassName'], $callOriginalMethods, $cloneArguments)
            );
        }

        if ($isInterface && ($explicitMethods === [] || $explicitMethods === null)) {
            $mockMethods->addMethods(
                ...$this->mockInterfaceMethods($mockClassName['fullClassName'], $cloneArguments)
            );
        }

<<<<<<< HEAD
        if (is_array($explicitMethods)) {
=======
        if (\is_array($explicitMethods)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            foreach ($explicitMethods as $methodName) {
                if ($class !== null && $class->hasMethod($methodName)) {
                    try {
                        $method = $class->getMethod($methodName);
                        // @codeCoverageIgnoreStart
<<<<<<< HEAD
                    } catch (ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            $e->getCode(),
=======
                    } catch (\ReflectionException $e) {
                        throw new RuntimeException(
                            $e->getMessage(),
                            (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            $e
                        );
                    }
                    // @codeCoverageIgnoreEnd

                    if ($this->canMockMethod($method)) {
                        $mockMethods->addMethods(
                            MockMethod::fromReflection($method, $callOriginalMethods, $cloneArguments)
                        );
                    }
                } else {
                    $mockMethods->addMethods(
                        MockMethod::fromName(
                            $mockClassName['fullClassName'],
                            $methodName,
                            $cloneArguments
                        )
                    );
                }
            }
        }

        $mockedMethods = '';
        $configurable  = [];

        foreach ($mockMethods->asArray() as $mockMethod) {
            $mockedMethods .= $mockMethod->generateCode();
            $configurable[] = new ConfigurableMethod($mockMethod->getName(), $mockMethod->getReturnType());
        }

        $method = '';

        if (!$mockMethods->hasMethod('method') && (!isset($class) || !$class->hasMethod('method'))) {
<<<<<<< HEAD
            $method = PHP_EOL . '    use \PHPUnit\Framework\MockObject\Method;';
=======
            $method = \PHP_EOL . '    use \PHPUnit\Framework\MockObject\Method;';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $cloneTrait = '';

        if ($mockedCloneMethod) {
<<<<<<< HEAD
            $cloneTrait = $this->mockedCloneMethod();
        }

        if ($unmockedCloneMethod) {
            $cloneTrait = $this->unmockedCloneMethod();
=======
            $cloneTrait = \PHP_EOL . '    use \PHPUnit\Framework\MockObject\MockedCloneMethod;';
        }

        if ($unmockedCloneMethod) {
            $cloneTrait = \PHP_EOL . '    use \PHPUnit\Framework\MockObject\UnmockedCloneMethod;';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $classTemplate->setVar(
            [
                'prologue'          => $prologue ?? '',
                'epilogue'          => $epilogue ?? '',
                'class_declaration' => $this->generateMockClassDeclaration(
                    $mockClassName,
                    $isInterface,
                    $additionalInterfaces
                ),
<<<<<<< HEAD
                'clone'           => $cloneTrait,
                'mock_class_name' => $mockClassName['className'],
                'mocked_methods'  => $mockedMethods,
                'method'          => $method,
=======
                'clone'             => $cloneTrait,
                'mock_class_name'   => $mockClassName['className'],
                'mocked_methods'    => $mockedMethods,
                'method'            => $method,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ]
        );

        return new MockClass(
            $classTemplate->render(),
            $mockClassName['className'],
            $configurable
        );
    }

    /**
     * @param array|string $type
     */
    private function generateClassName($type, string $className, string $prefix): array
    {
<<<<<<< HEAD
        if (is_array($type)) {
            $type = implode('_', $type);
        }

        if ($type[0] === '\\') {
            $type = substr($type, 1);
        }

        $classNameParts = explode('\\', $type);

        if (count($classNameParts) > 1) {
            $type          = array_pop($classNameParts);
            $namespaceName = implode('\\', $classNameParts);
=======
        if (\is_array($type)) {
            $type = \implode('_', $type);
        }

        if ($type[0] === '\\') {
            $type = \substr($type, 1);
        }

        $classNameParts = \explode('\\', $type);

        if (\count($classNameParts) > 1) {
            $type          = \array_pop($classNameParts);
            $namespaceName = \implode('\\', $classNameParts);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $fullClassName = $namespaceName . '\\' . $type;
        } else {
            $namespaceName = '';
            $fullClassName = $type;
        }

        if ($className === '') {
            do {
                $className = $prefix . $type . '_' .
<<<<<<< HEAD
                             substr(md5((string) mt_rand()), 0, 8);
            } while (class_exists($className, false));
=======
                             \substr(\md5((string) \mt_rand()), 0, 8);
            } while (\class_exists($className, false));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return [
            'className'         => $className,
            'originalClassName' => $type,
            'fullClassName'     => $fullClassName,
            'namespaceName'     => $namespaceName,
        ];
    }

    private function generateMockClassDeclaration(array $mockClassName, bool $isInterface, array $additionalInterfaces = []): string
    {
        $buffer = 'class ';

        $additionalInterfaces[] = MockObject::class;
<<<<<<< HEAD
        $interfaces             = implode(', ', $additionalInterfaces);

        if ($isInterface) {
            $buffer .= sprintf(
=======
        $interfaces             = \implode(', ', $additionalInterfaces);

        if ($isInterface) {
            $buffer .= \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                '%s implements %s',
                $mockClassName['className'],
                $interfaces
            );

<<<<<<< HEAD
            if (!in_array($mockClassName['originalClassName'], $additionalInterfaces, true)) {
=======
            if (!\in_array($mockClassName['originalClassName'], $additionalInterfaces, true)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $buffer .= ', ';

                if (!empty($mockClassName['namespaceName'])) {
                    $buffer .= $mockClassName['namespaceName'] . '\\';
                }

                $buffer .= $mockClassName['originalClassName'];
            }
        } else {
<<<<<<< HEAD
            $buffer .= sprintf(
=======
            $buffer .= \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                '%s extends %s%s implements %s',
                $mockClassName['className'],
                !empty($mockClassName['namespaceName']) ? $mockClassName['namespaceName'] . '\\' : '',
                $mockClassName['originalClassName'],
                $interfaces
            );
        }

        return $buffer;
    }

<<<<<<< HEAD
    private function canMockMethod(ReflectionMethod $method): bool
=======
    private function canMockMethod(\ReflectionMethod $method): bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return !($this->isConstructor($method) || $method->isFinal() || $method->isPrivate() || $this->isMethodNameBlacklisted($method->getName()));
    }

    private function isMethodNameBlacklisted(string $name): bool
    {
        return isset(self::BLACKLISTED_METHOD_NAMES[$name]);
    }

<<<<<<< HEAD
    private function getTemplate(string $template): Text_Template
    {
        $filename = __DIR__ . DIRECTORY_SEPARATOR . 'Generator' . DIRECTORY_SEPARATOR . $template;

        if (!isset(self::$templates[$filename])) {
            self::$templates[$filename] = new Text_Template($filename);
=======
    private function getTemplate(string $template): \Text_Template
    {
        $filename = __DIR__ . \DIRECTORY_SEPARATOR . 'Generator' . \DIRECTORY_SEPARATOR . $template;

        if (!isset(self::$templates[$filename])) {
            self::$templates[$filename] = new \Text_Template($filename);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return self::$templates[$filename];
    }

    /**
     * @see https://github.com/sebastianbergmann/phpunit/issues/4139#issuecomment-605409765
     */
<<<<<<< HEAD
    private function isConstructor(ReflectionMethod $method): bool
    {
        $methodName = strtolower($method->getName());
=======
    private function isConstructor(\ReflectionMethod $method): bool
    {
        $methodName = \strtolower($method->getName());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($methodName === '__construct') {
            return true;
        }

<<<<<<< HEAD
        if (PHP_MAJOR_VERSION >= 8) {
            return false;
        }

        $className = strtolower($method->getDeclaringClass()->getName());

        return $methodName === $className;
    }

    private function mockedCloneMethod(): string
    {
        if (PHP_MAJOR_VERSION >= 8) {
            if (!trait_exists('\PHPUnit\Framework\MockObject\MockedCloneMethodWithVoidReturnType')) {
                eval(self::MOCKED_CLONE_METHOD_WITH_VOID_RETURN_TYPE_TRAIT);
            }

            return PHP_EOL . '    use \PHPUnit\Framework\MockObject\MockedCloneMethodWithVoidReturnType;';
        }

        if (!trait_exists('\PHPUnit\Framework\MockObject\MockedCloneMethodWithoutReturnType')) {
            eval(self::MOCKED_CLONE_METHOD_WITHOUT_RETURN_TYPE_TRAIT);
        }

        return PHP_EOL . '    use \PHPUnit\Framework\MockObject\MockedCloneMethodWithoutReturnType;';
    }

    private function unmockedCloneMethod(): string
    {
        if (PHP_MAJOR_VERSION >= 8) {
            if (!trait_exists('\PHPUnit\Framework\MockObject\UnmockedCloneMethodWithVoidReturnType')) {
                eval(self::UNMOCKED_CLONE_METHOD_WITH_VOID_RETURN_TYPE_TRAIT);
            }

            return PHP_EOL . '    use \PHPUnit\Framework\MockObject\UnmockedCloneMethodWithVoidReturnType;';
        }

        if (!trait_exists('\PHPUnit\Framework\MockObject\UnmockedCloneMethodWithoutReturnType')) {
            eval(self::UNMOCKED_CLONE_METHOD_WITHOUT_RETURN_TYPE_TRAIT);
        }

        return PHP_EOL . '    use \PHPUnit\Framework\MockObject\UnmockedCloneMethodWithoutReturnType;';
    }
=======
        if (\PHP_MAJOR_VERSION >= 8) {
            return false;
        }

        $className  = \strtolower($method->getDeclaringClass()->getName());

        return $methodName === $className;
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
