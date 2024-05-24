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
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use Throwable;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
final class ExceptionCode extends Constraint
{
    /**
     * @var int|string
     */
    private $expectedCode;

    /**
     * @param int|string $expected
     */
    public function __construct($expected)
    {
        $this->expectedCode = $expected;
    }

    public function toString(): string
    {
        return 'exception code is ';
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
        return (string) $other->getCode() === (string) $this->expectedCode;
    }

    /**
<<<<<<< HEAD
     * Returns the description of the failure.
=======
     * Returns the description of the failure
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other evaluated value or object
     *
<<<<<<< HEAD
     * @throws InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        return sprintf(
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            '%s is equal to expected exception code %s',
            $this->exporter()->export($other->getCode()),
            $this->exporter()->export($this->expectedCode)
        );
    }
}
