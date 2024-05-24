<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Constraint;

<<<<<<< HEAD
use function sprintf;
use function strpos;
use Throwable;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
final class ExceptionMessage extends Constraint
{
    /**
     * @var string
     */
    private $expectedMessage;

    public function __construct(string $expected)
    {
        $this->expectedMessage = $expected;
    }

    public function toString(): string
    {
        if ($this->expectedMessage === '') {
            return 'exception message is empty';
        }

        return 'exception message contains ';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param Throwable $other
=======
     * @param \Throwable $other
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function matches($other): bool
    {
        if ($this->expectedMessage === '') {
            return $other->getMessage() === '';
        }

<<<<<<< HEAD
        return strpos((string) $other->getMessage(), $this->expectedMessage) !== false;
    }

    /**
     * Returns the description of the failure.
=======
        return \strpos((string) $other->getMessage(), $this->expectedMessage) !== false;
    }

    /**
     * Returns the description of the failure
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other evaluated value or object
     */
    protected function failureDescription($other): string
    {
        if ($this->expectedMessage === '') {
<<<<<<< HEAD
            return sprintf(
=======
            return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                "exception message is empty but is '%s'",
                $other->getMessage()
            );
        }

<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            "exception message '%s' contains '%s'",
            $other->getMessage(),
            $this->expectedMessage
        );
    }
}
