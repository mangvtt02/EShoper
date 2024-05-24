<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Formatter;

<<<<<<< HEAD
use Psy\Reflection\ReflectionConstant;
=======
use Psy\Reflection\ReflectionClassConstant;
use Psy\Reflection\ReflectionConstant_;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\Reflection\ReflectionLanguageConstruct;
use Psy\Util\Json;
use Symfony\Component\Console\Formatter\OutputFormatter;

/**
 * An abstract representation of a function, class or property signature.
 */
class SignatureFormatter implements ReflectorFormatter
{
    /**
     * Format a signature for the given reflector.
     *
     * Defers to subclasses to do the actual formatting.
     *
     * @param \Reflector $reflector
     *
     * @return string Formatted signature
     */
<<<<<<< HEAD
    public static function format(\Reflector $reflector): string
=======
    public static function format(\Reflector $reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        switch (true) {
            case $reflector instanceof \ReflectionFunction:
            case $reflector instanceof ReflectionLanguageConstruct:
                return self::formatFunction($reflector);

<<<<<<< HEAD
            case $reflector instanceof \ReflectionClass:
                // this case also covers \ReflectionObject
                return self::formatClass($reflector);

=======
            // this case also covers \ReflectionObject:
            case $reflector instanceof \ReflectionClass:
                return self::formatClass($reflector);

            case $reflector instanceof ReflectionClassConstant:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            case $reflector instanceof \ReflectionClassConstant:
                return self::formatClassConstant($reflector);

            case $reflector instanceof \ReflectionMethod:
                return self::formatMethod($reflector);

            case $reflector instanceof \ReflectionProperty:
                return self::formatProperty($reflector);

<<<<<<< HEAD
            case $reflector instanceof ReflectionConstant:
                return self::formatConstant($reflector);

            default:
                throw new \InvalidArgumentException('Unexpected Reflector class: '.\get_class($reflector));
=======
            case $reflector instanceof ReflectionConstant_:
                return self::formatConstant($reflector);

            default:
                throw new \InvalidArgumentException('Unexpected Reflector class: ' . \get_class($reflector));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * Print the signature name.
     *
<<<<<<< HEAD
     * @param \ReflectionClass|\ReflectionClassConstant|\ReflectionFunctionAbstract $reflector
     *
     * @return string Formatted name
     */
    public static function formatName(\Reflector $reflector): string
=======
     * @param \Reflector $reflector
     *
     * @return string Formatted name
     */
    public static function formatName(\Reflector $reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $reflector->getName();
    }

    /**
     * Print the method, property or class modifiers.
     *
<<<<<<< HEAD
     * @param \ReflectionMethod|\ReflectionProperty|\ReflectionClass $reflector
     *
     * @return string Formatted modifiers
     */
    private static function formatModifiers(\Reflector $reflector): string
    {
=======
     * @param \Reflector $reflector
     *
     * @return string Formatted modifiers
     */
    private static function formatModifiers(\Reflector $reflector)
    {
        if ($reflector instanceof \ReflectionClass && $reflector->isTrait()) {
            // For some reason, PHP 5.x returns `abstract public` modifiers for
            // traits. Let's just ignore that business entirely.
            if (\version_compare(PHP_VERSION, '7.0.0', '<')) {
                return '';
            }
        }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return \implode(' ', \array_map(function ($modifier) {
            return \sprintf('<keyword>%s</keyword>', $modifier);
        }, \Reflection::getModifierNames($reflector->getModifiers())));
    }

    /**
     * Format a class signature.
     *
     * @param \ReflectionClass $reflector
     *
     * @return string Formatted signature
     */
<<<<<<< HEAD
    private static function formatClass(\ReflectionClass $reflector): string
=======
    private static function formatClass(\ReflectionClass $reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $chunks = [];

        if ($modifiers = self::formatModifiers($reflector)) {
            $chunks[] = $modifiers;
        }

        if ($reflector->isTrait()) {
            $chunks[] = 'trait';
        } else {
            $chunks[] = $reflector->isInterface() ? 'interface' : 'class';
        }

        $chunks[] = \sprintf('<class>%s</class>', self::formatName($reflector));

        if ($parent = $reflector->getParentClass()) {
            $chunks[] = 'extends';
            $chunks[] = \sprintf('<class>%s</class>', $parent->getName());
        }

        $interfaces = $reflector->getInterfaceNames();
        if (!empty($interfaces)) {
            \sort($interfaces);

            $chunks[] = $reflector->isInterface() ? 'extends' : 'implements';
            $chunks[] = \implode(', ', \array_map(function ($name) {
                return \sprintf('<class>%s</class>', $name);
            }, $interfaces));
        }

        return \implode(' ', $chunks);
    }

    /**
     * Format a constant signature.
     *
<<<<<<< HEAD
     * @param \ReflectionClassConstant $reflector
     *
     * @return string Formatted signature
     */
    private static function formatClassConstant($reflector): string
=======
     * @param ReflectionClassConstant|\ReflectionClassConstant $reflector
     *
     * @return string Formatted signature
     */
    private static function formatClassConstant($reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $value = $reflector->getValue();
        $style = self::getTypeStyle($value);

        return \sprintf(
            '<keyword>const</keyword> <const>%s</const> = <%s>%s</%s>',
            self::formatName($reflector),
            $style,
            OutputFormatter::escape(Json::encode($value)),
            $style
        );
    }

    /**
     * Format a constant signature.
     *
<<<<<<< HEAD
     * @param ReflectionConstant $reflector
     *
     * @return string Formatted signature
     */
    private static function formatConstant(ReflectionConstant $reflector): string
=======
     * @param ReflectionConstant_ $reflector
     *
     * @return string Formatted signature
     */
    private static function formatConstant($reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $value = $reflector->getValue();
        $style = self::getTypeStyle($value);

        return \sprintf(
            '<keyword>define</keyword>(<string>%s</string>, <%s>%s</%s>)',
            OutputFormatter::escape(Json::encode($reflector->getName())),
            $style,
            OutputFormatter::escape(Json::encode($value)),
            $style
        );
    }

    /**
     * Helper for getting output style for a given value's type.
     *
     * @param mixed $value
<<<<<<< HEAD
     */
    private static function getTypeStyle($value): string
=======
     *
     * @return string
     */
    private static function getTypeStyle($value)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (\is_int($value) || \is_float($value)) {
            return 'number';
        } elseif (\is_string($value)) {
            return 'string';
<<<<<<< HEAD
        } elseif (\is_bool($value) || $value === null) {
=======
        } elseif (\is_bool($value) || \is_null($value)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return 'bool';
        } else {
            return 'strong'; // @codeCoverageIgnore
        }
    }

    /**
     * Format a property signature.
     *
     * @param \ReflectionProperty $reflector
     *
     * @return string Formatted signature
     */
<<<<<<< HEAD
    private static function formatProperty(\ReflectionProperty $reflector): string
=======
    private static function formatProperty(\ReflectionProperty $reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \sprintf(
            '%s <strong>$%s</strong>',
            self::formatModifiers($reflector),
            $reflector->getName()
        );
    }

    /**
     * Format a function signature.
     *
     * @param \ReflectionFunction $reflector
     *
     * @return string Formatted signature
     */
<<<<<<< HEAD
    private static function formatFunction(\ReflectionFunctionAbstract $reflector): string
    {
        return \sprintf(
            '<keyword>function</keyword> %s<function>%s</function>(%s)%s',
            $reflector->returnsReference() ? '&' : '',
            self::formatName($reflector),
            \implode(', ', self::formatFunctionParams($reflector)),
            self::formatFunctionReturnType($reflector)
=======
    private static function formatFunction(\ReflectionFunctionAbstract $reflector)
    {
        return \sprintf(
            '<keyword>function</keyword> %s<function>%s</function>(%s)',
            $reflector->returnsReference() ? '&' : '',
            self::formatName($reflector),
            \implode(', ', self::formatFunctionParams($reflector))
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );
    }

    /**
<<<<<<< HEAD
     * Format a function signature's return type (if available).
     *
     * @param \ReflectionFunctionAbstract $reflector
     *
     * @return string Formatted return type
     */
    private static function formatFunctionReturnType(\ReflectionFunctionAbstract $reflector): string
    {
        if (!\method_exists($reflector, 'hasReturnType') || !$reflector->hasReturnType()) {
            return '';
        }

        return \sprintf(': %s', self::formatReflectionType($reflector->getReturnType(), true));
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Format a method signature.
     *
     * @param \ReflectionMethod $reflector
     *
     * @return string Formatted signature
     */
<<<<<<< HEAD
    private static function formatMethod(\ReflectionMethod $reflector): string
=======
    private static function formatMethod(\ReflectionMethod $reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \sprintf(
            '%s %s',
            self::formatModifiers($reflector),
            self::formatFunction($reflector)
        );
    }

    /**
     * Print the function params.
     *
     * @param \ReflectionFunctionAbstract $reflector
     *
     * @return array
     */
<<<<<<< HEAD
    private static function formatFunctionParams(\ReflectionFunctionAbstract $reflector): array
=======
    private static function formatFunctionParams(\ReflectionFunctionAbstract $reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $params = [];
        foreach ($reflector->getParameters() as $param) {
            $hint = '';
            try {
<<<<<<< HEAD
                if (\method_exists($param, 'getType')) {
                    // Only include the inquisitive nullable type iff param default value is not null.
                    $defaultIsNull = $param->isOptional() && $param->isDefaultValueAvailable() && $param->getDefaultValue() === null;
                    $hint = self::formatReflectionType($param->getType(), !$defaultIsNull);
                } else {
                    if ($param->isArray()) {
                        $hint = '<keyword>array</keyword>';
                    } elseif ($class = $param->getClass()) {
                        $hint = \sprintf('<class>%s</class>', $class->getName());
                    }
                }
            } catch (\Throwable $e) {
=======
                if ($param->isArray()) {
                    $hint = '<keyword>array</keyword> ';
                } elseif ($class = $param->getClass()) {
                    $hint = \sprintf('<class>%s</class> ', $class->getName());
                }
            } catch (\Exception $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                // sometimes we just don't know...
                // bad class names, or autoloaded classes that haven't been loaded yet, or whathaveyou.
                // come to think of it, the only time I've seen this is with the intl extension.

                // Hax: we'll try to extract it :P

                // @codeCoverageIgnoreStart
<<<<<<< HEAD
                $chunks = \explode('$'.$param->getName(), (string) $param);
                $chunks = \explode(' ', \trim($chunks[0]));
                $guess = \end($chunks);

                $hint = \sprintf('<urgent>%s</urgent>', OutputFormatter::escape($guess));
=======
                $chunks = \explode('$' . $param->getName(), (string) $param);
                $chunks = \explode(' ', \trim($chunks[0]));
                $guess  = \end($chunks);

                $hint = \sprintf('<urgent>%s</urgent> ', $guess);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                // @codeCoverageIgnoreEnd
            }

            if ($param->isOptional()) {
                if (!$param->isDefaultValueAvailable()) {
<<<<<<< HEAD
                    $value = 'unknown';
                    $typeStyle = 'urgent';
                } else {
                    $value = $param->getDefaultValue();
                    $typeStyle = self::getTypeStyle($value);
                    $value = \is_array($value) ? '[]' : ($value === null ? 'null' : \var_export($value, true));
=======
                    $value     = 'unknown';
                    $typeStyle = 'urgent';
                } else {
                    $value     = $param->getDefaultValue();
                    $typeStyle = self::getTypeStyle($value);
                    $value     = \is_array($value) ? '[]' : (\is_null($value) ? 'null' : \var_export($value, true));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }
                $default = \sprintf(' = <%s>%s</%s>', $typeStyle, OutputFormatter::escape($value), $typeStyle);
            } else {
                $default = '';
            }

            $params[] = \sprintf(
<<<<<<< HEAD
                '%s%s%s<strong>$%s</strong>%s',
                $param->isPassedByReference() ? '&' : '',
                $hint,
                $hint !== '' ? ' ' : '',
=======
                '%s%s<strong>$%s</strong>%s',
                $param->isPassedByReference() ? '&' : '',
                $hint,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $param->getName(),
                $default
            );
        }

        return $params;
    }
<<<<<<< HEAD

    /**
     * Print function param or return type(s).
     *
     * @param \ReflectionType $type
     */
    private static function formatReflectionType(?\ReflectionType $type, bool $indicateNullable): string
    {
        if ($type === null) {
            return '';
        }

        if ($type instanceof \ReflectionUnionType) {
            $delimeter = '|';
        } elseif ($type instanceof \ReflectionIntersectionType) {
            $delimeter = '&';
        } else {
            return self::formatReflectionNamedType($type, $indicateNullable);
        }

        $formattedTypes = [];
        foreach ($type->getTypes() as $namedType) {
            $formattedTypes[] = self::formatReflectionNamedType($namedType, $indicateNullable);
        }

        return \implode($delimeter, $formattedTypes);
    }

    /**
     * Print a single named type.
     */
    private static function formatReflectionNamedType(\ReflectionNamedType $type, bool $indicateNullable): string
    {
        $typeStyle = $type->isBuiltin() ? 'keyword' : 'class';
        $nullable = $indicateNullable && $type->allowsNull() ? '?' : '';

        return \sprintf('<%s>%s%s</%s>', $typeStyle, $nullable, OutputFormatter::escape($type->getName()), $typeStyle);
    }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
