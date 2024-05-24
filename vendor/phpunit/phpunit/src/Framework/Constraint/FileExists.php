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
use function file_exists;
use function sprintf;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * Constraint that checks if the file(name) that it is evaluated for exists.
 *
 * The file path to check is passed as $other in evaluate().
 */
final class FileExists extends Constraint
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'file exists';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
<<<<<<< HEAD
        return file_exists($other);
    }

    /**
     * Returns the description of the failure.
=======
        return \file_exists($other);
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
<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'file "%s" exists',
            $other
        );
    }
}
