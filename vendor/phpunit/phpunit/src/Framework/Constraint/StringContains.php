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
use function mb_stripos;
use function mb_strpos;
use function mb_strtolower;
use function sprintf;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * Constraint that asserts that the string it is evaluated for contains
 * a given string.
 *
 * Uses mb_strpos() to find the position of the string in the input, if not
 * found the evaluation fails.
 *
 * The sub-string is passed in the constructor.
 */
final class StringContains extends Constraint
{
    /**
     * @var string
     */
    private $string;

    /**
     * @var bool
     */
    private $ignoreCase;

    public function __construct(string $string, bool $ignoreCase = false)
    {
        $this->string     = $string;
        $this->ignoreCase = $ignoreCase;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        if ($this->ignoreCase) {
<<<<<<< HEAD
            $string = mb_strtolower($this->string);
=======
            $string = \mb_strtolower($this->string);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } else {
            $string = $this->string;
        }

<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'contains "%s"',
            $string
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        if ('' === $this->string) {
            return true;
        }

        if ($this->ignoreCase) {
<<<<<<< HEAD
            return mb_stripos($other, $this->string) !== false;
        }

        return mb_strpos($other, $this->string) !== false;
=======
            return \mb_stripos($other, $this->string) !== false;
        }

        return \mb_strpos($other, $this->string) !== false;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
