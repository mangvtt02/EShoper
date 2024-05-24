<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\Log;

<<<<<<< HEAD
use function class_exists;
use function count;
use function explode;
use function get_class;
use function getmypid;
use function ini_get;
use function is_bool;
use function is_scalar;
use function method_exists;
use function print_r;
use function round;
use function str_replace;
use function stripos;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExceptionWrapper;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\TextUI\ResultPrinter;
use PHPUnit\Util\Exception;
use PHPUnit\Util\Filter;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\Comparator\ComparisonFailure;
use SebastianBergmann\Timer\RuntimeException;
use Throwable;
=======
use SebastianBergmann\Comparator\ComparisonFailure;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TeamCity extends ResultPrinter
{
    /**
     * @var bool
     */
    private $isSummaryTestCountPrinted = false;

    /**
     * @var string
     */
    private $startedTestName;

    /**
     * @var false|int
     */
    private $flowId;

    /**
<<<<<<< HEAD
     * @throws RuntimeException
=======
     * @throws \SebastianBergmann\Timer\RuntimeException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function printResult(TestResult $result): void
    {
        $this->printHeader($result);
        $this->printFooter($result);
    }

    /**
     * An error occurred.
     */
<<<<<<< HEAD
    public function addError(Test $test, Throwable $t, float $time): void
=======
    public function addError(Test $test, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->printEvent(
            'testFailed',
            [
                'name'     => $test->getName(),
                'message'  => self::getMessage($t),
                'details'  => self::getDetails($t),
                'duration' => self::toMilliseconds($time),
            ]
        );
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
<<<<<<< HEAD
        $this->write(self::getMessage($e) . PHP_EOL);
=======
        $this->printEvent(
            'testFailed',
            [
                'name'     => $test->getName(),
                'message'  => self::getMessage($e),
                'details'  => self::getDetails($e),
                'duration' => self::toMilliseconds($time),
            ]
        );
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $parameters = [
            'name'     => $test->getName(),
            'message'  => self::getMessage($e),
            'details'  => self::getDetails($e),
            'duration' => self::toMilliseconds($time),
        ];

        if ($e instanceof ExpectationFailedException) {
            $comparisonFailure = $e->getComparisonFailure();

            if ($comparisonFailure instanceof ComparisonFailure) {
                $expectedString = $comparisonFailure->getExpectedAsString();

                if ($expectedString === null || empty($expectedString)) {
                    $expectedString = self::getPrimitiveValueAsString($comparisonFailure->getExpected());
                }

                $actualString = $comparisonFailure->getActualAsString();

                if ($actualString === null || empty($actualString)) {
                    $actualString = self::getPrimitiveValueAsString($comparisonFailure->getActual());
                }

                if ($actualString !== null && $expectedString !== null) {
                    $parameters['type']     = 'comparisonFailure';
                    $parameters['actual']   = $actualString;
                    $parameters['expected'] = $expectedString;
                }
            }
        }

        $this->printEvent('testFailed', $parameters);
    }

    /**
     * Incomplete test.
     */
<<<<<<< HEAD
    public function addIncompleteTest(Test $test, Throwable $t, float $time): void
=======
    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->printIgnoredTest($test->getName(), $t, $time);
    }

    /**
     * Risky test.
     */
<<<<<<< HEAD
    public function addRiskyTest(Test $test, Throwable $t, float $time): void
=======
    public function addRiskyTest(Test $test, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->addError($test, $t, $time);
    }

    /**
     * Skipped test.
     */
<<<<<<< HEAD
    public function addSkippedTest(Test $test, Throwable $t, float $time): void
=======
    public function addSkippedTest(Test $test, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $testName = $test->getName();

        if ($this->startedTestName !== $testName) {
            $this->startTest($test);
            $this->printIgnoredTest($testName, $t, $time);
            $this->endTest($test, $time);
        } else {
            $this->printIgnoredTest($testName, $t, $time);
        }
    }

<<<<<<< HEAD
    public function printIgnoredTest($testName, Throwable $t, float $time): void
