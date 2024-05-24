<?php
<<<<<<< HEAD

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
=======
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category  Mockery
 * @package   Mockery
 * @copyright Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license   http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */

namespace Mockery\Adapter\Phpunit;

<<<<<<< HEAD
use LogicException;
use Mockery;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Util\Blacklist;
use ReflectionClass;

use function dirname;
use function method_exists;
use function sprintf;
=======
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Blacklist;
use PHPUnit\Runner\BaseTestRunner;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

class TestListenerTrait
{
    /**
     * endTest is called after each test and checks if \Mockery::close() has
     * been called, and will let the test fail if it hasn't.
     *
<<<<<<< HEAD
     * @param Test $test
=======
     * @param Test  $test
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param float $time
     */
    public function endTest(Test $test, $time)
    {
<<<<<<< HEAD
        if (! $test instanceof TestCase) {
=======
        if (!$test instanceof TestCase) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            // We need the getTestResultObject and getStatus methods which are
            // not part of the interface.
            return;
        }

        if ($test->getStatus() !== BaseTestRunner::STATUS_PASSED) {
            // If the test didn't pass there is no guarantee that
            // verifyMockObjects and assertPostConditions have been called.
            // And even if it did, the point here is to prevent false
            // negatives, not to make failing tests fail for more reasons.
            return;
        }

        try {
            // The self() call is used as a sentinel. Anything that throws if
            // the container is closed already will do.
<<<<<<< HEAD
            Mockery::self();
        } catch (LogicException $logicException) {
=======
            \Mockery::self();
        } catch (\LogicException $_) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return;
        }

        $e = new ExpectationFailedException(
<<<<<<< HEAD
            sprintf(
=======
            \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                "Mockery's expectations have not been verified. Make sure that \Mockery::close() is called at the end of the test. Consider using %s\MockeryPHPUnitIntegration or extending %s\MockeryTestCase.",
                __NAMESPACE__,
                __NAMESPACE__
            )
        );

        /** @var \PHPUnit\Framework\TestResult $result */
        $result = $test->getTestResultObject();

        if ($result !== null) {
            $result->addFailure($test, $e, $time);
        }
    }

    public function startTestSuite()
    {
        if (method_exists(Blacklist::class, 'addDirectory')) {
<<<<<<< HEAD
            (new Blacklist())->getBlacklistedDirectories();
            Blacklist::addDirectory(dirname((new ReflectionClass(Mockery::class))->getFileName()));
        } else {
            Blacklist::$blacklistedClassNames[Mockery::class] = 1;
=======
            (new BlackList())->getBlacklistedDirectories();
            Blacklist::addDirectory(\dirname((new \ReflectionClass(\Mockery::class))->getFileName()));
        } else {
            Blacklist::$blacklistedClassNames[\Mockery::class] = 1;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }
}
