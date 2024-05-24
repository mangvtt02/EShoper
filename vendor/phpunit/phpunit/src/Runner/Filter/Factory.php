<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner\Filter;

<<<<<<< HEAD
use function sprintf;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use FilterIterator;
use InvalidArgumentException;
use Iterator;
use PHPUnit\Framework\TestSuite;
<<<<<<< HEAD
use RecursiveFilterIterator;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use ReflectionClass;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Factory
{
    /**
     * @var array
     */
    private $filters = [];

    /**
     * @throws InvalidArgumentException
     */
    public function addFilter(ReflectionClass $filter, $args): void
    {
<<<<<<< HEAD
        if (!$filter->isSubclassOf(RecursiveFilterIterator::class)) {
            throw new InvalidArgumentException(
                sprintf(
=======
        if (!$filter->isSubclassOf(\RecursiveFilterIterator::class)) {
            throw new InvalidArgumentException(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Class "%s" does not extend RecursiveFilterIterator',
                    $filter->name
                )
            );
        }

        $this->filters[] = [$filter, $args];
    }

    public function factory(Iterator $iterator, TestSuite $suite): FilterIterator
    {
        foreach ($this->filters as $filter) {
            [$class, $args] = $filter;
            $iterator       = $class->newInstance($iterator, $args, $suite);
        }

        return $iterator;
    }
}
