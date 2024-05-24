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
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

/**
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 *
=======
use PHPUnit\Framework\ExpectationFailedException;

/**
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 * @codeCoverageIgnore
 */
abstract class Composite extends Constraint
{
    /**
     * @var Constraint
     */
    private $innerConstraint;

    public function __construct(Constraint $innerConstraint)
    {
        $this->innerConstraint = $innerConstraint;
    }

    /**
<<<<<<< HEAD
     * Evaluates the constraint for parameter $other.
=======
     * Evaluates the constraint for parameter $other
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * If $returnResult is set to false (the default), an exception is thrown
     * in case of a failure. null is returned otherwise.
     *
     * If $returnResult is true, the result of the evaluation is returned as
     * a boolean value instead: true in case of success, false in case of a
     * failure.
     *
     * @throws ExpectationFailedException
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function evaluate($other, string $description = '', bool $returnResult = false)
    {
        try {
            return $this->innerConstraint->evaluate(
                $other,
                $description,
                $returnResult
            );
        } catch (ExpectationFailedException $e) {
            $this->fail($other, $description, $e->getComparisonFailure());
        }
    }

    /**
     * Counts the number of constraint elements.
     */
    public function count(): int
    {
<<<<<<< HEAD
        return count($this->innerConstraint);
=======
        return \count($this->innerConstraint);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    protected function innerConstraint(): Constraint
    {
        return $this->innerConstraint;
    }
}
