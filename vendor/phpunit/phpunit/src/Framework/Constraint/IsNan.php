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
use function is_nan;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * Constraint that accepts nan.
 */
final class IsNan extends Constraint
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is nan';
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
        return is_nan($other);
=======
        return \is_nan($other);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
