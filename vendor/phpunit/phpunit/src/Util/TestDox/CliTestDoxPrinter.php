<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\TestDox;

<<<<<<< HEAD
use const PHP_EOL;
use function array_map;
use function ceil;
use function count;
use function explode;
use function get_class;
use function implode;
use function preg_match;
use function sprintf;
use function strlen;
use function strpos;
use function trim;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestFailure;
=======
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\TestResult;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Color;
<<<<<<< HEAD
use PHPUnit\Util\Filter;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use SebastianBergmann\Timer\RuntimeException;
use SebastianBergmann\Timer\Timer;
use Throwable;
=======
use SebastianBergmann\Timer\Timer;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class CliTestDoxPrinter extends TestDoxPrinter
{
    /**
<<<<<<< HEAD
     * The default Testdox left margin for messages is a vertical line.
=======
     * The default Testdox left margin for messages is a vertical line
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private const PREFIX_SIMPLE = [
        'default' => '│',
        'start'   => '│',
        'message' => '│',
        'diff'    => '│',
        'trace'   => '│',
        'last'    => '│',
    ];

    /**
<<<<<<< HEAD
     * Colored Testdox use box-drawing for a more textured map of the message.
=======
     * Colored Testdox use box-drawing for a more textured map of the message
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private const PREFIX_DECORATED = [
        'default' => '│',
        'start'   => '┐',
        'message' => '├',
        'diff'    => '┊',
        'trace'   => '╵',
        'last'    => '┴',
    ];

    private const SPINNER_ICONS = [
        " \e[36m◐\e[0m running tests",
        " \e[36m◓\e[0m running tests",
        " \e[36m◑\e[0m running tests",
        " \e[36m◒\e[0m running tests",
    ];
<<<<<<< HEAD
    private const STATUS_STYLES = [
        BaseTestRunner::STATUS_PASSED => [
            'symbol' => '✔',
            'color'  => 'fg-green',
        ],
        BaseTestRunner::STATUS_ERROR => [
=======

    private const STATUS_STYLES = [
        BaseTestRunner::STATUS_PASSED     => [
            'symbol' => '✔',
            'color'  => 'fg-green',
        ],
        BaseTestRunner::STATUS_ERROR      => [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'symbol'  => '✘',
            'color'   => 'fg-yellow',
            'message' => 'bg-yellow,fg-black',
        ],
<<<<<<< HEAD
        BaseTestRunner::STATUS_FAILURE => [
=======
        BaseTestRunner::STATUS_FAILURE    => [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'symbol'  => '✘',
            'color'   => 'fg-red',
            'message' => 'bg-red,fg-white',
        ],
<<<<<<< HEAD
        BaseTestRunner::STATUS_SKIPPED => [
=======
        BaseTestRunner::STATUS_SKIPPED    => [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'symbol'  => '↩',
            'color'   => 'fg-cyan',
            'message' => 'fg-cyan',
        ],
<<<<<<< HEAD
        BaseTestRunner::STATUS_RISKY => [
=======
        BaseTestRunner::STATUS_RISKY      => [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'symbol'  => '☢',
            'color'   => 'fg-yellow',
            'message' => 'fg-yellow',
        ],
        BaseTestRunner::STATUS_INCOMPLETE => [
            'symbol'  => '∅',
            'color'   => 'fg-yellow',
            'message' => 'fg-yellow',
        ],
<<<<<<< HEAD
        BaseTestRunner::STATUS_WARNING => [
=======
        BaseTestRunner::STATUS_WARNING    => [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'symbol'  => '⚠',
            'color'   => 'fg-yellow',
            'message' => 'fg-yellow',
        ],
<<<<<<< HEAD
        BaseTestRunner::STATUS_UNKNOWN => [
=======
        BaseTestRunner::STATUS_UNKNOWN    => [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'symbol'  => '?',
            'color'   => 'fg-blue',
            'message' => 'fg-white,bg-blue',
        ],
    ];

    /**
     * @var int[]
     */
    private $nonSuccessfulTestResults = [];

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

        $this->printNonSuccessfulTestsSummary($result->count());

        $this->printFooter($result);
    }

    /**
<<<<<<< HEAD
     * @throws RuntimeException
=======
     * @throws \SebastianBergmann\Timer\RuntimeException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function printHeader(TestResult $result): void
    {
        $this->write("\n" . Timer::resourceUsage() . "\n\n");
    }

    protected function formatClassName(Test $test): string
    {
        if ($test instanceof TestCase) {
<<<<<<< HEAD
            return $this->prettifier->prettifyTestClass(get_class($test));
        }

        return get_class($test);
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function registerTestResult(Test $test, ?Throwable $t, int $status, float $time, bool $verbose): void
=======
            return $this->prettifier->prettifyTestClass(\get_class($test));
        }

        return \get_class($test);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function registerTestResult(Test $test, ?\Throwable $t, int $status, float $time, bool $verbose): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($status !== BaseTestRunner::STATUS_PASSED) {
            $this->nonSuccessfulTestResults[] = $this->testIndex;
        }

        parent::registerTestResult($test, $t, $status, $time, $verbose);
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function formatTestName(Test $test): string
    {
        if ($test instanceof TestCase) {
            return $this->prettifier->prettifyTestCase($test);
        }

        return parent::formatTestName($test);
    }

    protected function writeTestResult(array $prevResult, array $result): void
    {
        // spacer line for new suite headers and after verbose messages
        if ($prevResult['testName'] !== '' &&
            (!empty($prevResult['message']) || $prevResult['className'] !== $result['className'])) {
<<<<<<< HEAD
            $this->write(PHP_EOL);
=======
            $this->write(\PHP_EOL);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        // suite header
        if ($prevResult['className'] !== $result['className']) {
<<<<<<< HEAD
            $this->write($this->colorizeTextBox('underlined', $result['className']) . PHP_EOL);
=======
            $this->write($this->colorizeTextBox('underlined', $result['className']) . \PHP_EOL);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        // test result line
        if ($this->colors && $result['className'] === PhptTestCase::class) {
            $testName = Color::colorizePath($result['testName'], $prevResult['testName'], true);
        } else {
            $testName = $result['testMethod'];
        }

        $style = self::STATUS_STYLES[$result['status']];
<<<<<<< HEAD
        $line  = sprintf(
            ' %s %s%s' . PHP_EOL,
=======
        $line  = \sprintf(
            ' %s %s%s' . \PHP_EOL,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->colorizeTextBox($style['color'], $style['symbol']),
            $testName,
            $this->verbose ? ' ' . $this->formatRuntime($result['time'], $style['color']) : ''
        );

        $this->write($line);

        // additional information when verbose
        $this->write($result['message']);
    }

<<<<<<< HEAD
    protected function formatThrowable(Throwable $t, ?int $status = null): string
    {
        return trim(TestFailure::exceptionToString($t));
=======
    protected function formatThrowable(\Throwable $t, ?int $status = null): string
    {
        return \trim(\PHPUnit\Framework\TestFailure::exceptionToString($t));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    protected function colorizeMessageAndDiff(string $style, string $buffer): array
    {
<<<<<<< HEAD
        $lines      = $buffer ? array_map('\rtrim', explode(PHP_EOL, $buffer)) : [];
=======
        $lines      = $buffer ? \array_map('\rtrim', \explode(\PHP_EOL, $buffer)) : [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $message    = [];
        $diff       = [];
        $insideDiff = false;

        foreach ($lines as $line) {
            if ($line === '--- Expected') {
                $insideDiff = true;
            }

            if (!$insideDiff) {
                $message[] = $line;
            } else {
<<<<<<< HEAD
                if (strpos($line, '-') === 0) {
                    $line = Color::colorize('fg-red', Color::visualizeWhitespace($line, true));
                } elseif (strpos($line, '+') === 0) {
=======
                if (\strpos($line, '-') === 0) {
                    $line = Color::colorize('fg-red', Color::visualizeWhitespace($line, true));
                } elseif (\strpos($line, '+') === 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $line = Color::colorize('fg-green', Color::visualizeWhitespace($line, true));
                } elseif ($line === '@@ @@') {
                    $line = Color::colorize('fg-cyan', $line);
                }
                $diff[] = $line;
            }
        }
<<<<<<< HEAD
        $diff = implode(PHP_EOL, $diff);

        if (!empty($message)) {
            $message = $this->colorizeTextBox($style, implode(PHP_EOL, $message));
=======
        $diff = \implode(\PHP_EOL, $diff);

        if (!empty($message)) {
            $message = $this->colorizeTextBox($style, \implode(\PHP_EOL, $message));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return [$message, $diff];
    }

<<<<<<< HEAD
    protected function formatStacktrace(Throwable $t): string
    {
        $trace = Filter::getFilteredStacktrace($t);
=======
    protected function formatStacktrace(\Throwable $t): string
    {
        $trace = \PHPUnit\Util\Filter::getFilteredStacktrace($t);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if (!$this->colors) {
            return $trace;
        }

        $lines    = [];
        $prevPath = '';

<<<<<<< HEAD
        foreach (explode(PHP_EOL, $trace) as $line) {
            if (preg_match('/^(.*):(\d+)$/', $line, $matches)) {
=======
        foreach (\explode(\PHP_EOL, $trace) as $line) {
            if (\preg_match('/^(.*):(\d+)$/', $line, $matches)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $lines[] = Color::colorizePath($matches[1], $prevPath) .
                    Color::dim(':') .
                    Color::colorize('fg-blue', $matches[2]) .
                    "\n";
                $prevPath = $matches[1];
            } else {
                $lines[]  = $line;
                $prevPath = '';
            }
        }

<<<<<<< HEAD
        return implode('', $lines);
    }

    protected function formatTestResultMessage(Throwable $t, array $result, ?string $prefix = null): string
=======
        return \implode('', $lines);
    }

    protected function formatTestResultMessage(\Throwable $t, array $result, ?string $prefix = null): string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $message = $this->formatThrowable($t, $result['status']);
        $diff    = '';

        if (!($this->verbose || $result['verbose'])) {
            return '';
        }

        if ($message && $this->colors) {
            $style            = self::STATUS_STYLES[$result['status']]['message'] ?? '';
            [$message, $diff] = $this->colorizeMessageAndDiff($style, $message);
        }

        if ($prefix === null || !$this->colors) {
            $prefix = self::PREFIX_SIMPLE;
        }

        if ($this->colors) {
            $color  = self::STATUS_STYLES[$result['status']]['color'] ?? '';
<<<<<<< HEAD
            $prefix = array_map(static function ($p) use ($color)
            {
=======
            $prefix = \array_map(static function ($p) use ($color) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                return Color::colorize($color, $p);
            }, self::PREFIX_DECORATED);
        }

        $trace = $this->formatStacktrace($t);
<<<<<<< HEAD
        $out   = $this->prefixLines($prefix['start'], PHP_EOL) . PHP_EOL;

        if ($message) {
            $out .= $this->prefixLines($prefix['message'], $message . PHP_EOL) . PHP_EOL;
        }

        if ($diff) {
            $out .= $this->prefixLines($prefix['diff'], $diff . PHP_EOL) . PHP_EOL;
=======
        $out   = $this->prefixLines($prefix['start'], \PHP_EOL) . \PHP_EOL;

        if ($message) {
            $out .= $this->prefixLines($prefix['message'], $message . \PHP_EOL) . \PHP_EOL;
        }

        if ($diff) {
            $out .= $this->prefixLines($prefix['diff'], $diff . \PHP_EOL) . \PHP_EOL;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($trace) {
            if ($message || $diff) {
<<<<<<< HEAD
                $out .= $this->prefixLines($prefix['default'], PHP_EOL) . PHP_EOL;
            }
            $out .= $this->prefixLines($prefix['trace'], $trace . PHP_EOL) . PHP_EOL;
        }
        $out .= $this->prefixLines($prefix['last'], PHP_EOL) . PHP_EOL;
=======
                $out .= $this->prefixLines($prefix['default'], \PHP_EOL) . \PHP_EOL;
            }
            $out .= $this->prefixLines($prefix['trace'], $trace . \PHP_EOL) . \PHP_EOL;
        }
        $out .= $this->prefixLines($prefix['last'], \PHP_EOL) . \PHP_EOL;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $out;
    }

    protected function drawSpinner(): void
    {
        if ($this->colors) {
<<<<<<< HEAD
            $id = $this->spinState % count(self::SPINNER_ICONS);
=======
            $id =  $this->spinState % \count(self::SPINNER_ICONS);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->write(self::SPINNER_ICONS[$id]);
        }
    }

    protected function undrawSpinner(): void
    {
        if ($this->colors) {
<<<<<<< HEAD
            $id = $this->spinState % count(self::SPINNER_ICONS);
            $this->write("\e[1K\e[" . strlen(self::SPINNER_ICONS[$id]) . 'D');
=======
            $id =  $this->spinState % \count(self::SPINNER_ICONS);
            $this->write("\e[1K\e[" . \strlen(self::SPINNER_ICONS[$id]) . 'D');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    private function formatRuntime(float $time, string $color = ''): string
    {
        if (!$this->colors) {
<<<<<<< HEAD
            return sprintf('[%.2f ms]', $time * 1000);
=======
            return \sprintf('[%.2f ms]', $time * 1000);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($time > 1) {
            $color = 'fg-magenta';
        }

<<<<<<< HEAD
        return Color::colorize($color, ' ' . (int) ceil($time * 1000) . ' ' . Color::dim('ms'));
=======
        return Color::colorize($color, ' ' . (int) \ceil($time * 1000) . ' ' . Color::dim('ms'));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    private function printNonSuccessfulTestsSummary(int $numberOfExecutedTests): void
    {
        if (empty($this->nonSuccessfulTestResults)) {
            return;
        }

<<<<<<< HEAD
        if ((count($this->nonSuccessfulTestResults) / $numberOfExecutedTests) >= 0.7) {
=======
        if ((\count($this->nonSuccessfulTestResults) / $numberOfExecutedTests) >= 0.7) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return;
        }

        $this->write("Summary of non-successful tests:\n\n");

        $prevResult = $this->getEmptyTestResult();

        foreach ($this->nonSuccessfulTestResults as $testIndex) {
            $result = $this->testResults[$testIndex];
            $this->writeTestResult($prevResult, $result);
            $prevResult = $result;
        }
    }
}
