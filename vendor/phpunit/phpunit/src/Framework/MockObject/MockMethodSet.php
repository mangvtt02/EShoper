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
use function array_key_exists;
use function array_values;
use function strtolower;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class MockMethodSet
{
    /**
     * @var MockMethod[]
     */
    private $methods = [];

    public function addMethods(MockMethod ...$methods): void
    {
        foreach ($methods as $method) {
<<<<<<< HEAD
            $this->methods[strtolower($method->getName())] = $method;
=======
            $this->methods[\strtolower($method->getName())] = $method;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * @return MockMethod[]
     */
    public function asArray(): array
    {
<<<<<<< HEAD
        return array_values($this->methods);
=======
        return \array_values($this->methods);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function hasMethod(string $methodName): bool
    {
<<<<<<< HEAD
        return array_key_exists(strtolower($methodName), $this->methods);
=======
        return \array_key_exists(\strtolower($methodName), $this->methods);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
