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

use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use PHPUnit\Framework\Exception;
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
final class Attribute extends Composite
{
    /**
     * @var string
     */
    private $attributeName;

    public function __construct(Constraint $constraint, string $attributeName)
    {
        parent::__construct($constraint);

        $this->attributeName = $attributeName;
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
<<<<<<< HEAD
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
=======
     * @throws ExpectationFailedException
     * @throws \PHPUnit\Framework\Exception
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function evaluate($other, string $description = '', bool $returnResult = false)
    {
        return parent::evaluate(
            Assert::readAttribute(
                $other,
                $this->attributeName
            ),
            $description,
            $returnResult
        );
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'attribute "' . $this->attributeName . '" ' . $this->innerConstraint()->toString();
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
     */
    protected function failureDescription($other): string
    {
        return $this->toString();
    }
}
