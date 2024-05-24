<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

<<<<<<< HEAD
/**
 * This interface, as well as the associated mechanism for extending PHPUnit,
 * will be removed in PHPUnit 10. There is no alternative available in this
 * version of PHPUnit.
 *
 * @see https://github.com/sebastianbergmann/phpunit/issues/4676
 */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
interface AfterTestFailureHook extends TestHook
{
    public function executeAfterTestFailure(string $test, string $message, float $time): void;
}
