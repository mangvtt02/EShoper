<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject\Rule;

<<<<<<< HEAD
use function count;
use function gettype;
use function is_iterable;
use function sprintf;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\InvalidParameterGroupException;
use PHPUnit\Framework\MockObject\Invocation as BaseInvocation;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\InvalidParameterGroupException;
use PHPUnit\Framework\MockObject\Invocation as BaseInvocation;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ConsecutiveParameters implements ParametersRule
{
    /**
     * @var array
     */
    private $parameterGroups = [];

    /**
     * @var array
     */
    private $invocations = [];

    /**
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \PHPUnit\Framework\Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(array $parameterGroups)
    {
        foreach ($parameterGroups as $index => $parameters) {
<<<<<<< HEAD
            if (!is_iterable($parameters)) {
                throw new InvalidParameterGroupException(
                    sprintf(
                        'Parameter group #%d must be an array or Traversable, got %s',
                        $index,
                        gettype($parameters)
=======
            if (!\is_iterable($parameters)) {
                throw new InvalidParameterGroupException(
                    \sprintf(
                        'Parameter group #%d must be an array or Traversable, got %s',
                        $index,
                        \gettype($parameters)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    )
                );
            }

            foreach ($parameters as $parameter) {
                if (!$parameter instanceof Constraint) {
                    $parameter = new IsEqual($parameter);
                }

                $this->parameterGroups[$index][] = $parameter;
            }
        }
    }

    public function toString(): string
    {
        return 'with consecutive parameters';
    }

    /**
     * @throws ExpectationFailedException
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function apply(BaseInvocation $invocation): void
    {
        $this->invocations[] = $invocation;
<<<<<<< HEAD
        $callIndex           = count($this->invocations) - 1;
=======
        $callIndex           = \count($this->invocations) - 1;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $this->verifyInvocation($invocation, $callIndex);
    }

    /**
<<<<<<< HEAD
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
=======
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function verify(): void
    {
        foreach ($this->invocations as $callIndex => $invocation) {
            $this->verifyInvocation($invocation, $callIndex);
        }
    }

    /**
<<<<<<< HEAD
     * Verify a single invocation.
=======
     * Verify a single invocation
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param int $callIndex
     *
     * @throws ExpectationFailedException
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function verifyInvocation(BaseInvocation $invocation, $callIndex): void
    {
        if (!isset($this->parameterGroups[$callIndex])) {
            // no parameter assertion for this call index
            return;
        }

        if ($invocation === null) {
            throw new ExpectationFailedException(
                'Mocked method does not exist.'
            );
        }

        $parameters = $this->parameterGroups[$callIndex];

<<<<<<< HEAD
        if (count($invocation->getParameters()) < count($parameters)) {
            throw new ExpectationFailedException(
                sprintf(
=======
        if (\count($invocation->getParameters()) < \count($parameters)) {
            throw new ExpectationFailedException(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Parameter count for invocation %s is too low.',
                    $invocation->toString()
                )
            );
        }

        foreach ($parameters as $i => $parameter) {
            $parameter->evaluate(
                $invocation->getParameters()[$i],
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Parameter %s for invocation #%d %s does not match expected ' .
                    'value.',
                    $i,
                    $callIndex,
                    $invocation->toString()
                )
            );
        }
    }
}
