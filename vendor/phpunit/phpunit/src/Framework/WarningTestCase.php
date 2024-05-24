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

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class WarningTestCase extends TestCase
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

<<<<<<< HEAD
    public function __construct(string $message = '')
    {
        $this->message = $message;

=======
    /**
     * @param string $message
     */
    public function __construct($message = '')
    {
        $this->message = $message;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        parent::__construct('Warning');
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Returns a string representation of the test case.
     */
    public function toString(): string
    {
        return 'Warning';
    }

    /**
     * @throws Exception
     *
     * @psalm-return never-return
     */
    protected function runTest(): void
    {
        throw new Warning($this->message);
    }
}
