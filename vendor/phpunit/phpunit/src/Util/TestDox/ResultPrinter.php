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
use function get_class;
use function in_array;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Exception;
=======
use PHPUnit\Framework\AssertionFailedError;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Framework\WarningTestCase;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Util\Printer;
<<<<<<< HEAD
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use Throwable;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
abstract class ResultPrinter extends Printer implements TestListener
{
    /**
     * @var NamePrettifier
     */
    protected $prettifier;

    /**
     * @var string
     */
    protected $testClass = '';

    /**
     * @var int
     */
    protected $testStatus;

    /**
     * @var array
     */
    protected $tests = [];

    /**
     * @var int
     */
    protected $successful = 0;

    /**
     * @var int
     */
    protected $warned = 0;

    /**
     * @var int
     */
    protected $failed = 0;

    /**
     * @var int
     */
    protected $risky = 0;

    /**
     * @var int
     */
    protected $skipped = 0;

    /**
     * @var int
     */
    protected $incomplete = 0;

    /**
     * @var null|string
     */
    protected $currentTestClassPrettified;

    /**
     * @var null|string
     */
    protected $currentTestMethodPrettified;

    /**
     * @var array
     */
    private $groups;

    /**
     * @var array
     */
    private $excludeGroups;

    /**
     * @param resource $out
     *
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \PHPUnit\Framework\Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($out = null, array $groups = [], array $excludeGroups = [])
    {
        parent::__construct($out);

        $this->groups        = $groups;
        $this->excludeGroups = $excludeGroups;

        $this->prettifier = new NamePrettifier;
        $this->startRun();
    }

    /**
     * Flush buffer and close output.
     */
    public function flush(): void
    {
        $this->doEndClass();
        $this->endRun();

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
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->testStatus = BaseTestRunner::STATUS_ERROR;
        $this->failed++;
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->testStatus = BaseTestRunner::STATUS_WARNING;
        $this->warned++;
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->testStatus = BaseTestRunner::STATUS_FAILURE;
        $this->failed++;
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
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->testStatus = BaseTestRunner::STATUS_INCOMPLETE;
        $this->incomplete++;
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
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->testStatus = BaseTestRunner::STATUS_RISKY;
        $this->risky++;
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
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->testStatus = BaseTestRunner::STATUS_SKIPPED;
        $this->skipped++;
    }

    /**
     * A testsuite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A testsuite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A test started.
     *
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function startTest(Test $test): void
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $class = get_class($test);
=======
        $class = \get_class($test);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($this->testClass !== $class) {
            if ($this->testClass !== '') {
                $this->doEndClass();
            }

            $this->currentTestClassPrettified = $this->prettifier->prettifyTestClass($class);
            $this->testClass                  = $class;
            $this->tests                      = [];

            $this->startClass($class);
        }

        if ($test instanceof TestCase) {
            $this->currentTestMethodPrettified = $this->prettifier->prettifyTestCase($test);
        }

        $this->testStatus = BaseTestRunner::STATUS_PASSED;
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->tests[] = [$this->currentTestMethodPrettified, $this->testStatus];

        $this->currentTestClassPrettified  = null;
        $this->currentTestMethodPrettified = null;
    }

    protected function doEndClass(): void
    {
        foreach ($this->tests as $test) {
            $this->onTest($test[0], $test[1] === BaseTestRunner::STATUS_PASSED);
        }

        $this->endClass($this->testClass);
    }

    /**
     * Handler for 'start run' event.
     */
    protected function startRun(): void
    {
    }

    /**
     * Handler for 'start class' event.
     */
    protected function startClass(string $name): void
    {
    }

    /**
     * Handler for 'on test' event.
     */
    protected function onTest($name, bool $success = true): void
    {
    }

    /**
     * Handler for 'end class' event.
     */
    protected function endClass(string $name): void
    {
    }

    /**
     * Handler for 'end run' event.
     */
    protected function endRun(): void
    {
    }

    private function isOfInterest(Test $test): bool
    {
        if (!$test instanceof TestCase) {
            return false;
        }

        if ($test instanceof WarningTestCase) {
            return false;
        }

        if (!empty($this->groups)) {
            foreach ($test->getGroups() as $group) {
<<<<<<< HEAD
                if (in_array($group, $this->groups, true)) {
=======
                if (\in_array($group, $this->groups)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    return true;
                }
            }

            return false;
        }

        if (!empty($this->excludeGroups)) {
            foreach ($test->getGroups() as $group) {
<<<<<<< HEAD
                if (in_array($group, $this->excludeGroups, true)) {
=======
                if (\in_array($group, $this->excludeGroups)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    return false;
                }
            }

            return true;
        }

        return true;
    }
}
