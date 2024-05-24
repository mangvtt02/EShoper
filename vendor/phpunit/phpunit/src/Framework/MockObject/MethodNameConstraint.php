<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject;

<<<<<<< HEAD
use function is_string;
use function sprintf;
use function strtolower;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Constraint\Constraint;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class MethodNameConstraint extends Constraint
{
    /**
     * @var string
     */
    private $methodName;

    public function __construct(string $methodName)
    {
        $this->methodName = $methodName;
    }

    public function toString(): string
    {
<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'is "%s"',
            $this->methodName
        );
    }

    protected function matches($other): bool
    {
<<<<<<< HEAD
        if (!is_string($other)) {
            return false;
        }

        return strtolower($this->methodName) === strtolower($other);
=======
        if (!\is_string($other)) {
            return false;
        }

        return \strtolower($this->methodName) === \strtolower($other);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
