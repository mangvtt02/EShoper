<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\TestDox;

<<<<<<< HEAD
use function array_key_exists;
use function array_keys;
use function array_map;
use function array_pop;
use function array_values;
use function explode;
use function get_class;
use function gettype;
use function implode;
use function in_array;
use function is_bool;
use function is_float;
use function is_int;
use function is_numeric;
use function is_object;
use function is_scalar;
use function is_string;
use function ord;
use function preg_quote;
use function preg_replace;
use function range;
use function sprintf;
use function str_replace;
use function strlen;
use function strpos;
use function strtolower;
use function strtoupper;
use function substr;
use function trim;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Color;
use PHPUnit\Util\Exception as UtilException;
use PHPUnit\Util\Test;
<<<<<<< HEAD
use ReflectionException;
use ReflectionMethod;
use ReflectionObject;
use SebastianBergmann\Exporter\Exporter;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use SebastianBergmann\Exporter\Exporter;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class NamePrettifier
{
    /**
     * @var string[]
     */
    private $strings = [];

    /**
     * @var bool
     */
    private $useColor;

    public function __construct($useColor = false)
    {
        $this->useColor = $useColor;
    }

    /**
     * Prettifies the name of a test class.
     *
     * @psalm-param class-string $className
     */
    public function prettifyTestClass(string $className): string
    {
        try {
            $annotations = Test::parseTestMethodAnnotations($className);

            if (isset($annotations['class']['testdox'][0])) {
                return $annotations['class']['testdox'][0];
            }
        } catch (UtilException $e) {
            // ignore, determine className by parsing the provided name
        }

<<<<<<< HEAD
        $parts     = explode('\\', $className);
        $className = array_pop($parts);

        if (substr($className, -1 * strlen('Test')) === 'Test') {
            $className = substr($className, 0, strlen($className) - strlen('Test'));
        }

        if (strpos($className, 'Tests') === 0) {
            $className = substr($className, strlen('Tests'));
        } elseif (strpos($className, 'Test') === 0) {
            $className = substr($className, strlen('Test'));
=======
        $parts     = \explode('\\', $className);
        $className = \array_pop($parts);

        if (\substr($className, -1 * \strlen('Test')) === 'Test') {
            $className = \substr($className, 0, \strlen($className) - \strlen('Test'));
        }

        if (\strpos($className, 'Tests') === 0) {
            $className = \substr($className, \strlen('Tests'));
        } elseif (\strpos($className, 'Test') === 0) {
            $className = \substr($className, \strlen('Test'));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if (empty($className)) {
            $className = 'UnnamedTests';
        }

        if (!empty($parts)) {
            $parts[]            = $className;
<<<<<<< HEAD
            $fullyQualifiedName = implode('\\', $parts);
=======
            $fullyQualifiedName = \implode('\\', $parts);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } else {
            $fullyQualifiedName = $className;
        }

<<<<<<< HEAD
        $result = preg_replace('/(?<=[[:lower:]])(?=[[:upper:]])/u', ' ', $className);
=======
        $result       = '';
        $wasLowerCase = false;

        foreach (\range(0, \strlen($className) - 1) as $i) {
            $isLowerCase = \mb_strtolower($className[$i], 'UTF-8') === $className[$i];

            if ($wasLowerCase && !$isLowerCase) {
                $result .= ' ';
            }

            $result .= $className[$i];

            if ($isLowerCase) {
                $wasLowerCase = true;
            } else {
                $wasLowerCase = false;
            }
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($fullyQualifiedName !== $className) {
            return $result . ' (' . $fullyQualifiedName . ')';
        }

        return $result;
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function prettifyTestCase(TestCase $test): string
    {
        $annotations                = $test->getAnnotations();
        $annotationWithPlaceholders = false;

<<<<<<< HEAD
        $callback = static function (string $variable): string
        {
            return sprintf('/%s(?=\b)/', preg_quote($variable, '/'));
=======
        $callback = static function (string $variable): string {
            return \sprintf('/%s(?=\b)/', \preg_quote($variable, '/'));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        };

        if (isset($annotations['method']['testdox'][0])) {
            $result = $annotations['method']['testdox'][0];

<<<<<<< HEAD
            if (strpos($result, '$') !== false) {
                $annotation   = $annotations['method']['testdox'][0];
                $providedData = $this->mapTestMethodParameterNamesToProvidedDataValues($test);
                $variables    = array_map($callback, array_keys($providedData));

                $result = trim(preg_replace($variables, $providedData, $annotation));
=======
            if (\strpos($result, '$') !== false) {
                $annotation   = $annotations['method']['testdox'][0];
                $providedData = $this->mapTestMethodParameterNamesToProvidedDataValues($test);
                $variables    = \array_map($callback, \array_keys($providedData));

                $result = \trim(\preg_replace($variables, $providedData, $annotation));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                $annotationWithPlaceholders = true;
            }
        } else {
            $result = $this->prettifyTestMethod($test->getName(false));
        }

        if (!$annotationWithPlaceholders && $test->usesDataProvider()) {
            $result .= $this->prettifyDataSet($test);
        }

        return $result;
    }

    public function prettifyDataSet(TestCase $test): string
    {
        if (!$this->useColor) {
            return $test->getDataSetAsString(false);
        }

<<<<<<< HEAD
        if (is_int($test->dataName())) {
=======
        if (\is_int($test->dataName())) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $data = Color::dim(' with data set ') . Color::colorize('fg-cyan', (string) $test->dataName());
        } else {
            $data = Color::dim(' with ') . Color::colorize('fg-cyan', Color::visualizeWhitespace((string) $test->dataName()));
        }

        return $data;
    }

    /**
     * Prettifies the name of a test method.
     */
    public function prettifyTestMethod(string $name): string
    {
        $buffer = '';

        if ($name === '') {
            return $buffer;
        }

<<<<<<< HEAD
        $string = (string) preg_replace('#\d+$#', '', $name, -1, $count);

        if (in_array($string, $this->strings, true)) {
=======
        $string = (string) \preg_replace('#\d+$#', '', $name, -1, $count);

        if (\in_array($string, $this->strings)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $name = $string;
        } elseif ($count === 0) {
            $this->strings[] = $string;
        }

<<<<<<< HEAD
        if (strpos($name, 'test_') === 0) {
            $name = substr($name, 5);
        } elseif (strpos($name, 'test') === 0) {
            $name = substr($name, 4);
=======
        if (\strpos($name, 'test_') === 0) {
            $name = \substr($name, 5);
        } elseif (\strpos($name, 'test') === 0) {
            $name = \substr($name, 4);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($name === '') {
            return $buffer;
        }

<<<<<<< HEAD
        $name[0] = strtoupper($name[0]);

        if (strpos($name, '_') !== false) {
            return trim(str_replace('_', ' ', $name));
=======
        $name[0] = \strtoupper($name[0]);

        if (\strpos($name, '_') !== false) {
            return \trim(\str_replace('_', ' ', $name));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $wasNumeric = false;

<<<<<<< HEAD
        foreach (range(0, strlen($name) - 1) as $i) {
            if ($i > 0 && ord($name[$i]) >= 65 && ord($name[$i]) <= 90) {
                $buffer .= ' ' . strtolower($name[$i]);
            } else {
                $isNumeric = is_numeric($name[$i]);
=======
        foreach (\range(0, \strlen($name) - 1) as $i) {
            if ($i > 0 && \ord($name[$i]) >= 65 && \ord($name[$i]) <= 90) {
                $buffer .= ' ' . \strtolower($name[$i]);
            } else {
                $isNumeric = \is_numeric($name[$i]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                if (!$wasNumeric && $isNumeric) {
                    $buffer .= ' ';
                    $wasNumeric = true;
                }

                if ($wasNumeric && !$isNumeric) {
                    $wasNumeric = false;
                }

                $buffer .= $name[$i];
            }
        }

        return $buffer;
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function mapTestMethodParameterNamesToProvidedDataValues(TestCase $test): array
    {
        try {
<<<<<<< HEAD
            $reflector = new ReflectionMethod(get_class($test), $test->getName(false));
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new UtilException(
                $e->getMessage(),
                $e->getCode(),
=======
            $reflector = new \ReflectionMethod(\get_class($test), $test->getName(false));
            // @codeCoverageIgnoreStart
        } catch (\ReflectionException $e) {
            throw new UtilException(
                $e->getMessage(),
                (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        $providedData       = [];
<<<<<<< HEAD
        $providedDataValues = array_values($test->getProvidedData());
=======
        $providedDataValues = \array_values($test->getProvidedData());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $i                  = 0;

        $providedData['$_dataName'] = $test->dataName();

        foreach ($reflector->getParameters() as $parameter) {
<<<<<<< HEAD
            if (!array_key_exists($i, $providedDataValues) && $parameter->isDefaultValueAvailable()) {
                try {
                    $providedDataValues[$i] = $parameter->getDefaultValue();
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new UtilException(
                        $e->getMessage(),
                        $e->getCode(),
=======
            if (!\array_key_exists($i, $providedDataValues) && $parameter->isDefaultValueAvailable()) {
                try {
                    $providedDataValues[$i] = $parameter->getDefaultValue();
                    // @codeCoverageIgnoreStart
                } catch (\ReflectionException $e) {
                    throw new UtilException(
                        $e->getMessage(),
                        (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd
            }

            $value = $providedDataValues[$i++] ?? null;

<<<<<<< HEAD
            if (is_object($value)) {
                $reflector = new ReflectionObject($value);
=======
            if (\is_object($value)) {
                $reflector = new \ReflectionObject($value);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                if ($reflector->hasMethod('__toString')) {
                    $value = (string) $value;
                } else {
<<<<<<< HEAD
                    $value = get_class($value);
                }
            }

            if (!is_scalar($value)) {
                $value = gettype($value);
            }

            if (is_bool($value) || is_int($value) || is_float($value)) {
                $value = (new Exporter)->export($value);
            }

            if (is_string($value) && $value === '') {
=======
                    $value = \get_class($value);
                }
            }

            if (!\is_scalar($value)) {
                $value = \gettype($value);
            }

            if (\is_bool($value) || \is_int($value) || \is_float($value)) {
                $value = (new Exporter)->export($value);
            }

            if (\is_string($value) && $value === '') {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if ($this->useColor) {
                    $value = Color::colorize('dim,underlined', 'empty');
                } else {
                    $value = "''";
                }
            }

            $providedData['$' . $parameter->getName()] = $value;
        }

        if ($this->useColor) {
<<<<<<< HEAD
            $providedData = array_map(static function ($value)
            {
=======
            $providedData = \array_map(static function ($value) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                return Color::colorize('fg-cyan', Color::visualizeWhitespace((string) $value, true));
            }, $providedData);
        }

        return $providedData;
    }
}
