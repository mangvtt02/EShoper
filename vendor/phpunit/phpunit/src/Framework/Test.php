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

use Countable;

/**
 * A Test can be run and collect its results.
 */
interface Test extends Countable
{
    /**
     * Runs a test and collects its result in a TestResult instance.
     */
<<<<<<< HEAD
    public function run(?TestResult $result = null): TestResult;
=======
    public function run(TestResult $result = null): TestResult;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
