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
use function assert;
use function count;
use RecursiveIterator;

/**
 * @template-implements RecursiveIterator<int, Test>
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestSuiteIterator implements RecursiveIterator
=======
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestSuiteIterator implements \RecursiveIterator
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
{
    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var Test[]
     */
    private $tests;

    public function __construct(TestSuite $testSuite)
    {
        $this->tests = $testSuite->tests();
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
<<<<<<< HEAD
        return $this->position < count($this->tests);
=======
        return $this->position < \count($this->tests);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function key(): int
    {
        return $this->position;
    }

    public function current(): Test
    {
        return $this->tests[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    /**
     * @throws NoChildTestSuiteException
     */
    public function getChildren(): self
    {
        if (!$this->hasChildren()) {
            throw new NoChildTestSuiteException(
                'The current item is not a TestSuite instance and therefore does not have any children.'
            );
        }

        $current = $this->current();

<<<<<<< HEAD
        assert($current instanceof TestSuite);
=======
        \assert($current instanceof TestSuite);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return new self($current);
    }

    public function hasChildren(): bool
    {
        return $this->valid() && $this->current() instanceof TestSuite;
    }
}
