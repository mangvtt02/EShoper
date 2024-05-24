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
use Throwable;

/**
 * This interface, as well as the associated mechanism for extending PHPUnit,
 * will be removed in PHPUnit 10. There is no alternative available in this
 * version of PHPUnit.
 *
 * @deprecated
 * @see https://github.com/sebastianbergmann/phpunit/issues/4676
 */
interface TestListener
{
    public function addError(Test $test, Throwable $t, float $time): void;

    public function addWarning(Test $test, Warning $e, float $time): void;

    public function addFailure(Test $test, AssertionFailedError $e, float $time): void;

    public function addIncompleteTest(Test $test, Throwable $t, float $time): void;

    public function addRiskyTest(Test $test, Throwable $t, float $time): void;

    public function addSkippedTest(Test $test, Throwable $t, float $time): void;

    public function startTestSuite(TestSuite $suite): void;

    public function endTestSuite(TestSuite $suite): void;

    public function startTest(Test $test): void;

=======
/**
 * @deprecated Use the `TestHook` interfaces instead
 */
interface TestListener
{
    /**
     * An error occurred.
     *
     * @deprecated Use `AfterTestErrorHook::executeAfterTestError` instead
     */
    public function addError(Test $test, \Throwable $t, float $time): void;

    /**
     * A warning occurred.
     *
     * @deprecated Use `AfterTestWarningHook::executeAfterTestWarning` instead
     */
    public function addWarning(Test $test, Warning $e, float $time): void;

    /**
     * A failure occurred.
     *
     * @deprecated Use `AfterTestFailureHook::executeAfterTestFailure` instead
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void;

    /**
     * Incomplete test.
     *
     * @deprecated Use `AfterIncompleteTestHook::executeAfterIncompleteTest` instead
     */
    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void;

    /**
     * Risky test.
     *
     * @deprecated Use `AfterRiskyTestHook::executeAfterRiskyTest` instead
     */
    public function addRiskyTest(Test $test, \Throwable $t, float $time): void;

    /**
     * Skipped test.
     *
     * @deprecated Use `AfterSkippedTestHook::executeAfterSkippedTest` instead
     */
    public function addSkippedTest(Test $test, \Throwable $t, float $time): void;

    /**
     * A test suite started.
     */
    public function startTestSuite(TestSuite $suite): void;

    /**
     * A test suite ended.
     */
    public function endTestSuite(TestSuite $suite): void;

    /**
     * A test started.
     *
     * @deprecated Use `BeforeTestHook::executeBeforeTest` instead
     */
    public function startTest(Test $test): void;

    /**
     * A test ended.
     *
     * @deprecated Use `AfterTestHook::executeAfterTest` instead
     */
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function endTest(Test $test, float $time): void;
}
