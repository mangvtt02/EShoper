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
use function array_values;
use function count;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use PHPUnit\Framework\ExpectationFailedException;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Logical AND.
 */
final class LogicalAnd extends Constraint
{
    /**
     * @var Constraint[]
     */
    private $constraints = [];

    public static function fromConstraints(Constraint ...$constraints): self
    {
        $constraint = new self;

<<<<<<< HEAD
        $constraint->constraints = array_values($constraints);
=======
        $constraint->constraints = \array_values($constraints);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $constraint;
    }

    /**
     * @param Constraint[] $constraints
     *
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \PHPUnit\Framework\Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function setConstraints(array $constraints): void
    {
        $this->constraints = [];

        foreach ($constraints as $constraint) {
            if (!($constraint instanceof Constraint)) {
<<<<<<< HEAD
                throw new Exception(
=======
                throw new \PHPUnit\Framework\Exception(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'All parameters to ' . __CLASS__ .
                    ' must be a constraint object.'
                );
            }

            $this->constraints[] = $constraint;
        }
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
        $success = true;

        foreach ($this->constraints as $constraint) {
            if (!$constraint->evaluate($other, $description, true)) {
                $success = false;

                break;
            }
        }

        if ($returnResult) {
            return $success;
        }

        if (!$success) {
            $this->fail($other, $description);
        }
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        $text = '';

        foreach ($this->constraints as $key => $constraint) {
            if ($key > 0) {
                $text .= ' and ';
            }

            $text .= $constraint->toString();
        }

        return $text;
    }

    /**
     * Counts the number of constraint elements.
     */
    public function count(): int
    {
        $count = 0;

        foreach ($this->constraints as $constraint) {
<<<<<<< HEAD
            $count += count($constraint);
=======
            $count += \count($constraint);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $count;
    }
}
