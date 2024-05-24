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
use function get_class;
use function preg_match;
use function str_replace;
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use PHPUnit\Framework\ExpectationFailedException;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Logical NOT.
 */
final class LogicalNot extends Constraint
{
    /**
     * @var Constraint
     */
    private $constraint;

    public static function negate(string $string): string
    {
        $positives = [
            'contains ',
            'exists',
            'has ',
            'is ',
            'are ',
            'matches ',
            'starts with ',
            'ends with ',
            'reference ',
            'not not ',
        ];

        $negatives = [
            'does not contain ',
            'does not exist',
            'does not have ',
            'is not ',
            'are not ',
            'does not match ',
            'starts not with ',
            'ends not with ',
            'don\'t reference ',
            'not ',
        ];

<<<<<<< HEAD
        preg_match('/(\'[\w\W]*\')([\w\W]*)("[\w\W]*")/i', $string, $matches);

        if (count($matches) > 0) {
            $nonInput = $matches[2];

            $negatedString = str_replace(
                $nonInput,
                str_replace(
=======
        \preg_match('/(\'[\w\W]*\')([\w\W]*)("[\w\W]*")/i', $string, $matches);

        if (\count($matches) > 0) {
            $nonInput = $matches[2];

            $negatedString = \str_replace(
                $nonInput,
                \str_replace(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $positives,
                    $negatives,
                    $nonInput
                ),
                $string
            );
        } else {
<<<<<<< HEAD
            $negatedString = str_replace(
=======
            $negatedString = \str_replace(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $positives,
                $negatives,
                $string
            );
        }

        return $negatedString;
    }

    /**
     * @param Constraint|mixed $constraint
     */
    public function __construct($constraint)
    {
        if (!($constraint instanceof Constraint)) {
            $constraint = new IsEqual($constraint);
        }

        $this->constraint = $constraint;
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
        $success = !$this->constraint->evaluate($other, $description, true);

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
<<<<<<< HEAD
        switch (get_class($this->constraint)) {
=======
        switch (\get_class($this->constraint)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            case LogicalAnd::class:
            case self::class:
            case LogicalOr::class:
                return 'not( ' . $this->constraint->toString() . ' )';

            default:
                return self::negate(
                    $this->constraint->toString()
                );
        }
    }

    /**
     * Counts the number of constraint elements.
     */
    public function count(): int
    {
<<<<<<< HEAD
        return count($this->constraint);
    }

    /**
     * Returns the description of the failure.
=======
        return \count($this->constraint);
    }

    /**
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
        switch (get_class($this->constraint)) {
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        switch (\get_class($this->constraint)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            case LogicalAnd::class:
            case self::class:
            case LogicalOr::class:
                return 'not( ' . $this->constraint->failureDescription($other) . ' )';

            default:
                return self::negate(
                    $this->constraint->failureDescription($other)
                );
        }
    }
}
