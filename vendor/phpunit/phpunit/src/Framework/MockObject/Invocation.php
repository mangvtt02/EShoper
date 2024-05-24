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
use function array_map;
use function implode;
use function is_object;
use function ltrim;
use function sprintf;
use function strpos;
use function strtolower;
use function substr;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Util\Type;
use SebastianBergmann\Exporter\Exporter;
use stdClass;
=======
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Util\Type;
use SebastianBergmann\Exporter\Exporter;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Invocation implements SelfDescribing
{
    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $methodName;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var string
     */
    private $returnType;

    /**
     * @var bool
     */
    private $isReturnTypeNullable = false;

    /**
     * @var bool
     */
    private $proxiedCall;

    /**
     * @var object
     */
    private $object;

    public function __construct(string $className, string $methodName, array $parameters, string $returnType, object $object, bool $cloneObjects = false, bool $proxiedCall = false)
    {
        $this->className   = $className;
        $this->methodName  = $methodName;
        $this->parameters  = $parameters;
        $this->object      = $object;
        $this->proxiedCall = $proxiedCall;

<<<<<<< HEAD
        $returnType = ltrim($returnType, ': ');

        if (strtolower($methodName) === '__tostring') {
            $returnType = 'string';
        }

        if (strpos($returnType, '?') === 0) {
            $returnType                 = substr($returnType, 1);
=======
        $returnType = \ltrim($returnType, ': ');

        if (\strtolower($methodName) === '__tostring') {
            $returnType = 'string';
        }

        if (\strpos($returnType, '?') === 0) {
            $returnType                 = \substr($returnType, 1);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->isReturnTypeNullable = true;
        }

        $this->returnType = $returnType;

        if (!$cloneObjects) {
            return;
        }

        foreach ($this->parameters as $key => $value) {
<<<<<<< HEAD
            if (is_object($value)) {
=======
            if (\is_object($value)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $this->parameters[$key] = $this->cloneObject($value);
            }
        }
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getMethodName(): string
    {
        return $this->methodName;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @throws RuntimeException
     *
     * @return mixed Mocked return value
     */
    public function generateReturnValue()
    {
        if ($this->isReturnTypeNullable || $this->proxiedCall) {
            return;
        }

<<<<<<< HEAD
        switch (strtolower($this->returnType)) {
=======
        switch (\strtolower($this->returnType)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            case '':
            case 'void':
                return;

            case 'string':
                return '';

            case 'float':
                return 0.0;

            case 'int':
                return 0;

            case 'bool':
                return false;

            case 'array':
                return [];

            case 'object':
<<<<<<< HEAD
                return new stdClass;

            case 'callable':
            case 'closure':
                return static function (): void
                {
=======
                return new \stdClass;

            case 'callable':
            case 'closure':
                return function (): void {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                };

            case 'traversable':
            case 'generator':
            case 'iterable':
<<<<<<< HEAD
                $generator = static function ()
                {
                    yield from [];
=======
                $generator = static function () {
                    yield;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                };

                return $generator();

            default:
                $generator = new Generator;

                return $generator->getMock($this->returnType, [], [], '', false);
        }
    }

    public function toString(): string
    {
        $exporter = new Exporter;

<<<<<<< HEAD
        return sprintf(
            '%s::%s(%s)%s',
            $this->className,
            $this->methodName,
            implode(
                ', ',
                array_map(
=======
        return \sprintf(
            '%s::%s(%s)%s',
            $this->className,
            $this->methodName,
            \implode(
                ', ',
                \array_map(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    [$exporter, 'shortenedExport'],
                    $this->parameters
                )
            ),
<<<<<<< HEAD
            $this->returnType ? sprintf(': %s', $this->returnType) : ''
=======
            $this->returnType ? \sprintf(': %s', $this->returnType) : ''
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );
    }

    public function getObject(): object
    {
        return $this->object;
    }

    private function cloneObject(object $original): object
    {
        if (Type::isCloneable($original)) {
            return clone $original;
        }

        return $original;
    }
}
