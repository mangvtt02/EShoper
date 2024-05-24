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
use SebastianBergmann\RecursionContext\InvalidArgumentException;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class SkippedTestCase extends TestCase
{
    /**
<<<<<<< HEAD
     * @var ?bool
=======
     * @var bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $backupGlobals = false;

    /**
<<<<<<< HEAD
     * @var ?bool
=======
     * @var bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $backupStaticAttributes = false;

    /**
<<<<<<< HEAD
     * @var ?bool
=======
     * @var bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $runTestInSeparateProcess = false;

    /**
<<<<<<< HEAD
=======
     * @var bool
     */
    protected $useErrorHandler = false;

    /**
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @var string
     */
    private $message;

    public function __construct(string $className, string $methodName, string $message = '')
    {
        parent::__construct($className . '::' . $methodName);

        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Returns a string representation of the test case.
     *
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function toString(): string
    {
        return $this->getName();
    }

    /**
     * @throws Exception
     */
    protected function runTest(): void
    {
        $this->markTestSkipped($this->message);
    }
}
