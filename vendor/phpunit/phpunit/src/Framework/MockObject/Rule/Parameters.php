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
use function get_class;
use function sprintf;
use Exception;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\IsAnything;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\MockObject\Invocation as BaseInvocation;
<<<<<<< HEAD
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Parameters implements ParametersRule
{
    /**
     * @var Constraint[]
     */
    private $parameters = [];

    /**
     * @var BaseInvocation
     */
    private $invocation;

    /**
     * @var bool|ExpectationFailedException
     */
    private $parameterVerificationResult;

    /**
     * @throws \PHPUnit\Framework\Exception
     */
    public function __construct(array $parameters)
    {
        foreach ($parameters as $parameter) {
            if (!($parameter instanceof Constraint)) {
                $parameter = new IsEqual(
                    $parameter
                );
            }

            $this->parameters[] = $parameter;
        }
    }

    public function toString(): string
    {
        $text = 'with parameter';

        foreach ($this->parameters as $index => $parameter) {
            if ($index > 0) {
                $text .= ' and';
            }

            $text .= ' ' . $index . ' ' . $parameter->toString();
        }

        return $text;
    }

    /**
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function apply(BaseInvocation $invocation): void
    {
        $this->invocation                  = $invocation;
        $this->parameterVerificationResult = null;

        try {
            $this->parameterVerificationResult = $this->doVerify();
        } catch (ExpectationFailedException $e) {
            $this->parameterVerificationResult = $e;

            throw $this->parameterVerificationResult;
        }
    }

    /**
     * Checks if the invocation $invocation matches the current rules. If it
     * does the rule will get the invoked() method called which should check
     * if an expectation is met.
     *
     * @throws ExpectationFailedException
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function verify(): void
    {
        $this->doVerify();
    }

    /**
     * @throws ExpectationFailedException
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function doVerify(): bool
    {
        if (isset($this->parameterVerificationResult)) {
            return $this->guardAgainstDuplicateEvaluationOfParameterConstraints();
        }

        if ($this->invocation === null) {
            throw new ExpectationFailedException('Mocked method does not exist.');
        }

<<<<<<< HEAD
        if (count($this->invocation->getParameters()) < count($this->parameters)) {
=======
        if (\count($this->invocation->getParameters()) < \count($this->parameters)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $message = 'Parameter count for invocation %s is too low.';

            // The user called `->with($this->anything())`, but may have meant
            // `->withAnyParameters()`.
            //
            // @see https://github.com/sebastianbergmann/phpunit-mock-objects/issues/199
<<<<<<< HEAD
            if (count($this->parameters) === 1 &&
                get_class($this->parameters[0]) === IsAnything::class) {
=======
            if (\count($this->parameters) === 1 &&
                \get_class($this->parameters[0]) === IsAnything::class) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $message .= "\nTo allow 0 or more parameters with any value, omit ->with() or use ->withAnyParameters() instead.";
            }

            throw new ExpectationFailedException(
<<<<<<< HEAD
                sprintf($message, $this->invocation->toString())
=======
                \sprintf($message, $this->invocation->toString())
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            );
        }

        foreach ($this->parameters as $i => $parameter) {
            $parameter->evaluate(
                $this->invocation->getParameters()[$i],
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Parameter %s for invocation %s does not match expected ' .
                    'value.',
                    $i,
                    $this->invocation->toString()
                )
            );
        }

        return true;
    }

    /**
     * @throws ExpectationFailedException
     */
    private function guardAgainstDuplicateEvaluationOfParameterConstraints(): bool
    {
        if ($this->parameterVerificationResult instanceof ExpectationFailedException) {
            throw $this->parameterVerificationResult;
        }

        return (bool) $this->parameterVerificationResult;
    }
}