=======
    public function printIgnoredTest($testName, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->printEvent(
            'testIgnored',
            [
                'name'     => $testName,
                'message'  => self::getMessage($t),
                'details'  => self::getDetails($t),
                'duration' => self::toMilliseconds($time),
            ]
        );
    }

    /**
     * A testsuite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
<<<<<<< HEAD
        if (stripos(ini_get('disable_functions'), 'getmypid') === false) {
            $this->flowId = getmypid();
=======
        if (\stripos(\ini_get('disable_functions'), 'getmypid') === false) {
            $this->flowId = \getmypid();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } else {
            $this->flowId = false;
        }

        if (!$this->isSummaryTestCountPrinted) {
            $this->isSummaryTestCountPrinted = true;

            $this->printEvent(
                'testCount',
<<<<<<< HEAD
                ['count' => count($suite)]
=======
                ['count' => \count($suite)]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            );
        }

        $suiteName = $suite->getName();

        if (empty($suiteName)) {
            return;
        }

        $parameters = ['name' => $suiteName];

<<<<<<< HEAD
        if (class_exists($suiteName, false)) {
            $fileName                   = self::getFileName($suiteName);
            $parameters['locationHint'] = "php_qn://{$fileName}::\\{$suiteName}";
        } else {
            $split = explode('::', $suiteName);

            if (count($split) === 2 && class_exists($split[0]) && method_exists($split[0], $split[1])) {
                $fileName                   = self::getFileName($split[0]);
                $parameters['locationHint'] = "php_qn://{$fileName}::\\{$suiteName}";
=======
        if (\class_exists($suiteName, false)) {
            $fileName                   = self::getFileName($suiteName);
            $parameters['locationHint'] = "php_qn://$fileName::\\$suiteName";
        } else {
            $split = \explode('::', $suiteName);

            if (\count($split) === 2 && \class_exists($split[0]) && \method_exists($split[0], $split[1])) {
                $fileName                   = self::getFileName($split[0]);
                $parameters['locationHint'] = "php_qn://$fileName::\\$suiteName";
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $parameters['name']         = $split[1];
            }
        }

        $this->printEvent('testSuiteStarted', $parameters);
    }

    /**
     * A testsuite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
        $suiteName = $suite->getName();

        if (empty($suiteName)) {
            return;
        }

        $parameters = ['name' => $suiteName];

<<<<<<< HEAD
        if (!class_exists($suiteName, false)) {
            $split = explode('::', $suiteName);

            if (count($split) === 2 && class_exists($split[0]) && method_exists($split[0], $split[1])) {
=======
        if (!\class_exists($suiteName, false)) {
            $split = \explode('::', $suiteName);

            if (\count($split) === 2 && \class_exists($split[0]) && \method_exists($split[0], $split[1])) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $parameters['name'] = $split[1];
            }
        }

        $this->printEvent('testSuiteFinished', $parameters);
    }

    /**
     * A test started.
     */
    public function startTest(Test $test): void
    {
        $testName              = $test->getName();
        $this->startedTestName = $testName;
        $params                = ['name' => $testName];

        if ($test instanceof TestCase) {
<<<<<<< HEAD
            $className              = get_class($test);
            $fileName               = self::getFileName($className);
            $params['locationHint'] = "php_qn://{$fileName}::\\{$className}::{$testName}";
=======
            $className              = \get_class($test);
            $fileName               = self::getFileName($className);
            $params['locationHint'] = "php_qn://$fileName::\\$className::$testName";
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->printEvent('testStarted', $params);
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
        parent::endTest($test, $time);

        $this->printEvent(
            'testFinished',
            [
                'name'     => $test->getName(),
                'duration' => self::toMilliseconds($time),
            ]
        );
    }

    protected function writeProgress(string $progress): void
    {
    }

    private function printEvent(string $eventName, array $params = []): void
    {
<<<<<<< HEAD
        $this->write("\n##teamcity[{$eventName}");
=======
        $this->write("\n##teamcity[$eventName");
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($this->flowId) {
            $params['flowId'] = $this->flowId;
        }

        foreach ($params as $key => $value) {
            $escapedValue = self::escapeValue((string) $value);
<<<<<<< HEAD
            $this->write(" {$key}='{$escapedValue}'");
=======
            $this->write(" $key='$escapedValue'");
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->write("]\n");
    }

<<<<<<< HEAD
    private static function getMessage(Throwable $t): string
=======
    private static function getMessage(\Throwable $t): string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $message = '';

        if ($t instanceof ExceptionWrapper) {
            if ($t->getClassName() !== '') {
                $message .= $t->getClassName();
            }

            if ($message !== '' && $t->getMessage() !== '') {
                $message .= ' : ';
            }
        }

        return $message . $t->getMessage();
    }

<<<<<<< HEAD
    private static function getDetails(Throwable $t): string
=======
    private static function getDetails(\Throwable $t): string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $stackTrace = Filter::getFilteredStacktrace($t);
        $previous   = $t instanceof ExceptionWrapper ? $t->getPreviousWrapped() : $t->getPrevious();

        while ($previous) {
            $stackTrace .= "\nCaused by\n" .
                TestFailure::exceptionToString($previous) . "\n" .
                Filter::getFilteredStacktrace($previous);

            $previous = $previous instanceof ExceptionWrapper ?
                $previous->getPreviousWrapped() : $previous->getPrevious();
        }

<<<<<<< HEAD
        return ' ' . str_replace("\n", "\n ", $stackTrace);
=======
        return ' ' . \str_replace("\n", "\n ", $stackTrace);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    private static function getPrimitiveValueAsString($value): ?string
    {
        if ($value === null) {
            return 'null';
        }

<<<<<<< HEAD
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_scalar($value)) {
            return print_r($value, true);
=======
        if (\is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (\is_scalar($value)) {
            return \print_r($value, true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return null;
    }

    private static function escapeValue(string $text): string
    {
<<<<<<< HEAD
        return str_replace(
=======
        return \str_replace(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ['|', "'", "\n", "\r", ']', '['],
            ['||', "|'", '|n', '|r', '|]', '|['],
            $text
        );
    }

    /**
     * @param string $className
     */
    private static function getFileName($className): string
    {
        try {
<<<<<<< HEAD
            return (new ReflectionClass($className))->getFileName();
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
=======
            return (new \ReflectionClass($className))->getFileName();
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

    /**
     * @param float $time microseconds
     */
    private static function toMilliseconds(float $time): int
    {
<<<<<<< HEAD
        return (int) round($time * 1000);
=======
        return (int) \round($time * 1000);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
