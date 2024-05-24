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
use function count;
use function is_array;
use function iterator_count;
use function sprintf;
use Countable;
use EmptyIterator;
=======
use Countable;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Generator;
use Iterator;
use IteratorAggregate;
use Traversable;

class Count extends Constraint
{
    /**
     * @var int
     */
    private $expectedCount;

    public function __construct(int $expected)
    {
        $this->expectedCount = $expected;
    }

    public function toString(): string
    {
<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'count matches %d',
            $this->expectedCount
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     */
    protected function matches($other): bool
    {
        return $this->expectedCount === $this->getCountOf($other);
    }

    /**
     * @param iterable $other
     */
    protected function getCountOf($other): ?int
    {
<<<<<<< HEAD
        if ($other instanceof Countable || is_array($other)) {
            return count($other);
        }

        if ($other instanceof EmptyIterator) {
=======
        if ($other instanceof Countable || \is_array($other)) {
            return \count($other);
        }

        if ($other instanceof \EmptyIterator) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return 0;
        }

        if ($other instanceof Traversable) {
            while ($other instanceof IteratorAggregate) {
                $other = $other->getIterator();
            }

            $iterator = $other;

            if ($iterator instanceof Generator) {
                return $this->getCountOfGenerator($iterator);
            }

            if (!$iterator instanceof Iterator) {
<<<<<<< HEAD
                return iterator_count($iterator);
            }

            $key   = $iterator->key();
            $count = iterator_count($iterator);
=======
                return \iterator_count($iterator);
            }

            $key   = $iterator->key();
            $count = \iterator_count($iterator);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            // Manually rewind $iterator to previous key, since iterator_count
            // moves pointer.
            if ($key !== null) {
                $iterator->rewind();

                while ($iterator->valid() && $key !== $iterator->key()) {
                    $iterator->next();
                }
            }

            return $count;
        }

        return null;
    }

    /**
     * Returns the total number of iterations from a generator.
     * This will fully exhaust the generator.
     */
    protected function getCountOfGenerator(Generator $generator): int
    {
        for ($count = 0; $generator->valid(); $generator->next()) {
<<<<<<< HEAD
            $count++;
=======
            ++$count;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $count;
    }

    /**
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other evaluated value or object
     */
    protected function failureDescription($other): string
    {
<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'actual size %d matches expected size %d',
            $this->getCountOf($other),
            $this->expectedCount
        );
    }
}
