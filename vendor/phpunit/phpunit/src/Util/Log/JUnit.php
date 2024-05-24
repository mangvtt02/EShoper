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
use function get_class;
use function method_exists;
use function sprintf;
use function str_replace;
use DOMDocument;
use DOMElement;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExceptionWrapper;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Util\Exception;
use PHPUnit\Util\Filter;
use PHPUnit\Util\Printer;
use PHPUnit\Util\Xml;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionException;
use Throwable;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class JUnit extends Printer implements TestListener
{
    /**
<<<<<<< HEAD
     * @var DOMDocument
=======
     * @var \DOMDocument
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $document;

    /**
<<<<<<< HEAD
     * @var DOMElement
=======
     * @var \DOMElement
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $root;

    /**
     * @var bool
     */
    private $reportRiskyTests = false;

    /**
<<<<<<< HEAD
     * @var DOMElement[]
=======
     * @var \DOMElement[]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $testSuites = [];

    /**
     * @var int[]
     */
    private $testSuiteTests = [0];

    /**
     * @var int[]
     */
    private $testSuiteAssertions = [0];

    /**
     * @var int[]
     */
    private $testSuiteErrors = [0];

    /**
     * @var int[]
     */
    private $testSuiteWarnings = [0];

    /**
     * @var int[]
     */
    private $testSuiteFailures = [0];

    /**
     * @var int[]
     */
    private $testSuiteSkipped = [0];

    /**
     * @var int[]
     */
    private $testSuiteTimes = [0];

    /**
     * @var int
     */
    private $testSuiteLevel = 0;

    /**
<<<<<<< HEAD
     * @var DOMElement
=======
     * @var \DOMElement
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $currentTestCase;

    /**
     * @param null|mixed $out
     */
    public function __construct($out = null, bool $reportRiskyTests = false)
    {
<<<<<<< HEAD
        $this->document               = new DOMDocument('1.0', 'UTF-8');
=======
        $this->document               = new \DOMDocument('1.0', 'UTF-8');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->document->formatOutput = true;

        $this->root = $this->document->createElement('testsuites');
        $this->document->appendChild($this->root);

        parent::__construct($out);

        $this->reportRiskyTests = $reportRiskyTests;
    }

    /**
     * Flush buffer and close output.
     */
    public function flush(): void
    {
        $this->write($this->getXML());

        parent::flush();
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
        $this->doAddFault($test, $t, $time, 'error');
        $this->testSuiteErrors[$this->testSuiteLevel]++;
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        $this->doAddFault($test, $e, $time, 'warning');
        $this->testSuiteWarnings[$this->testSuiteLevel]++;
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->doAddFault($test, $e, $time, 'failure');
        $this->testSuiteFailures[$this->testSuiteLevel]++;
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
        $this->doAddSkipped();
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
        if (!$this->reportRiskyTests || $this->currentTestCase === null) {
            return;
        }

        $error = $this->document->createElement(
            'error',
            Xml::prepareString(
                "Risky Test\n" .
                Filter::getFilteredStacktrace($t)
            )
        );

<<<<<<< HEAD
        $error->setAttribute('type', get_class($t));
=======
        $error->setAttribute('type', \get_class($t));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $this->currentTestCase->appendChild($error);

        $this->testSuiteErrors[$this->testSuiteLevel]++;
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
        $this->doAddSkipped();
    }

    /**
     * A testsuite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
        $testSuite = $this->document->createElement('testsuite');
        $testSuite->setAttribute('name', $suite->getName());

<<<<<<< HEAD
        if (class_exists($suite->getName(), false)) {
            try {
                $class = new ReflectionClass($suite->getName());

                $testSuite->setAttribute('file', $class->getFileName());
            } catch (ReflectionException $e) {
=======
        if (\class_exists($suite->getName(), false)) {
            try {
                $class = new \ReflectionClass($suite->getName());

                $testSuite->setAttribute('file', $class->getFileName());
            } catch (\ReflectionException $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        if ($this->testSuiteLevel > 0) {
            $this->testSuites[$this->testSuiteLevel]->appendChild($testSuite);
        } else {
            $this->root->appendChild($testSuite);
        }

        $this->testSuiteLevel++;
        $this->testSuites[$this->testSuiteLevel]          = $testSuite;
        $this->testSuiteTests[$this->testSuiteLevel]      = 0;
        $this->testSuiteAssertions[$this->testSuiteLevel] = 0;
        $this->testSuiteErrors[$this->testSuiteLevel]     = 0;
        $this->testSuiteWarnings[$this->testSuiteLevel]   = 0;
        $this->testSuiteFailures[$this->testSuiteLevel]   = 0;
        $this->testSuiteSkipped[$this->testSuiteLevel]    = 0;
        $this->testSuiteTimes[$this->testSuiteLevel]      = 0;
    }

    /**
     * A testsuite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'tests',
            (string) $this->testSuiteTests[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'assertions',
            (string) $this->testSuiteAssertions[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'errors',
            (string) $this->testSuiteErrors[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'warnings',
            (string) $this->testSuiteWarnings[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'failures',
            (string) $this->testSuiteFailures[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'skipped',
            (string) $this->testSuiteSkipped[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'time',
<<<<<<< HEAD
            sprintf('%F', $this->testSuiteTimes[$this->testSuiteLevel])
=======
            \sprintf('%F', $this->testSuiteTimes[$this->testSuiteLevel])
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );

        if ($this->testSuiteLevel > 1) {
            $this->testSuiteTests[$this->testSuiteLevel - 1] += $this->testSuiteTests[$this->testSuiteLevel];
            $this->testSuiteAssertions[$this->testSuiteLevel - 1] += $this->testSuiteAssertions[$this->testSuiteLevel];
            $this->testSuiteErrors[$this->testSuiteLevel - 1] += $this->testSuiteErrors[$this->testSuiteLevel];
            $this->testSuiteWarnings[$this->testSuiteLevel - 1] += $this->testSuiteWarnings[$this->testSuiteLevel];
            $this->testSuiteFailures[$this->testSuiteLevel - 1] += $this->testSuiteFailures[$this->testSuiteLevel];
            $this->testSuiteSkipped[$this->testSuiteLevel - 1] += $this->testSuiteSkipped[$this->testSuiteLevel];
            $this->testSuiteTimes[$this->testSuiteLevel - 1] += $this->testSuiteTimes[$this->testSuiteLevel];
        }

        $this->testSuiteLevel--;
    }

    /**
     * A test started.
     */
    public function startTest(Test $test): void
    {
        $usesDataprovider = false;

<<<<<<< HEAD
        if (method_exists($test, 'usesDataProvider')) {
=======
        if (\method_exists($test, 'usesDataProvider')) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $usesDataprovider = $test->usesDataProvider();
        }

        $testCase = $this->document->createElement('testcase');
        $testCase->setAttribute('name', $test->getName());

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

        $methodName = $test->getName(!$usesDataprovider);

        if ($class->hasMethod($methodName)) {
            try {
                $method = $class->getMethod($methodName);
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

            $testCase->setAttribute('class', $class->getName());
<<<<<<< HEAD
            $testCase->setAttribute('classname', str_replace('\\', '.', $class->getName()));
=======
            $testCase->setAttribute('classname', \str_replace('\\', '.', $class->getName()));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $testCase->setAttribute('file', $class->getFileName());
            $testCase->setAttribute('line', (string) $method->getStartLine());
        }

        $this->currentTestCase = $testCase;
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
        $numAssertions = 0;

<<<<<<< HEAD
        if (method_exists($test, 'getNumAssertions')) {
=======
        if (\method_exists($test, 'getNumAssertions')) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $numAssertions = $test->getNumAssertions();
        }

        $this->testSuiteAssertions[$this->testSuiteLevel] += $numAssertions;

        $this->currentTestCase->setAttribute(
            'assertions',
            (string) $numAssertions
        );

        $this->currentTestCase->setAttribute(
            'time',
<<<<<<< HEAD
            sprintf('%F', $time)
=======
            \sprintf('%F', $time)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );

        $this->testSuites[$this->testSuiteLevel]->appendChild(
            $this->currentTestCase
        );

        $this->testSuiteTests[$this->testSuiteLevel]++;
        $this->testSuiteTimes[$this->testSuiteLevel] += $time;

        $testOutput = '';

<<<<<<< HEAD
        if (method_exists($test, 'hasOutput') && method_exists($test, 'getActualOutput')) {
=======
        if (\method_exists($test, 'hasOutput') && \method_exists($test, 'getActualOutput')) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $testOutput = $test->hasOutput() ? $test->getActualOutput() : '';
        }

        if (!empty($testOutput)) {
            $systemOut = $this->document->createElement(
                'system-out',
                Xml::prepareString($testOutput)
            );

            $this->currentTestCase->appendChild($systemOut);
        }

        $this->currentTestCase = null;
    }

    /**
     * Returns the XML as a string.
     */
    public function getXML(): string
    {
        return $this->document->saveXML();
    }

<<<<<<< HEAD
    private function doAddFault(Test $test, Throwable $t, float $time, $type): void
=======
    private function doAddFault(Test $test, \Throwable $t, float $time, $type): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($test instanceof SelfDescribing) {
            $buffer = $test->toString() . "\n";
        } else {
            $buffer = '';
        }

        $buffer .= TestFailure::exceptionToString($t) . "\n" .
                   Filter::getFilteredStacktrace($t);

        $fault = $this->document->createElement(
            $type,
            Xml::prepareString($buffer)
        );

        if ($t instanceof ExceptionWrapper) {
            $fault->setAttribute('type', $t->getClassName());
        } else {
<<<<<<< HEAD
            $fault->setAttribute('type', get_class($t));
=======
            $fault->setAttribute('type', \get_class($t));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->currentTestCase->appendChild($fault);
    }

    private function doAddSkipped(): void
    {
        if ($this->currentTestCase === null) {
            return;
        }

        $skipped = $this->document->createElement('skipped');

        $this->currentTestCase->appendChild($skipped);

        $this->testSuiteSkipped[$this->testSuiteLevel]++;
    }
}
