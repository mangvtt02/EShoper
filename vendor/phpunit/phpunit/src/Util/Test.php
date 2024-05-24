<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

<<<<<<< HEAD
use const PHP_OS;
use const PHP_VERSION;
use function addcslashes;
use function array_flip;
use function array_key_exists;
use function array_keys;
use function array_merge;
use function array_unique;
use function array_unshift;
use function class_exists;
use function class_implements;
use function class_parents;
use function count;
use function explode;
use function extension_loaded;
use function function_exists;
use function get_class;
use function ini_get;
use function interface_exists;
use function is_array;
use function is_int;
use function method_exists;
use function phpversion;
use function preg_match;
use function preg_replace;
use function range;
use function sprintf;
use function str_replace;
use function strncmp;
use function strpos;
use function trait_exists;
use function version_compare;
=======
use PHPUnit\Framework\Assert;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\CodeCoverageException;
use PHPUnit\Framework\InvalidCoversTargetException;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Warning;
use PHPUnit\Runner\Version;
use PHPUnit\Util\Annotation\Registry;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionException;
use ReflectionFunction;
use ReflectionMethod;
use SebastianBergmann\Environment\OperatingSystem;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use SebastianBergmann\Environment\OperatingSystem;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Test
{
    /**
     * @var int
     */
    public const UNKNOWN = -1;

    /**
     * @var int
     */
    public const SMALL = 0;

    /**
     * @var int
     */
    public const MEDIUM = 1;

    /**
     * @var int
     */
    public const LARGE = 2;

    /**
     * @var array
     */
    private static $hookMethods = [];

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public static function describe(\PHPUnit\Framework\Test $test): array
    {
        if ($test instanceof TestCase) {
<<<<<<< HEAD
            return [get_class($test), $test->getName()];
=======
            return [\get_class($test), $test->getName()];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($test instanceof SelfDescribing) {
            return ['', $test->toString()];
        }

<<<<<<< HEAD
        return ['', get_class($test)];
=======
        return ['', \get_class($test)];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public static function describeAsString(\PHPUnit\Framework\Test $test): string
    {
        if ($test instanceof SelfDescribing) {
            return $test->toString();
        }

<<<<<<< HEAD
        return get_class($test);
=======
        return \get_class($test);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @throws CodeCoverageException
     *
     * @return array|bool
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $className
     */
    public static function getLinesToBeCovered(string $className, string $methodName)
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        if (!self::shouldCoversAnnotationBeUsed($annotations)) {
            return false;
        }

        return self::getLinesToBeCoveredOrUsed($className, $methodName, 'covers');
    }

    /**
     * Returns lines of code specified with the @uses annotation.
     *
     * @throws CodeCoverageException
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $className
     */
    public static function getLinesToBeUsed(string $className, string $methodName): array
    {
        return self::getLinesToBeCoveredOrUsed($className, $methodName, 'uses');
    }

    public static function requiresCodeCoverageDataCollection(TestCase $test): bool
    {
        $annotations = $test->getAnnotations();

        // If there is no @covers annotation but a @coversNothing annotation on
        // the test method then code coverage data does not need to be collected
        if (isset($annotations['method']['coversNothing'])) {
            return false;
        }

        // If there is at least one @covers annotation then
        // code coverage data needs to be collected
        if (isset($annotations['method']['covers'])) {
            return true;
        }

        // If there is no @covers annotation but a @coversNothing annotation
        // then code coverage data does not need to be collected
        if (isset($annotations['class']['coversNothing'])) {
            return false;
        }

        // If there is no @coversNothing annotation then
        // code coverage data may be collected
        return true;
    }

    /**
     * @throws Exception
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $className
     */
    public static function getRequirements(string $className, string $methodName): array
    {
        return self::mergeArraysRecursively(
            Registry::getInstance()->forClassName($className)->requirements(),
            Registry::getInstance()->forMethod($className, $methodName)->requirements()
        );
    }

    /**
     * Returns the missing requirements for a test.
     *
     * @throws Exception
     * @throws Warning
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $className
     */
    public static function getMissingRequirements(string $className, string $methodName): array
    {
<<<<<<< HEAD
        $required = self::getRequirements($className, $methodName);
=======
        $required = static::getRequirements($className, $methodName);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $missing  = [];
        $hint     = null;

        if (!empty($required['PHP'])) {
            $operator = new VersionComparisonOperator(empty($required['PHP']['operator']) ? '>=' : $required['PHP']['operator']);

<<<<<<< HEAD
            if (!version_compare(PHP_VERSION, $required['PHP']['version'], $operator->asString())) {
                $missing[] = sprintf('PHP %s %s is required.', $operator->asString(), $required['PHP']['version']);
                $hint      = 'PHP';
            }
        } elseif (!empty($required['PHP_constraint'])) {
            $version = new \PharIo\Version\Version(self::sanitizeVersionNumber(PHP_VERSION));

            if (!$required['PHP_constraint']['constraint']->complies($version)) {
                $missing[] = sprintf(
=======
            if (!\version_compare(\PHP_VERSION, $required['PHP']['version'], $operator->asString())) {
                $missing[] = \sprintf('PHP %s %s is required.', $operator->asString(), $required['PHP']['version']);
                $hint      = 'PHP';
            }
        } elseif (!empty($required['PHP_constraint'])) {
            $version = new \PharIo\Version\Version(self::sanitizeVersionNumber(\PHP_VERSION));

            if (!$required['PHP_constraint']['constraint']->complies($version)) {
                $missing[] = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'PHP version does not match the required constraint %s.',
                    $required['PHP_constraint']['constraint']->asString()
                );

                $hint = 'PHP_constraint';
            }
        }

        if (!empty($required['PHPUnit'])) {
            $phpunitVersion = Version::id();

            $operator = new VersionComparisonOperator(empty($required['PHPUnit']['operator']) ? '>=' : $required['PHPUnit']['operator']);

<<<<<<< HEAD
            if (!version_compare($phpunitVersion, $required['PHPUnit']['version'], $operator->asString())) {
                $missing[] = sprintf('PHPUnit %s %s is required.', $operator->asString(), $required['PHPUnit']['version']);
=======
            if (!\version_compare($phpunitVersion, $required['PHPUnit']['version'], $operator->asString())) {
                $missing[] = \sprintf('PHPUnit %s %s is required.', $operator->asString(), $required['PHPUnit']['version']);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $hint      = $hint ?? 'PHPUnit';
            }
        } elseif (!empty($required['PHPUnit_constraint'])) {
            $phpunitVersion = new \PharIo\Version\Version(self::sanitizeVersionNumber(Version::id()));

            if (!$required['PHPUnit_constraint']['constraint']->complies($phpunitVersion)) {
<<<<<<< HEAD
                $missing[] = sprintf(
=======
                $missing[] = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'PHPUnit version does not match the required constraint %s.',
                    $required['PHPUnit_constraint']['constraint']->asString()
                );

                $hint = $hint ?? 'PHPUnit_constraint';
            }
        }

        if (!empty($required['OSFAMILY']) && $required['OSFAMILY'] !== (new OperatingSystem)->getFamily()) {
<<<<<<< HEAD
            $missing[] = sprintf('Operating system %s is required.', $required['OSFAMILY']);
=======
            $missing[] = \sprintf('Operating system %s is required.', $required['OSFAMILY']);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $hint      = $hint ?? 'OSFAMILY';
        }

        if (!empty($required['OS'])) {
<<<<<<< HEAD
            $requiredOsPattern = sprintf('/%s/i', addcslashes($required['OS'], '/'));

            if (!preg_match($requiredOsPattern, PHP_OS)) {
                $missing[] = sprintf('Operating system matching %s is required.', $requiredOsPattern);
=======
            $requiredOsPattern = \sprintf('/%s/i', \addcslashes($required['OS'], '/'));

            if (!\preg_match($requiredOsPattern, \PHP_OS)) {
                $missing[] = \sprintf('Operating system matching %s is required.', $requiredOsPattern);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $hint      = $hint ?? 'OS';
            }
        }

        if (!empty($required['functions'])) {
            foreach ($required['functions'] as $function) {
<<<<<<< HEAD
                $pieces = explode('::', $function);

                if (count($pieces) === 2 && class_exists($pieces[0]) && method_exists($pieces[0], $pieces[1])) {
                    continue;
                }

                if (function_exists($function)) {
                    continue;
                }

                $missing[] = sprintf('Function %s is required.', $function);
=======
                $pieces = \explode('::', $function);

                if (\count($pieces) === 2 && \class_exists($pieces[0]) && \method_exists($pieces[0], $pieces[1])) {
                    continue;
                }

                if (\function_exists($function)) {
                    continue;
                }

                $missing[] = \sprintf('Function %s is required.', $function);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $hint      = $hint ?? 'function_' . $function;
            }
        }

        if (!empty($required['setting'])) {
            foreach ($required['setting'] as $setting => $value) {
<<<<<<< HEAD
                if (ini_get($setting) !== $value) {
                    $missing[] = sprintf('Setting "%s" must be "%s".', $setting, $value);
=======
                if (\ini_get($setting) !== $value) {
                    $missing[] = \sprintf('Setting "%s" must be "%s".', $setting, $value);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $hint      = $hint ?? '__SETTING_' . $setting;
                }
            }
        }

        if (!empty($required['extensions'])) {
            foreach ($required['extensions'] as $extension) {
                if (isset($required['extension_versions'][$extension])) {
                    continue;
                }

<<<<<<< HEAD
                if (!extension_loaded($extension)) {
                    $missing[] = sprintf('Extension %s is required.', $extension);
=======
                if (!\extension_loaded($extension)) {
                    $missing[] = \sprintf('Extension %s is required.', $extension);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $hint      = $hint ?? 'extension_' . $extension;
                }
            }
        }

        if (!empty($required['extension_versions'])) {
            foreach ($required['extension_versions'] as $extension => $req) {
<<<<<<< HEAD
                $actualVersion = phpversion($extension);

                $operator = new VersionComparisonOperator(empty($req['operator']) ? '>=' : $req['operator']);

                if ($actualVersion === false || !version_compare($actualVersion, $req['version'], $operator->asString())) {
                    $missing[] = sprintf('Extension %s %s %s is required.', $extension, $operator->asString(), $req['version']);
=======
                $actualVersion = \phpversion($extension);

                $operator = new VersionComparisonOperator(empty($req['operator']) ? '>=' : $req['operator']);

                if ($actualVersion === false || !\version_compare($actualVersion, $req['version'], $operator->asString())) {
                    $missing[] = \sprintf('Extension %s %s %s is required.', $extension, $operator->asString(), $req['version']);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $hint      = $hint ?? 'extension_' . $extension;
                }
            }
        }

        if ($hint && isset($required['__OFFSET'])) {
<<<<<<< HEAD
            array_unshift($missing, '__OFFSET_FILE=' . $required['__OFFSET']['__FILE']);
            array_unshift($missing, '__OFFSET_LINE=' . ($required['__OFFSET'][$hint] ?? 1));
=======
            \array_unshift($missing, '__OFFSET_FILE=' . $required['__OFFSET']['__FILE']);
            \array_unshift($missing, '__OFFSET_LINE=' . ($required['__OFFSET'][$hint] ?? 1));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $missing;
    }

    /**
     * Returns the expected exception for a test.
     *
     * @return array|false
     *
     * @deprecated
<<<<<<< HEAD
     *
     * @codeCoverageIgnore
     *
=======
     * @codeCoverageIgnore
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $className
     */
    public static function getExpectedException(string $className, string $methodName)
    {
        return Registry::getInstance()->forMethod($className, $methodName)->expectedException();
    }

    /**
     * Returns the provided data for a method.
     *
     * @throws Exception
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $className
     */
    public static function getProvidedData(string $className, string $methodName): ?array
    {
        return Registry::getInstance()->forMethod($className, $methodName)->getProvidedData();
    }

    /**
     * @psalm-param class-string $className
     */
    public static function parseTestMethodAnnotations(string $className, ?string $methodName = ''): array
    {
        $registry = Registry::getInstance();

        if ($methodName !== null) {
            try {
                return [
                    'method' => $registry->forMethod($className, $methodName)->symbolAnnotations(),
                    'class'  => $registry->forClassName($className)->symbolAnnotations(),
                ];
            } catch (Exception $methodNotFound) {
                // ignored
            }
        }

        return [
            'method' => null,
            'class'  => $registry->forClassName($className)->symbolAnnotations(),
        ];
    }

    /**
     * @psalm-param class-string $className
     */
    public static function getInlineAnnotations(string $className, string $methodName): array
    {
        return Registry::getInstance()->forMethod($className, $methodName)->getInlineAnnotations();
    }

    /** @psalm-param class-string $className */
    public static function getBackupSettings(string $className, string $methodName): array
    {
        return [
            'backupGlobals' => self::getBooleanAnnotationSetting(
                $className,
                $methodName,
                'backupGlobals'
            ),
            'backupStaticAttributes' => self::getBooleanAnnotationSetting(
                $className,
                $methodName,
                'backupStaticAttributes'
            ),
        ];
    }

    /** @psalm-param class-string $className */
    public static function getDependencies(string $className, string $methodName): array
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $dependencies = $annotations['class']['depends'] ?? [];

        if (isset($annotations['method']['depends'])) {
<<<<<<< HEAD
            $dependencies = array_merge(
=======
            $dependencies = \array_merge(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $dependencies,
                $annotations['method']['depends']
            );
        }

<<<<<<< HEAD
        return array_unique($dependencies);
=======
        return \array_unique($dependencies);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /** @psalm-param class-string $className */
    public static function getGroups(string $className, ?string $methodName = ''): array
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $groups = [];

        if (isset($annotations['method']['author'])) {
            $groups[] = $annotations['method']['author'];
        } elseif (isset($annotations['class']['author'])) {
            $groups[] = $annotations['class']['author'];
        }

        if (isset($annotations['class']['group'])) {
            $groups[] = $annotations['class']['group'];
        }

        if (isset($annotations['method']['group'])) {
            $groups[] = $annotations['method']['group'];
        }

        if (isset($annotations['class']['ticket'])) {
            $groups[] = $annotations['class']['ticket'];
        }

        if (isset($annotations['method']['ticket'])) {
            $groups[] = $annotations['method']['ticket'];
        }

        foreach (['method', 'class'] as $element) {
            foreach (['small', 'medium', 'large'] as $size) {
                if (isset($annotations[$element][$size])) {
                    $groups[] = [$size];

                    break 2;
                }
            }
        }

<<<<<<< HEAD
        return array_unique(array_merge([], ...$groups));
=======
        return \array_unique(\array_merge([], ...$groups));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /** @psalm-param class-string $className */
    public static function getSize(string $className, ?string $methodName): int
    {
<<<<<<< HEAD
        $groups = array_flip(self::getGroups($className, $methodName));
=======
        $groups = \array_flip(self::getGroups($className, $methodName));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if (isset($groups['large'])) {
            return self::LARGE;
        }

        if (isset($groups['medium'])) {
            return self::MEDIUM;
        }

        if (isset($groups['small'])) {
            return self::SMALL;
        }

        return self::UNKNOWN;
    }

    /** @psalm-param class-string $className */
    public static function getProcessIsolationSettings(string $className, string $methodName): bool
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        return isset($annotations['class']['runTestsInSeparateProcesses']) || isset($annotations['method']['runInSeparateProcess']);
    }

    /** @psalm-param class-string $className */
    public static function getClassProcessIsolationSettings(string $className, string $methodName): bool
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        return isset($annotations['class']['runClassInSeparateProcess']);
    }

    /** @psalm-param class-string $className */
    public static function getPreserveGlobalStateSettings(string $className, string $methodName): ?bool
    {
        return self::getBooleanAnnotationSetting(
            $className,
            $methodName,
            'preserveGlobalState'
        );
    }

    /** @psalm-param class-string $className */
    public static function getHookMethods(string $className): array
    {
<<<<<<< HEAD
        if (!class_exists($className, false)) {
=======
        if (!\class_exists($className, false)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return self::emptyHookMethodsArray();
        }

        if (!isset(self::$hookMethods[$className])) {
            self::$hookMethods[$className] = self::emptyHookMethodsArray();

            try {
<<<<<<< HEAD
                foreach ((new Reflection)->methodsInTestClass(new ReflectionClass($className)) as $method) {
=======
                foreach ((new \ReflectionClass($className))->getMethods() as $method) {
                    if ($method->getDeclaringClass()->getName() === Assert::class) {
                        continue;
                    }

                    if ($method->getDeclaringClass()->getName() === TestCase::class) {
                        continue;
                    }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $docBlock = Registry::getInstance()->forMethod($className, $method->getName());

                    if ($method->isStatic()) {
                        if ($docBlock->isHookToBeExecutedBeforeClass()) {
<<<<<<< HEAD
                            array_unshift(
=======
                            \array_unshift(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                self::$hookMethods[$className]['beforeClass'],
                                $method->getName()
                            );
                        }

                        if ($docBlock->isHookToBeExecutedAfterClass()) {
                            self::$hookMethods[$className]['afterClass'][] = $method->getName();
                        }
                    }

                    if ($docBlock->isToBeExecutedBeforeTest()) {
<<<<<<< HEAD
                        array_unshift(
=======
                        \array_unshift(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            self::$hookMethods[$className]['before'],
                            $method->getName()
                        );
                    }

                    if ($docBlock->isToBeExecutedAfterTest()) {
                        self::$hookMethods[$className]['after'][] = $method->getName();
                    }
                }
<<<<<<< HEAD
            } catch (ReflectionException $e) {
=======
            } catch (\ReflectionException $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        return self::$hookMethods[$className];
    }

<<<<<<< HEAD
    public static function isTestMethod(ReflectionMethod $method): bool
    {
        if (!$method->isPublic()) {
            return false;
        }

        if (strpos($method->getName(), 'test') === 0) {
            return true;
        }

        return array_key_exists(
=======
    public static function isTestMethod(\ReflectionMethod $method): bool
    {
        if (\strpos($method->getName(), 'test') === 0) {
            return true;
        }

        return \array_key_exists(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'test',
            Registry::getInstance()->forMethod(
                $method->getDeclaringClass()->getName(),
                $method->getName()
            )
<<<<<<< HEAD
                ->symbolAnnotations()
=======
            ->symbolAnnotations()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );
    }

    /**
     * @throws CodeCoverageException
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-param class-string $className
     */
    private static function getLinesToBeCoveredOrUsed(string $className, string $methodName, string $mode): array
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $classShortcut = null;

        if (!empty($annotations['class'][$mode . 'DefaultClass'])) {
<<<<<<< HEAD
            if (count($annotations['class'][$mode . 'DefaultClass']) > 1) {
                throw new CodeCoverageException(
                    sprintf(
=======
            if (\count($annotations['class'][$mode . 'DefaultClass']) > 1) {
                throw new CodeCoverageException(
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'More than one @%sClass annotation in class or interface "%s".',
                        $mode,
                        $className
                    )
                );
            }

            $classShortcut = $annotations['class'][$mode . 'DefaultClass'][0];
        }

        $list = $annotations['class'][$mode] ?? [];

        if (isset($annotations['method'][$mode])) {
<<<<<<< HEAD
            $list = array_merge($list, $annotations['method'][$mode]);
=======
            $list = \array_merge($list, $annotations['method'][$mode]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $codeList = [];

<<<<<<< HEAD
        foreach (array_unique($list) as $element) {
            if ($classShortcut && strncmp($element, '::', 2) === 0) {
                $element = $classShortcut . $element;
            }

            $element = preg_replace('/[\s()]+$/', '', $element);
            $element = explode(' ', $element);
            $element = $element[0];

            if ($mode === 'covers' && interface_exists($element)) {
                throw new InvalidCoversTargetException(
                    sprintf(
=======
        foreach (\array_unique($list) as $element) {
            if ($classShortcut && \strncmp($element, '::', 2) === 0) {
                $element = $classShortcut . $element;
            }

            $element = \preg_replace('/[\s()]+$/', '', $element);
            $element = \explode(' ', $element);
            $element = $element[0];

            if ($mode === 'covers' && \interface_exists($element)) {
                throw new InvalidCoversTargetException(
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'Trying to @cover interface "%s".',
                        $element
                    )
                );
            }

            $codeList[] = self::resolveElementToReflectionObjects($element);
        }

<<<<<<< HEAD
        return self::resolveReflectionObjectsToLines(array_merge([], ...$codeList));
=======
        return self::resolveReflectionObjectsToLines(\array_merge([], ...$codeList));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    private static function emptyHookMethodsArray(): array
    {
        return [
            'beforeClass' => ['setUpBeforeClass'],
            'before'      => ['setUp'],
            'after'       => ['tearDown'],
            'afterClass'  => ['tearDownAfterClass'],
        ];
    }

    /** @psalm-param class-string $className */
    private static function getBooleanAnnotationSetting(string $className, ?string $methodName, string $settingName): ?bool
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        if (isset($annotations['method'][$settingName])) {
            if ($annotations['method'][$settingName][0] === 'enabled') {
                return true;
            }

            if ($annotations['method'][$settingName][0] === 'disabled') {
                return false;
            }
        }

        if (isset($annotations['class'][$settingName])) {
            if ($annotations['class'][$settingName][0] === 'enabled') {
                return true;
            }

            if ($annotations['class'][$settingName][0] === 'disabled') {
                return false;
            }
        }

        return null;
    }

    /**
     * @throws InvalidCoversTargetException
     */
    private static function resolveElementToReflectionObjects(string $element): array
    {
        $codeToCoverList = [];

<<<<<<< HEAD
        if (function_exists($element) && strpos($element, '\\') !== false) {
            try {
                $codeToCoverList[] = new ReflectionFunction($element);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
=======
        if (\function_exists($element) && \strpos($element, '\\') !== false) {
            try {
                $codeToCoverList[] = new \ReflectionFunction($element);
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
        } elseif (strpos($element, '::') !== false) {
            [$className, $methodName] = explode('::', $element);
=======
        } elseif (\strpos($element, '::') !== false) {
            [$className, $methodName] = \explode('::', $element);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if (isset($methodName[0]) && $methodName[0] === '<') {
                $classes = [$className];

                foreach ($classes as $className) {
<<<<<<< HEAD
                    if (!class_exists($className) &&
                        !interface_exists($className) &&
                        !trait_exists($className)) {
                        throw new InvalidCoversTargetException(
                            sprintf(
=======
                    if (!\class_exists($className) &&
                        !\interface_exists($className) &&
                        !\trait_exists($className)) {
                        throw new InvalidCoversTargetException(
                            \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                'Trying to @cover or @use not existing class or ' .
                                'interface "%s".',
                                $className
                            )
                        );
                    }

                    try {
<<<<<<< HEAD
                        $methods = (new ReflectionClass($className))->getMethods();
                        // @codeCoverageIgnoreStart
                    } catch (ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            $e->getCode(),
=======
                        $methods = (new \ReflectionClass($className))->getMethods();
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

                    $inverse    = isset($methodName[1]) && $methodName[1] === '!';
                    $visibility = 'isPublic';

<<<<<<< HEAD
                    if (strpos($methodName, 'protected')) {
                        $visibility = 'isProtected';
                    } elseif (strpos($methodName, 'private')) {
=======
                    if (\strpos($methodName, 'protected')) {
                        $visibility = 'isProtected';
                    } elseif (\strpos($methodName, 'private')) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $visibility = 'isPrivate';
                    }

                    foreach ($methods as $method) {
<<<<<<< HEAD
                        if ($inverse && !$method->{$visibility}()) {
                            $codeToCoverList[] = $method;
                        } elseif (!$inverse && $method->{$visibility}()) {
=======
                        if ($inverse && !$method->$visibility()) {
                            $codeToCoverList[] = $method;
                        } elseif (!$inverse && $method->$visibility()) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            $codeToCoverList[] = $method;
                        }
                    }
                }
            } else {
                $classes = [$className];

                foreach ($classes as $className) {
<<<<<<< HEAD
                    if ($className === '' && function_exists($methodName)) {
                        try {
                            $codeToCoverList[] = new ReflectionFunction(
                                $methodName
                            );
                            // @codeCoverageIgnoreStart
                        } catch (ReflectionException $e) {
                            throw new Exception(
                                $e->getMessage(),
                                $e->getCode(),
=======
                    if ($className === '' && \function_exists($methodName)) {
                        try {
                            $codeToCoverList[] = new \ReflectionFunction(
                                $methodName
                            );
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
                    } else {
<<<<<<< HEAD
                        if (!((class_exists($className) || interface_exists($className) || trait_exists($className)) &&
                            method_exists($className, $methodName))) {
                            throw new InvalidCoversTargetException(
                                sprintf(
=======
                        if (!((\class_exists($className) || \interface_exists($className) || \trait_exists($className)) &&
                            \method_exists($className, $methodName))) {
                            throw new InvalidCoversTargetException(
                                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                    'Trying to @cover or @use not existing method "%s::%s".',
                                    $className,
                                    $methodName
                                )
                            );
                        }

                        try {
<<<<<<< HEAD
                            $codeToCoverList[] = new ReflectionMethod(
=======
                            $codeToCoverList[] = new \ReflectionMethod(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                $className,
                                $methodName
                            );
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
                    }
                }
            }
        } else {
            $extended = false;

<<<<<<< HEAD
            if (strpos($element, '<extended>') !== false) {
                $element  = str_replace('<extended>', '', $element);
=======
            if (\strpos($element, '<extended>') !== false) {
                $element  = \str_replace('<extended>', '', $element);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $extended = true;
            }

            $classes = [$element];

            if ($extended) {
<<<<<<< HEAD
                $classes = array_merge(
                    $classes,
                    class_implements($element),
                    class_parents($element)
=======
                $classes = \array_merge(
                    $classes,
                    \class_implements($element),
                    \class_parents($element)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                );
            }

            foreach ($classes as $className) {
<<<<<<< HEAD
                if (!class_exists($className) &&
                    !interface_exists($className) &&
                    !trait_exists($className)) {
                    throw new InvalidCoversTargetException(
                        sprintf(
=======
                if (!\class_exists($className) &&
                    !\interface_exists($className) &&
                    !\trait_exists($className)) {
                    throw new InvalidCoversTargetException(
                        \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            'Trying to @cover or @use not existing class or ' .
                            'interface "%s".',
                            $className
                        )
                    );
                }

                try {
<<<<<<< HEAD
                    $codeToCoverList[] = new ReflectionClass($className);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
=======
                    $codeToCoverList[] = new \ReflectionClass($className);
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
            }
        }

        return $codeToCoverList;
    }

    private static function resolveReflectionObjectsToLines(array $reflectors): array
    {
        $result = [];

        foreach ($reflectors as $reflector) {
<<<<<<< HEAD
            if ($reflector instanceof ReflectionClass) {
=======
            if ($reflector instanceof \ReflectionClass) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                foreach ($reflector->getTraits() as $trait) {
                    $reflectors[] = $trait;
                }
            }
        }

        foreach ($reflectors as $reflector) {
            $filename = $reflector->getFileName();

            if (!isset($result[$filename])) {
                $result[$filename] = [];
            }

<<<<<<< HEAD
            $result[$filename] = array_merge(
                $result[$filename],
                range($reflector->getStartLine(), $reflector->getEndLine())
=======
            $result[$filename] = \array_merge(
                $result[$filename],
                \range($reflector->getStartLine(), $reflector->getEndLine())
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            );
        }

        foreach ($result as $filename => $lineNumbers) {
<<<<<<< HEAD
            $result[$filename] = array_keys(array_flip($lineNumbers));
=======
            $result[$filename] = \array_keys(\array_flip($lineNumbers));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $result;
    }

    /**
     * Trims any extensions from version string that follows after
<<<<<<< HEAD
     * the <major>.<minor>[.<patch>] format.
     */
    private static function sanitizeVersionNumber(string $version)
    {
        return preg_replace(
=======
     * the <major>.<minor>[.<patch>] format
     */
    private static function sanitizeVersionNumber(string $version)
    {
        return \preg_replace(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            '/^(\d+\.\d+(?:.\d+)?).*$/',
            '$1',
            $version
        );
    }

    private static function shouldCoversAnnotationBeUsed(array $annotations): bool
    {
        if (isset($annotations['method']['coversNothing'])) {
            return false;
        }

        if (isset($annotations['method']['covers'])) {
            return true;
        }

        if (isset($annotations['class']['coversNothing'])) {
            return false;
        }

        return true;
    }

    /**
     * Merge two arrays together.
     *
     * If an integer key exists in both arrays and preserveNumericKeys is false, the value
     * from the second array will be appended to the first array. If both values are arrays, they
     * are merged together, else the value of the second array overwrites the one of the first array.
     *
     * This implementation is copied from https://github.com/zendframework/zend-stdlib/blob/76b653c5e99b40eccf5966e3122c90615134ae46/src/ArrayUtils.php
     *
     * Zend Framework (http://framework.zend.com/)
     *
<<<<<<< HEAD
     * @see      http://github.com/zendframework/zf2 for the canonical source repository
=======
     * @link      http://github.com/zendframework/zf2 for the canonical source repository
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
     * @license   http://framework.zend.com/license/new-bsd New BSD License
     */
    private static function mergeArraysRecursively(array $a, array $b): array
    {
        foreach ($b as $key => $value) {
<<<<<<< HEAD
            if (array_key_exists($key, $a)) {
                if (is_int($key)) {
                    $a[] = $value;
                } elseif (is_array($value) && is_array($a[$key])) {
=======
            if (\array_key_exists($key, $a)) {
                if (\is_int($key)) {
                    $a[] = $value;
                } elseif (\is_array($value) && \is_array($a[$key])) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $a[$key] = self::mergeArraysRecursively($a[$key], $value);
                } else {
                    $a[$key] = $value;
                }
            } else {
                $a[$key] = $value;
            }
        }

        return $a;
    }
}
