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
use function sprintf;
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * Constraint that asserts that the object it is evaluated for is an instance
 * of a given class.
 *
 * The expected class name is passed in the constructor.
 */
final class IsInstanceOf extends Constraint
{
    /**
     * @var string
     */
    private $className;

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'is instance of %s "%s"',
            $this->getType(),
            $this->className
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
        return $other instanceof $this->className;
    }

    /**
<<<<<<< HEAD
     * Returns the description of the failure.
=======
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
        return sprintf(
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            '%s is an instance of %s "%s"',
            $this->exporter()->shortenedExport($other),
            $this->getType(),
            $this->className
        );
    }

    private function getType(): string
    {
        try {
<<<<<<< HEAD
            $reflection = new ReflectionClass($this->className);
=======
            $reflection = new \ReflectionClass($this->className);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if ($reflection->isInterface()) {
                return 'interface';
            }
<<<<<<< HEAD
        } catch (ReflectionException $e) {
=======
        } catch (\ReflectionException $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return 'class';
    }
}
