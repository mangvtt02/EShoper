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

/**
 * Constraint that evaluates against a specified closure.
<<<<<<< HEAD
 *
 * @psalm-template CallbackInput of mixed
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
final class Callback extends Constraint
{
    /**
     * @var callable
<<<<<<< HEAD
     *
     * @psalm-var callable(CallbackInput $input): bool
     */
    private $callback;

    /** @psalm-param callable(CallbackInput $input): bool $callback */
=======
     */
    private $callback;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is accepted by specified callback';
    }

    /**
     * Evaluates the constraint for parameter $value. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
<<<<<<< HEAD
     *
     * @psalm-param CallbackInput $other
     */
    protected function matches($other): bool
    {
        return ($this->callback)($other);
=======
     */
    protected function matches($other): bool
    {
        return \call_user_func($this->callback, $other);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
