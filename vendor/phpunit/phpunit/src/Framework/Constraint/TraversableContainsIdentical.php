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
use function is_array;
use function is_string;
use function sprintf;
use function strpos;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use SplObjectStorage;

/**
 * Constraint that asserts that the Traversable it is applied to contains
 * a given value (using strict comparison).
 */
final class TraversableContainsIdentical extends Constraint
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Returns a string representation of the constraint.
     *
<<<<<<< HEAD
     * @throws InvalidArgumentException
     */
    public function toString(): string
    {
        if (is_string($this->value) && strpos($this->value, "\n") !== false) {
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function toString(): string
    {
        if (\is_string($this->value) && \strpos($this->value, "\n") !== false) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return 'contains "' . $this->value . '"';
        }

        return 'contains ' . $this->exporter()->export($this->value);
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        if ($other instanceof SplObjectStorage) {
            return $other->contains($this->value);
        }

        foreach ($other as $element) {
            if ($this->value === $element) {
                return true;
            }
        }

        return false;
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
            '%s %s',
            is_array($other) ? 'an array' : 'a traversable',
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        return \sprintf(
            '%s %s',
            \is_array($other) ? 'an array' : 'a traversable',
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->toString()
        );
    }
}
