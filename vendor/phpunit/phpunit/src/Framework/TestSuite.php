<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

<<<<<<< HEAD
use const PHP_EOL;
use function array_keys;
use function array_merge;
use function array_slice;
use function basename;
use function call_user_func;
use function class_exists;
use function count;
use function dirname;
use function file_exists;
use function get_declared_classes;
use function implode;
use function is_bool;
use function is_object;
use function is_string;
use function method_exists;
use function preg_match;
use function preg_quote;
use function sprintf;
use function substr;
use Iterator;
use IteratorAggregate;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\Filter\Factory;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\FileLoader;
<<<<<<< HEAD
use PHPUnit\Util\Reflection;
use PHPUnit\Util\Test as TestUtil;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException;
use SebastianBergmann\CodeCoverage\MissingCoversAnnotationException;
use SebastianBergmann\CodeCoverage\RuntimeException;
use SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException;
use Throwable;

/**
 * @template-implements IteratorAggregate<int, Test>
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class TestSuite implements IteratorAggregate, SelfDescribing, Test
=======
use PHPUnit\Util\Test as TestUtil;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class TestSuite implements \IteratorAggregate, SelfDescribing, Test
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
{
    /**
     * Enable or disable the backup and restoration of the $GLOBALS array.
     *
     * @var bool
     */
    protected $backupGlobals;

    /**
     * Enable or disable the backup and restoration of static attributes.
     *
     * @var bool
     */
    protected $backupStaticAttributes;

    /**
     * @var bool
     */
    protected $runTestInSeparateProcess = false;

    /**
     * The name of the test suite.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The test groups of the test suite.
     *
     * @var array
     */
    protected $groups = [];

    /**
     * The tests in the test suite.
     *
     * @var Test[]
     */
    protected $tests = [];

    /**
     * The number of tests in the test suite.
     *
     * @var int
     */
    protected $numTests = -1;

    /**
     * @var bool
     */
    protected $testCase = false;

    /**
     * @var string[]
     */
    protected $foundClasses = [];

    /**
     * Last count of tests in this suite.
     *
     * @var null|int
     */
    private $cachedNumTests;

    /**
     * @var bool
     */
    private $beStrictAboutChangesToGlobalState;

    /**
     * @var Factory
     */
    private $iteratorFilter;

    /**
<<<<<<< HEAD
     * @var int
     */
    private $declaredClassesPointer;

    /**
     * Constructs a new TestSuite:.
=======
     * @var string[]
     */
    private $declaredClasses;

    /**
     * Constructs a new TestSuite:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     *   - PHPUnit\Framework\TestSuite() constructs an empty TestSuite.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass) constructs a
     *     TestSuite from the given class.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass, String)
     *     constructs a TestSuite from the given class with the given
     *     name.
     *
     *   - PHPUnit\Framework\TestSuite(String) either constructs a
     *     TestSuite from the given class (if the passed string is the
     *     name of an existing class) or constructs an empty TestSuite
     *     with the given name.
     *
<<<<<<< HEAD
     * @param ReflectionClass|string $theClass
=======
     * @param \ReflectionClass|string $theClass
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @throws Exception
     */
    public function __construct($theClass = '', string $name = '')
    {
<<<<<<< HEAD
        if (!is_string($theClass) && !$theClass instanceof ReflectionClass) {
=======
        if (!\is_string($theClass) && !$theClass instanceof \ReflectionClass) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw InvalidArgumentException::create(
                1,
                'ReflectionClass object or string'
            );
        }

<<<<<<< HEAD
        $this->declaredClassesPointer = count(get_declared_classes());

        if (!$theClass instanceof ReflectionClass) {
            if (class_exists($theClass, true)) {
=======
        $this->declaredClasses = \get_declared_classes();

        if (!$theClass instanceof \ReflectionClass) {
            if (\class_exists($theClass, true)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if ($name === '') {
                    $name = $theClass;
                }

                try {
<<<<<<< HEAD
                    $theClass = new ReflectionClass($theClass);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
=======
                    $theClass = new \ReflectionClass($theClass);
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
                $this->setName($theClass);

                return;
            }
        }

        if (!$theClass->isSubclassOf(TestCase::class)) {
            $this->setName((string) $theClass);

            return;
        }

        if ($name !== '') {
            $this->setName($name);
        } else {
            $this->setName($theClass->getName());
        }

        $constructor = $theClass->getConstructor();

        if ($constructor !== null &&
            !$constructor->isPublic()) {
            $this->addTest(
                new WarningTestCase(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'Class "%s" has no public constructor.',
                        $theClass->getName()
                    )
                )
            );

            return;
        }

<<<<<<< HEAD
        foreach ((new Reflection)->publicMethodsInTestClass($theClass) as $method) {
            if (!TestUtil::isTestMethod($method)) {
=======
        foreach ($theClass->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() === Assert::class) {
                continue;
            }

            if ($method->getDeclaringClass()->getName() === TestCase::class) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                continue;
            }

            $this->addTestMethod($theClass, $method);
        }

        if (empty($this->tests)) {
            $this->addTest(
                new WarningTestCase(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'No tests found in class "%s".',
                        $theClass->getName()
                    )
                )
            );
        }

        $this->testCase = true;
    }

    /**
     * Returns a string representation of the test suite.
     */
    public function toString(): string
    {
        return $this->getName();
    }

    /**
     * Adds a test to the suite.
     *
     * @param array $groups
     */
    public function addTest(Test $test, $groups = []): void
    {
        try {
<<<<<<< HEAD
            $class = new ReflectionClass($test);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
=======
            $class = new \ReflectionClass($test);
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

        if (!$class->isAbstract()) {
            $this->tests[]  = $test;
            $this->numTests = -1;

            if ($test instanceof self && empty($groups)) {
                $groups = $test->getGroups();
            }

            if (empty($groups)) {
                $groups = ['default'];
            }

            foreach ($groups as $group) {
                if (!isset($this->groups[$group])) {
                    $this->groups[$group] = [$test];
                } else {
                    $this->groups[$group][] = $test;
                }
            }

            if ($test instanceof TestCase) {
                $test->setGroups($groups);
            }
        }
    }

    /**
     * Adds the tests from the given class to the suite.
     *
     * @param object|string $testClass
     *
     * @throws Exception
     */
    public function addTestSuite($testClass): void
    {
<<<<<<< HEAD
        if (!(is_object($testClass) || (is_string($testClass) && class_exists($testClass)))) {
=======
        if (!(\is_object($testClass) || (\is_string($testClass) && \class_exists($testClass)))) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw InvalidArgumentException::create(
                1,
                'class name or object'
            );
        }

<<<<<<< HEAD
        if (!is_object($testClass)) {
            try {
                $testClass = new ReflectionClass($testClass);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
=======
        if (!\is_object($testClass)) {
            try {
                $testClass = new \ReflectionClass($testClass);
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

        if ($testClass instanceof self) {
            $this->addTest($testClass);
<<<<<<< HEAD
        } elseif ($testClass instanceof ReflectionClass) {
=======
        } elseif ($testClass instanceof \ReflectionClass) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $suiteMethod = false;

            if (!$testClass->isAbstract() && $testClass->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                try {
                    $method = $testClass->getMethod(
                        BaseTestRunner::SUITE_METHODNAME
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

                if ($method->isStatic()) {
                    $this->addTest(
                        $method->invoke(null, $testClass->getName())
                    );

                    $suiteMethod = true;
                }
            }

            if (!$suiteMethod && !$testClass->isAbstract() && $testClass->isSubclassOf(TestCase::class)) {
                $this->addTest(new self($testClass));
            }
        } else {
            throw new Exception;
        }
    }

    /**
     * Wraps both <code>addTest()</code> and <code>addTestSuite</code>
     * as well as the separate import statements for the user's convenience.
     *
     * If the named file cannot be read or there are no new tests that can be
     * added, a <code>PHPUnit\Framework\WarningTestCase</code> will be created instead,
     * leaving the current test run untouched.
     *
     * @throws Exception
     */
    public function addTestFile(string $filename): void
    {
<<<<<<< HEAD
        if (file_exists($filename) && substr($filename, -5) === '.phpt') {
=======
        if (\file_exists($filename) && \substr($filename, -5) === '.phpt') {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->addTest(
                new PhptTestCase($filename)
            );

            return;
        }

        // The given file may contain further stub classes in addition to the
        // test class itself. Figure out the actual test class.
        $filename   = FileLoader::checkAndLoad($filename);
<<<<<<< HEAD
        $newClasses = array_slice(get_declared_classes(), $this->declaredClassesPointer);
=======
        $newClasses = \array_diff(\get_declared_classes(), $this->declaredClasses);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        // The diff is empty in case a parent class (with test methods) is added
        // AFTER a child class that inherited from it. To account for that case,
        // accumulate all discovered classes, so the parent class may be found in
        // a later invocation.
        if (!empty($newClasses)) {
            // On the assumption that test classes are defined first in files,
            // process discovered classes in approximate LIFO order, so as to
            // avoid unnecessary reflection.
<<<<<<< HEAD
            $this->foundClasses           = array_merge($newClasses, $this->foundClasses);
            $this->declaredClassesPointer = count(get_declared_classes());
=======
            $this->foundClasses    = \array_merge($newClasses, $this->foundClasses);
            $this->declaredClasses = \get_declared_classes();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        // The test class's name must match the filename, either in full, or as
        // a PEAR/PSR-0 prefixed short name ('NameSpace_ShortName'), or as a
        // PSR-1 local short name ('NameSpace\ShortName'). The comparison must be
        // anchored to prevent false-positive matches (e.g., 'OtherShortName').
<<<<<<< HEAD
        $shortName      = basename($filename, '.php');
        $shortNameRegEx = '/(?:^|_|\\\\)' . preg_quote($shortName, '/') . '$/';

        foreach ($this->foundClasses as $i => $className) {
            if (preg_match($shortNameRegEx, $className)) {
                try {
                    $class = new ReflectionClass($className);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
=======
        $shortName      = \basename($filename, '.php');
        $shortNameRegEx = '/(?:^|_|\\\\)' . \preg_quote($shortName, '/') . '$/';

        foreach ($this->foundClasses as $i => $className) {
            if (\preg_match($shortNameRegEx, $className)) {
                try {
                    $class = new \ReflectionClass($className);
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

                if ($class->getFileName() == $filename) {
                    $newClasses = [$className];
                    unset($this->foundClasses[$i]);

                    break;
                }
            }
        }

        foreach ($newClasses as $className) {
            try {
<<<<<<< HEAD
                $class = new ReflectionClass($className);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
=======
                $class = new \ReflectionClass($className);
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
            if (dirname($class->getFileName()) === __DIR__) {
=======
            if (\dirname($class->getFileName()) === __DIR__) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                continue;
            }

            if (!$class->isAbstract()) {
                if ($class->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                    try {
                        $method = $class->getMethod(
                            BaseTestRunner::SUITE_METHODNAME
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

                    if ($method->isStatic()) {
                        $this->addTest($method->invoke(null, $className));
                    }
                } elseif ($class->implementsInterface(Test::class)) {
                    $this->addTestSuite($class);
                }
            }
        }

        $this->numTests = -1;
    }

    /**
     * Wrapper for addTestFile() that adds multiple test files.
     *
     * @throws Exception
     */
    public function addTestFiles(iterable $fileNames): void
    {
        foreach ($fileNames as $filename) {
            $this->addTestFile((string) $filename);
        }
    }

    /**
     * Counts the number of test cases that will be run by this test.
     */
    public function count(bool $preferCache = false): int
    {
        if ($preferCache && $this->cachedNumTests !== null) {
            return $this->cachedNumTests;
        }

        $numTests = 0;

        foreach ($this as $test) {
<<<<<<< HEAD
            $numTests += count($test);
=======
            $numTests += \count($test);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->cachedNumTests = $numTests;

        return $numTests;
    }

    /**
     * Returns the name of the suite.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the test groups of the suite.
     */
    public function getGroups(): array
    {
<<<<<<< HEAD
        return array_keys($this->groups);
=======
        return \array_keys($this->groups);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function getGroupDetails(): array
    {
        return $this->groups;
    }

    /**
<<<<<<< HEAD
     * Set tests groups of the test case.
=======
     * Set tests groups of the test case
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function setGroupDetails(array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * Runs the tests and collects their result in a TestResult.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws CodeCoverageException
     * @throws CoveredCodeNotExecutedException
     * @throws MissingCoversAnnotationException
     * @throws RuntimeException
     * @throws UnintentionallyCoveredCodeException
     * @throws Warning
     */
    public function run(?TestResult $result = null): TestResult
=======
     * @throws \PHPUnit\Framework\CodeCoverageException
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\CodeCoverage\MissingCoversAnnotationException
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     * @throws \SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Warning
     */
    public function run(TestResult $result = null): TestResult
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($result === null) {
            $result = $this->createResult();
        }

<<<<<<< HEAD
        if (count($this) === 0) {
=======
        if (\count($this) === 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $result;
        }

        /** @psalm-var class-string $className */
        $className   = $this->name;
        $hookMethods = TestUtil::getHookMethods($className);

        $result->startTestSuite($this);

        try {
            foreach ($hookMethods['beforeClass'] as $beforeClassMethod) {
                if ($this->testCase &&
<<<<<<< HEAD
                    class_exists($this->name, false) &&
                    method_exists($this->name, $beforeClassMethod)) {
                    if ($missingRequirements = TestUtil::getMissingRequirements($this->name, $beforeClassMethod)) {
                        $this->markTestSuiteSkipped(implode(PHP_EOL, $missingRequirements));
                    }

                    call_user_func([$this->name, $beforeClassMethod]);
=======
                    \class_exists($this->name, false) &&
                    \method_exists($this->name, $beforeClassMethod)) {
                    if ($missingRequirements = TestUtil::getMissingRequirements($this->name, $beforeClassMethod)) {
                        $this->markTestSuiteSkipped(\implode(\PHP_EOL, $missingRequirements));
                    }

                    \call_user_func([$this->name, $beforeClassMethod]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }
            }
        } catch (SkippedTestSuiteError $error) {
            foreach ($this->tests() as $test) {
                $result->startTest($test);
                $result->addFailure($test, $error, 0);
                $result->endTest($test, 0);
            }

            $result->endTestSuite($this);

            return $result;
<<<<<<< HEAD
        } catch (Throwable $t) {
=======
        } catch (\Throwable $t) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $errorAdded = false;

            foreach ($this->tests() as $test) {
                if ($result->shouldStop()) {
                    break;
                }

                $result->startTest($test);

                if (!$errorAdded) {
                    $result->addError($test, $t, 0);

                    $errorAdded = true;
                } else {
                    $result->addFailure(
                        $test,
                        new SkippedTestError('Test skipped because of an error in hook method'),
                        0
                    );
                }

                $result->endTest($test, 0);
            }

            $result->endTestSuite($this);

            return $result;
        }

        foreach ($this as $test) {
            if ($result->shouldStop()) {
                break;
            }

            if ($test instanceof TestCase || $test instanceof self) {
                $test->setBeStrictAboutChangesToGlobalState($this->beStrictAboutChangesToGlobalState);
                $test->setBackupGlobals($this->backupGlobals);
                $test->setBackupStaticAttributes($this->backupStaticAttributes);
                $test->setRunTestInSeparateProcess($this->runTestInSeparateProcess);
            }

            $test->run($result);
        }

        try {
            foreach ($hookMethods['afterClass'] as $afterClassMethod) {
                if ($this->testCase &&
<<<<<<< HEAD
                    class_exists($this->name, false) &&
                    method_exists($this->name, $afterClassMethod)) {
                    call_user_func([$this->name, $afterClassMethod]);
                }
            }
        } catch (Throwable $t) {
            $message = "Exception in {$this->name}::{$afterClassMethod}" . PHP_EOL . $t->getMessage();
=======
                    \class_exists($this->name, false) &&
                    \method_exists($this->name, $afterClassMethod)) {
                    \call_user_func([$this->name, $afterClassMethod]);
                }
            }
        } catch (\Throwable $t) {
            $message = "Exception in {$this->name}::$afterClassMethod" . \PHP_EOL . $t->getMessage();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $error   = new SyntheticError($message, 0, $t->getFile(), $t->getLine(), $t->getTrace());

            $placeholderTest = clone $test;
            $placeholderTest->setName($afterClassMethod);

            $result->startTest($placeholderTest);
            $result->addFailure($placeholderTest, $error, 0);
            $result->endTest($placeholderTest, 0);
        }

        $result->endTestSuite($this);

        return $result;
    }

    public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess): void
    {
        $this->runTestInSeparateProcess = $runTestInSeparateProcess;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the test at the given index.
     *
     * @return false|Test
     */
    public function testAt(int $index)
    {
        return $this->tests[$index] ?? false;
    }

    /**
     * Returns the tests as an enumeration.
     *
     * @return Test[]
     */
    public function tests(): array
    {
        return $this->tests;
    }

    /**
<<<<<<< HEAD
     * Set tests of the test suite.
=======
     * Set tests of the test suite
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param Test[] $tests
     */
    public function setTests(array $tests): void
    {
        $this->tests = $tests;
    }

    /**
     * Mark the test suite as skipped.
     *
     * @param string $message
     *
     * @throws SkippedTestSuiteError
     *
     * @psalm-return never-return
     */
    public function markTestSuiteSkipped($message = ''): void
    {
        throw new SkippedTestSuiteError($message);
    }

    /**
     * @param bool $beStrictAboutChangesToGlobalState
     */
    public function setBeStrictAboutChangesToGlobalState($beStrictAboutChangesToGlobalState): void
    {
<<<<<<< HEAD
        if (null === $this->beStrictAboutChangesToGlobalState && is_bool($beStrictAboutChangesToGlobalState)) {
=======
        if (null === $this->beStrictAboutChangesToGlobalState && \is_bool($beStrictAboutChangesToGlobalState)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
        }
    }

    /**
     * @param bool $backupGlobals
     */
    public function setBackupGlobals($backupGlobals): void
    {
<<<<<<< HEAD
        if (null === $this->backupGlobals && is_bool($backupGlobals)) {
=======
        if (null === $this->backupGlobals && \is_bool($backupGlobals)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->backupGlobals = $backupGlobals;
        }
    }

    /**
     * @param bool $backupStaticAttributes
     */
    public function setBackupStaticAttributes($backupStaticAttributes): void
    {
<<<<<<< HEAD
        if (null === $this->backupStaticAttributes && is_bool($backupStaticAttributes)) {
=======
        if (null === $this->backupStaticAttributes && \is_bool($backupStaticAttributes)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * Returns an iterator for this test suite.
     */
<<<<<<< HEAD
    public function getIterator(): Iterator
=======
    public function getIterator(): \Iterator
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $iterator = new TestSuiteIterator($this);

        if ($this->iteratorFilter !== null) {
            $iterator = $this->iteratorFilter->factory($iterator, $this);
        }

        return $iterator;
    }

    public function injectFilter(Factory $filter): void
    {
        $this->iteratorFilter = $filter;

        foreach ($this as $test) {
            if ($test instanceof self) {
                $test->injectFilter($filter);
            }
        }
    }

    /**
     * Creates a default TestResult object.
     */
    protected function createResult(): TestResult
    {
        return new TestResult;
    }

    /**
     * @throws Exception
     */
<<<<<<< HEAD
    protected function addTestMethod(ReflectionClass $class, ReflectionMethod $method): void
=======
    protected function addTestMethod(\ReflectionClass $class, \ReflectionMethod $method): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!TestUtil::isTestMethod($method)) {
            return;
        }

        $methodName = $method->getName();

<<<<<<< HEAD
=======
        if (!$method->isPublic()) {
            $this->addTest(
                new WarningTestCase(
                    \sprintf(
                        'Test method "%s" in test class "%s" is not public.',
                        $methodName,
                        $class->getName()
                    )
                )
            );

            return;
        }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $test = (new TestBuilder)->build($class, $methodName);

        if ($test instanceof TestCase || $test instanceof DataProviderTestSuite) {
            $test->setDependencies(
                TestUtil::getDependencies($class->getName(), $methodName)
            );
        }

        $this->addTest(
            $test,
            TestUtil::getGroups($class->getName(), $methodName)
        );
    }
}
