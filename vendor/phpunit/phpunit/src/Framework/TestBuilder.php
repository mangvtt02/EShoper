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
use function assert;
use function count;
use function get_class;
use function sprintf;
use function trim;
use PHPUnit\Util\Filter;
use PHPUnit\Util\InvalidDataSetException;
use PHPUnit\Util\Test as TestUtil;
use ReflectionClass;
use Throwable;
=======
use PHPUnit\Util\Filter;
use PHPUnit\Util\InvalidDataSetException;
use PHPUnit\Util\Test as TestUtil;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestBuilder
{
<<<<<<< HEAD
    public function build(ReflectionClass $theClass, string $methodName): Test
=======
    public function build(\ReflectionClass $theClass, string $methodName): Test
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $className = $theClass->getName();

        if (!$theClass->isInstantiable()) {
            return new WarningTestCase(
<<<<<<< HEAD
                sprintf('Cannot instantiate class "%s".', $className)
=======
                \sprintf('Cannot instantiate class "%s".', $className)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            );
        }

        $backupSettings = TestUtil::getBackupSettings(
            $className,
            $methodName
        );

        $preserveGlobalState = TestUtil::getPreserveGlobalStateSettings(
            $className,
            $methodName
        );

        $runTestInSeparateProcess = TestUtil::getProcessIsolationSettings(
            $className,
            $methodName
        );

        $runClassInSeparateProcess = TestUtil::getClassProcessIsolationSettings(
            $className,
            $methodName
        );

        $constructor = $theClass->getConstructor();

        if ($constructor === null) {
            throw new Exception('No valid test provided.');
        }

        $parameters = $constructor->getParameters();

        // TestCase() or TestCase($name)
<<<<<<< HEAD
        if (count($parameters) < 2) {
=======
        if (\count($parameters) < 2) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $test = $this->buildTestWithoutData($className);
        } // TestCase($name, $data)
        else {
            try {
                $data = TestUtil::getProvidedData(
                    $className,
                    $methodName
                );
            } catch (IncompleteTestError $e) {
<<<<<<< HEAD
                $message = sprintf(
=======
                $message = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    "Test for %s::%s marked incomplete by data provider\n%s",
                    $className,
                    $methodName,
                    $this->throwableToString($e)
                );

                $data = new IncompleteTestCase($className, $methodName, $message);
            } catch (SkippedTestError $e) {
<<<<<<< HEAD
                $message = sprintf(
=======
                $message = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    "Test for %s::%s skipped by data provider\n%s",
                    $className,
                    $methodName,
                    $this->throwableToString($e)
                );

                $data = new SkippedTestCase($className, $methodName, $message);
<<<<<<< HEAD
            } catch (Throwable $t) {
                $message = sprintf(
=======
            } catch (\Throwable $t) {
                $message = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    "The data provider specified for %s::%s is invalid.\n%s",
                    $className,
                    $methodName,
                    $this->throwableToString($t)
                );

                $data = new WarningTestCase($message);
            }

            // Test method with @dataProvider.
            if (isset($data)) {
                $test = $this->buildDataProviderTestSuite(
                    $methodName,
                    $className,
                    $data,
                    $runTestInSeparateProcess,
                    $preserveGlobalState,
                    $runClassInSeparateProcess,
                    $backupSettings
                );
            } else {
                $test = $this->buildTestWithoutData($className);
            }
        }

        if ($test instanceof TestCase) {
            $test->setName($methodName);
            $this->configureTestCase(
                $test,
                $runTestInSeparateProcess,
                $preserveGlobalState,
                $runClassInSeparateProcess,
                $backupSettings
            );
        }

        return $test;
    }

    /** @psalm-param class-string $className */
    private function buildTestWithoutData(string $className)
    {
        return new $className;
    }

    /** @psalm-param class-string $className */
    private function buildDataProviderTestSuite(
        string $methodName,
        string $className,
        $data,
        bool $runTestInSeparateProcess,
        ?bool $preserveGlobalState,
        bool $runClassInSeparateProcess,
        array $backupSettings
    ): DataProviderTestSuite {
        $dataProviderTestSuite = new DataProviderTestSuite(
            $className . '::' . $methodName
        );

        $groups = TestUtil::getGroups($className, $methodName);

        if ($data instanceof WarningTestCase ||
            $data instanceof SkippedTestCase ||
            $data instanceof IncompleteTestCase) {
            $dataProviderTestSuite->addTest($data, $groups);
        } else {
            foreach ($data as $_dataName => $_data) {
                $_test = new $className($methodName, $_data, $_dataName);

<<<<<<< HEAD
                assert($_test instanceof TestCase);
=======
                \assert($_test instanceof TestCase);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                $this->configureTestCase(
                    $_test,
                    $runTestInSeparateProcess,
                    $preserveGlobalState,
                    $runClassInSeparateProcess,
                    $backupSettings
                );

                $dataProviderTestSuite->addTest($_test, $groups);
            }
        }

        return $dataProviderTestSuite;
    }

    private function configureTestCase(
        TestCase $test,
        bool $runTestInSeparateProcess,
        ?bool $preserveGlobalState,
        bool $runClassInSeparateProcess,
        array $backupSettings
    ): void {
        if ($runTestInSeparateProcess) {
            $test->setRunTestInSeparateProcess(true);

            if ($preserveGlobalState !== null) {
                $test->setPreserveGlobalState($preserveGlobalState);
            }
        }

        if ($runClassInSeparateProcess) {
            $test->setRunClassInSeparateProcess(true);

            if ($preserveGlobalState !== null) {
                $test->setPreserveGlobalState($preserveGlobalState);
            }
        }

        if ($backupSettings['backupGlobals'] !== null) {
            $test->setBackupGlobals($backupSettings['backupGlobals']);
        }

        if ($backupSettings['backupStaticAttributes'] !== null) {
            $test->setBackupStaticAttributes(
                $backupSettings['backupStaticAttributes']
            );
        }
    }

<<<<<<< HEAD
    private function throwableToString(Throwable $t): string
    {
        $message = $t->getMessage();

        if (empty(trim($message))) {
=======
    private function throwableToString(\Throwable $t): string
    {
        $message = $t->getMessage();

        if (empty(\trim($message))) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $message = '<no message>';
        }

        if ($t instanceof InvalidDataSetException) {
<<<<<<< HEAD
            return sprintf(
=======
            return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                "%s\n%s",
                $message,
                Filter::getFilteredStacktrace($t)
            );
        }

<<<<<<< HEAD
        return sprintf(
            "%s: %s\n%s",
            get_class($t),
=======
        return \sprintf(
            "%s: %s\n%s",
            \get_class($t),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $message,
            Filter::getFilteredStacktrace($t)
        );
    }
}
