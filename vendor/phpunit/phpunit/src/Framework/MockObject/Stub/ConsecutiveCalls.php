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
use function array_shift;
use function sprintf;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\MockObject\Invocation;
use SebastianBergmann\Exporter\Exporter;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ConsecutiveCalls implements Stub
{
    /**
     * @var array
     */
    private $stack;

    /**
     * @var mixed
     */
    private $value;

    public function __construct(array $stack)
    {
        $this->stack = $stack;
    }

    public function invoke(Invocation $invocation)
    {
<<<<<<< HEAD
        $this->value = array_shift($this->stack);
=======
        $this->value = \array_shift($this->stack);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($this->value instanceof Stub) {
            $this->value = $this->value->invoke($invocation);
        }

        return $this->value;
    }

    public function toString(): string
    {
        $exporter = new Exporter;

<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'return user-specified value %s',
            $exporter->export($this->value)
        );
    }
}
