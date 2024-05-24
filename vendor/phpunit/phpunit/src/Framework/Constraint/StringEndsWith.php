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
use function strlen;
use function substr;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * Constraint that asserts that the string it is evaluated for ends with a given
 * suffix.
 */
final class StringEndsWith extends Constraint
{
    /**
     * @var string
     */
    private $suffix;

    public function __construct(string $suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'ends with "' . $this->suffix . '"';
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
        return substr($other, 0 - strlen($this->suffix)) === $this->suffix;
=======
        return \substr($other, 0 - \strlen($this->suffix)) === $this->suffix;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
