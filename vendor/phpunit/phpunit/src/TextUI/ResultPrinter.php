<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI;

<<<<<<< HEAD
use const PHP_EOL;
use function array_map;
use function array_reverse;
use function count;
use function floor;
use function implode;
use function in_array;
use function is_int;
use function max;
use function preg_split;
use function sprintf;
use function str_pad;
use function str_repeat;
use function strlen;
use function trim;
use function vsprintf;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Color;
use PHPUnit\Util\Printer;
use SebastianBergmann\Environment\Console;
<<<<<<< HEAD
use SebastianBergmann\Timer\RuntimeException;
use SebastianBergmann\Timer\Timer;
use Throwable;
=======
use SebastianBergmann\Timer\Timer;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class ResultPrinter extends Printer implements TestListener
{
    public const EVENT_TEST_START      = 0;
<<<<<<< HEAD
    public const EVENT_TEST_END        = 1;
    public const EVENT_TESTSUITE_START = 2;
    public const EVENT_TESTSUITE_END   = 3;
    public const COLOR_NEVER           = 'never';
    public const COLOR_AUTO            = 'auto';
    public const COLOR_ALWAYS          = 'always';
    public const COLOR_DEFAULT         = self::COLOR_NEVER;
    private const AVAILABLE_COLORS     = [self::COLOR_NEVER, self::COLOR_AUTO, self::COLOR_ALWAYS];
=======

    public const EVENT_TEST_END        = 1;

    public const EVENT_TESTSUITE_START = 2;

    public const EVENT_TESTSUITE_END   = 3;

    public const COLOR_NEVER   = 'never';

    public const COLOR_AUTO    = 'auto';

    public const COLOR_ALWAYS  = 'always';

    public const COLOR_DEFAULT = self::COLOR_NEVER;

    private const AVAILABLE_COLORS = [self::COLOR_NEVER, self::COLOR_AUTO, self::COLOR_ALWAYS];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @var int
     */
    protected $column = 0;

    /**
     * @var int
     */
    protected $maxColumn;

    /**
     * @var bool
     */
    protected $lastTestFailed = false;

    /**
     * @var int
     */
    protected $numAssertions = 0;

    /**
     * @var int
     */
    protected $numTests = -1;

    /**
     * @var int
     */
    protected $numTestsRun = 0;

    /**
     * @var int
     */
    protected $numTestsWidth;

    /**
     * @var bool
     */
    protected $colors = false;

    /**
     * @var bool
     */
    protected $debug = false;

    /**
     * @var bool
     */
    protected $verbose = false;

    /**
     * @var int
     */
    private $numberOfColumns;

    /**
     * @var bool
     */
    private $reverse;

    /**
     * @var bool
     */
    private $defectListPrinted = false;

    /**
     * Constructor.
     *
     * @param null|resource|string $out
     * @param int|string           $numberOfColumns
     *
     * @throws Exception
     */
    public function __construct($out = null, bool $verbose = false, string $colors = self::COLOR_DEFAULT, bool $debug = false, $numberOfColumns = 80, bool $reverse = false)
    {
        parent::__construct($out);

<<<<<<< HEAD
        if (!in_array($colors, self::AVAILABLE_COLORS, true)) {
            throw InvalidArgumentException::create(
                3,
                vsprintf('value from "%s", "%s" or "%s"', self::AVAILABLE_COLORS)
            );
        }

        if (!is_int($numberOfColumns) && $numberOfColumns !== 'max') {
=======
        if (!\in_array($colors, self::AVAILABLE_COLORS, true)) {
            throw InvalidArgumentException::create(
                3,
                \vsprintf('value from "%s", "%s" or "%s"', self::AVAILABLE_COLORS)
            );
        }

        if (!\is_int($numberOfColumns) && $numberOfColumns !== 'max') {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw InvalidArgumentException::create(5, 'integer or "max"');
        }

        $console            = new Console;
        $maxNumberOfColumns = $console->getNumberOfColumns();

        if ($numberOfColumns === 'max' || ($numberOfColumns !== 80 && $numberOfColumns > $maxNumberOfColumns)) {
            $numberOfColumns = $maxNumberOfColumns;
        }

        $this->numberOfColumns = $numberOfColumns;
        $this->verbose         = $verbose;
        $this->debug           = $debug;
        $this->reverse         = $reverse;

        if ($colors === self::COLOR_AUTO && $console->hasColorSupport()) {
            $this->colors = true;
        } else {
            $this->colors = (self::COLOR_ALWAYS === $colors);
        }
    }

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
        $this->printErrors($result);
        $this->printWarnings($result);
        $this->printFailures($result);
        $this->printRisky($result);

        if ($this->verbose) {
            $this->printIncompletes($result);
            $this->printSkipped($result);
        }

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
        $this->writeProgressWithColor('fg-red, bold', 'E');
        $this->lastTestFailed = true;
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->writeProgressWithColor('bg-red, fg-white', 'F');
        $this->lastTestFailed = true;
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'W');
        $this->lastTestFailed = true;
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
        $this->writeProgressWithColor('fg-yellow, bold', 'I');
        $this->lastTestFailed = true;
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
        $this->writeProgressWithColor('fg-yellow, bold', 'R');
        $this->lastTestFailed = true;
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
        $this->writeProgressWithColor('fg-cyan, bold', 'S');
        $this->lastTestFailed = true;
    }

    /**
     * A testsuite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
        if ($this->numTests == -1) {
<<<<<<< HEAD
            $this->numTests      = count($suite);
            $this->numTestsWidth = strlen((string) $this->numTests);
            $this->maxColumn     = $this->numberOfColumns - strlen('  /  (XXX%)') - (2 * $this->numTestsWidth);
=======
            $this->numTests      = \count($suite);
            $this->numTestsWidth = \strlen((string) $this->numTests);
            $this->maxColumn     = $this->numberOfColumns - \strlen('  /  (XXX%)') - (2 * $this->numTestsWidth);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * A testsuite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A test started.
     */
    public function startTest(Test $test): void
    {
        if ($this->debug) {
            $this->write(
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    "Test '%s' started\n",
                    \PHPUnit\Util\Test::describeAsString($test)
                )
            );
        }
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
        if ($this->debug) {
            $this->write(
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    "Test '%s' ended\n",
                    \PHPUnit\Util\Test::describeAsString($test)
                )
            );
        }

        if (!$this->lastTestFailed) {
            $this->writeProgress('.');
        }

        if ($test instanceof TestCase) {
            $this->numAssertions += $test->getNumAssertions();
        } elseif ($test instanceof PhptTestCase) {
            $this->numAssertions++;
        }

        $this->lastTestFailed = false;

        if ($test instanceof TestCase && !$test->hasExpectationOnOutput()) {
            $this->write($test->getActualOutput());
        }
    }

    protected function printDefects(array $defects, string $type): void
    {
<<<<<<< HEAD
        $count = count($defects);
=======
        $count = \count($defects);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($count == 0) {
            return;
        }

        if ($this->defectListPrinted) {
            $this->write("\n--\n\n");
        }

        $this->write(
<<<<<<< HEAD
            sprintf(
=======
            \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                "There %s %d %s%s:\n",
                ($count == 1) ? 'was' : 'were',
                $count,
                $type,
                ($count == 1) ? '' : 's'
            )
        );

        $i = 1;

        if ($this->reverse) {
<<<<<<< HEAD
            $defects = array_reverse($defects);
=======
            $defects = \array_reverse($defects);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        foreach ($defects as $defect) {
            $this->printDefect($defect, $i++);
        }

        $this->defectListPrinted = true;
    }

    protected function printDefect(TestFailure $defect, int $count): void
    {
        $this->printDefectHeader($defect, $count);
        $this->printDefectTrace($defect);
    }

    protected function printDefectHeader(TestFailure $defect, int $count): void
    {
        $this->write(
<<<<<<< HEAD
            sprintf(
=======
            \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                "\n%d) %s\n",
                $count,
                $defect->getTestName()
            )
        );
    }

    protected function printDefectTrace(TestFailure $defect): void
    {
        $e = $defect->thrownException();
        $this->write((string) $e);

        while ($e = $e->getPrevious()) {
<<<<<<< HEAD
            $this->write("\nCaused by\n" . trim((string) $e) . "\n");
=======
            $this->write("\nCaused by\n" . $e);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    protected function printErrors(TestResult $result): void
    {
        $this->printDefects($result->errors(), 'error');
    }

    protected function printFailures(TestResult $result): void
    {
        $this->printDefects($result->failures(), 'failure');
    }

    protected function printWarnings(TestResult $result): void
    {
        $this->printDefects($result->warnings(), 'warning');
    }

    protected function printIncompletes(TestResult $result): void
    {
        $this->printDefects($result->notImplemented(), 'incomplete test');
    }

    protected function printRisky(TestResult $result): void
    {
        $this->printDefects($result->risky(), 'risky test');
    }

    protected function printSkipped(TestResult $result): void
    {
        $this->printDefects($result->skipped(), 'skipped test');
    }

    /**
<<<<<<< HEAD
     * @throws RuntimeException
     */
    protected function printHeader(TestResult $result): void
    {
        if (count($result) > 0) {
            $this->write(PHP_EOL . PHP_EOL . Timer::resourceUsage() . PHP_EOL . PHP_EOL);
=======
     * @throws \SebastianBergmann\Timer\RuntimeException
     */
    protected function printHeader(TestResult $result): void
    {
        if (\count($result) > 0) {
            $this->write(\PHP_EOL . \PHP_EOL . Timer::resourceUsage() . \PHP_EOL . \PHP_EOL);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    protected function printFooter(TestResult $result): void
    {
<<<<<<< HEAD
        if (count($result) === 0) {
=======
        if (\count($result) === 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->writeWithColor(
                'fg-black, bg-yellow',
                'No tests executed!'
            );

            return;
        }

        if ($result->wasSuccessfulAndNoTestIsRiskyOrSkippedOrIncomplete()) {
            $this->writeWithColor(
                'fg-black, bg-green',
<<<<<<< HEAD
                sprintf(
                    'OK (%d test%s, %d assertion%s)',
                    count($result),
                    (count($result) == 1) ? '' : 's',
=======
                \sprintf(
                    'OK (%d test%s, %d assertion%s)',
                    \count($result),
                    (\count($result) == 1) ? '' : 's',
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $this->numAssertions,
                    ($this->numAssertions == 1) ? '' : 's'
                )
            );

            return;
        }

        $color = 'fg-black, bg-yellow';

        if ($result->wasSuccessful()) {
            if ($this->verbose || !$result->allHarmless()) {
                $this->write("\n");
            }

            $this->writeWithColor(
                $color,
                'OK, but incomplete, skipped, or risky tests!'
            );
        } else {
            $this->write("\n");

            if ($result->errorCount()) {
                $color = 'fg-white, bg-red';

                $this->writeWithColor(
                    $color,
                    'ERRORS!'
                );
            } elseif ($result->failureCount()) {
                $color = 'fg-white, bg-red';

                $this->writeWithColor(
                    $color,
                    'FAILURES!'
                );
            } elseif ($result->warningCount()) {
                $color = 'fg-black, bg-yellow';

                $this->writeWithColor(
                    $color,
                    'WARNINGS!'
                );
            }
        }

<<<<<<< HEAD
        $this->writeCountString(count($result), 'Tests', $color, true);
=======
        $this->writeCountString(\count($result), 'Tests', $color, true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->writeCountString($this->numAssertions, 'Assertions', $color, true);
        $this->writeCountString($result->errorCount(), 'Errors', $color);
        $this->writeCountString($result->failureCount(), 'Failures', $color);
        $this->writeCountString($result->warningCount(), 'Warnings', $color);
        $this->writeCountString($result->skippedCount(), 'Skipped', $color);
        $this->writeCountString($result->notImplementedCount(), 'Incomplete', $color);
        $this->writeCountString($result->riskyCount(), 'Risky', $color);
        $this->writeWithColor($color, '.');
    }

    protected function writeProgress(string $progress): void
    {
        if ($this->debug) {
            return;
        }

        $this->write($progress);
        $this->column++;
        $this->numTestsRun++;

        if ($this->column == $this->maxColumn || $this->numTestsRun == $this->numTests) {
            if ($this->numTestsRun == $this->numTests) {
<<<<<<< HEAD
                $this->write(str_repeat(' ', $this->maxColumn - $this->column));
            }

            $this->write(
                sprintf(
=======
                $this->write(\str_repeat(' ', $this->maxColumn - $this->column));
            }

            $this->write(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    ' %' . $this->numTestsWidth . 'd / %' .
                    $this->numTestsWidth . 'd (%3s%%)',
                    $this->numTestsRun,
                    $this->numTests,
<<<<<<< HEAD
                    floor(($this->numTestsRun / $this->numTests) * 100)
=======
                    \floor(($this->numTestsRun / $this->numTests) * 100)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                )
            );

            if ($this->column == $this->maxColumn) {
                $this->writeNewLine();
            }
        }
    }

    protected function writeNewLine(): void
    {
        $this->column = 0;
        $this->write("\n");
    }

    /**
     * Formats a buffer with a specified ANSI color sequence if colors are
     * enabled.
     */
    protected function colorizeTextBox(string $color, string $buffer): string
    {
        if (!$this->colors) {
            return $buffer;
        }

<<<<<<< HEAD
        $lines   = preg_split('/\r\n|\r|\n/', $buffer);
        $padding = max(array_map('\strlen', $lines));
=======
        $lines   = \preg_split('/\r\n|\r|\n/', $buffer);
        $padding = \max(\array_map('\strlen', $lines));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $styledLines = [];

        foreach ($lines as $line) {
<<<<<<< HEAD
            $styledLines[] = Color::colorize($color, str_pad($line, $padding));
        }

        return implode(PHP_EOL, $styledLines);
=======
            $styledLines[] = Color::colorize($color, \str_pad($line, $padding));
        }

        return \implode(\PHP_EOL, $styledLines);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Writes a buffer out with a color sequence if colors are enabled.
     */
    protected function writeWithColor(string $color, string $buffer, bool $lf = true): void
    {
        $this->write($this->colorizeTextBox($color, $buffer));

        if ($lf) {
<<<<<<< HEAD
            $this->write(PHP_EOL);
=======
            $this->write(\PHP_EOL);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * Writes progress with a color sequence if colors are enabled.
     */
    protected function writeProgressWithColor(string $color, string $buffer): void
    {
        $buffer = $this->colorizeTextBox($color, $buffer);
        $this->writeProgress($buffer);
    }

    private function writeCountString(int $count, string $name, string $color, bool $always = false): void
    {
        static $first = true;

        if ($always || $count > 0) {
            $this->writeWithColor(
                $color,
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    '%s%s: %d',
                    !$first ? ', ' : '',
                    $name,
                    $count
                ),
                false
            );

            $first = false;
        }
    }
}
