<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject\Stub;

<<<<<<< HEAD
use function sprintf;
use PHPUnit\Framework\MockObject\Invocation;
use SebastianBergmann\Exporter\Exporter;
use Throwable;
=======
use PHPUnit\Framework\MockObject\Invocation;
use SebastianBergmann\Exporter\Exporter;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Exception implements Stub
{
    private $exception;

<<<<<<< HEAD
    public function __construct(Throwable $exception)
=======
    public function __construct(\Throwable $exception)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->exception = $exception;
    }

    /**
<<<<<<< HEAD
     * @throws Throwable
=======
     * @throws \Throwable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function invoke(Invocation $invocation): void
    {
        throw $this->exception;
    }

    public function toString(): string
    {
        $exporter = new Exporter;

<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'raise user-specified exception %s',
            $exporter->export($this->exception)
        );
    }
}
