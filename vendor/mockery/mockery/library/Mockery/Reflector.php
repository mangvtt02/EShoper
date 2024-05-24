<?php

/**
<<<<<<< HEAD
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
=======
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @copyright  Copyright (c) 2017 Dave Marshall https://github.com/davedevelopment
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */

namespace Mockery;

<<<<<<< HEAD
use InvalidArgumentException;
use ReflectionClass;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionType;
use ReflectionUnionType;

use function array_diff;
use function array_intersect;
use function array_map;
use function array_merge;
use function get_debug_type;
use function implode;
use function in_array;
use function method_exists;
use function sprintf;
use function strpos;

use const PHP_VERSION_ID;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal
 */
class Reflector
{
    /**
<<<<<<< HEAD
     * List of built-in types.
     *
     * @var list<string>
     */
    public const BUILTIN_TYPES = ['array', 'bool', 'int', 'float', 'null', 'object', 'string'];

    /**
     * List of reserved words.
     *
     * @var list<string>
     */
    public const RESERVED_WORDS = ['bool', 'true', 'false', 'float', 'int', 'iterable', 'mixed', 'never', 'null', 'object', 'string', 'void'];

    /**
     * Iterable.
     *
     * @var list<string>
     */
    private const ITERABLE = ['iterable'];

    /**
     * Traversable array.
     *
     * @var list<string>
     */
    private const TRAVERSABLE_ARRAY = ['\Traversable', 'array'];

    /**
     * Compute the string representation for the return type.
     *
     * @param bool $withoutNullable
     *
     * @return null|string
     */
    public static function getReturnType(ReflectionMethod $method, $withoutNullable = false)
    {
        $type = $method->getReturnType();

        if (! $type instanceof ReflectionType && method_exists($method, 'getTentativeReturnType')) {
            $type = $method->getTentativeReturnType();
        }

        if (! $type instanceof ReflectionType) {
            return null;
        }

        $typeHint = self::getTypeFromReflectionType($type, $method->getDeclaringClass());

        return (! $withoutNullable && $type->allowsNull()) ? self::formatNullableType($typeHint) : $typeHint;
    }

    /**
     * Compute the string representation for the simplest return type.
     *
     * @return null|string
     */
    public static function getSimplestReturnType(ReflectionMethod $method)
    {
        $type = $method->getReturnType();

        if (! $type instanceof ReflectionType && method_exists($method, 'getTentativeReturnType')) {
            $type = $method->getTentativeReturnType();
        }

        if (! $type instanceof ReflectionType || $type->allowsNull()) {
            return null;
        }

        $typeInformation = self::getTypeInformation($type, $method->getDeclaringClass());

        // return the first primitive type hint
        foreach ($typeInformation as $info) {
            if ($info['isPrimitive']) {
                return $info['typeHint'];
            }
        }

        // if no primitive type, return the first type
        foreach ($typeInformation as $info) {
            return $info['typeHint'];
        }

        return null;
=======
     * Determine if the parameter is typed as an array.
     *
     * @param \ReflectionParameter $param
     *
     * @return bool
     */
    public static function isArray(\ReflectionParameter $param)
    {
        $type = $param->getType();

        return $type instanceof \ReflectionNamedType && $type->getName();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Compute the string representation for the paramater type.
     *
<<<<<<< HEAD
     * @param bool $withoutNullable
     *
     * @return null|string
     */
    public static function getTypeHint(ReflectionParameter $param, $withoutNullable = false)
    {
        if (! $param->hasType()) {
=======
     * @param \ReflectionParameter $param
     * @param bool $withoutNullable
     *
     * @return string|null
     */
    public static function getTypeHint(\ReflectionParameter $param, $withoutNullable = false)
    {
        if (!$param->hasType()) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return null;
        }

        $type = $param->getType();
        $declaringClass = $param->getDeclaringClass();
<<<<<<< HEAD
        $typeHint = self::getTypeFromReflectionType($type, $declaringClass);

        return (! $withoutNullable && $type->allowsNull()) ? self::formatNullableType($typeHint) : $typeHint;
    }

    /**
     * Determine if the parameter is typed as an array.
     *
     * @return bool
     */
    public static function isArray(ReflectionParameter $param)
    {
        $type = $param->getType();

        return $type instanceof ReflectionNamedType && $type->getName();
    }

    /**
     * Determine if the given type is a reserved word.
     */
    public static function isReservedWord(string $type): bool
    {
        return in_array(strtolower($type), self::RESERVED_WORDS, true);
    }

    /**
     * Format the given type as a nullable type.
     */
    private static function formatNullableType(string $typeHint): string
    {
        if ($typeHint === 'mixed') {
            return $typeHint;
        }

        if (strpos($typeHint, 'null') !== false) {
            return $typeHint;
        }

        if (PHP_VERSION_ID < 80000) {
            return sprintf('?%s', $typeHint);
        }

        return sprintf('%s|null', $typeHint);
    }

    private static function getTypeFromReflectionType(ReflectionType $type, ReflectionClass $declaringClass): string
    {
        if ($type instanceof ReflectionNamedType) {
            $typeHint = $type->getName();

            if ($type->isBuiltin()) {
                return $typeHint;
            }

            if ($typeHint === 'static') {
                return $typeHint;
            }

            // 'self' needs to be resolved to the name of the declaring class
            if ($typeHint === 'self') {
                $typeHint = $declaringClass->getName();
            }

            // 'parent' needs to be resolved to the name of the parent class
            if ($typeHint === 'parent') {
                $typeHint = $declaringClass->getParentClass()->getName();
            }

            // class names need prefixing with a slash
            return sprintf('\\%s', $typeHint);
        }

        if ($type instanceof ReflectionIntersectionType) {
            $types = array_map(
                static function (ReflectionType $type) use ($declaringClass): string {
                    return self::getTypeFromReflectionType($type, $declaringClass);
                },
                $type->getTypes()
            );

            return implode('&', $types);
        }

        if ($type instanceof ReflectionUnionType) {
            $types = array_map(
                static function (ReflectionType $type) use ($declaringClass): string {
                    return self::getTypeFromReflectionType($type, $declaringClass);
                },
                $type->getTypes()
            );

            $intersect = array_intersect(self::TRAVERSABLE_ARRAY, $types);
            if ($intersect === self::TRAVERSABLE_ARRAY) {
                $types = array_merge(self::ITERABLE, array_diff($types, self::TRAVERSABLE_ARRAY));
            }

            return implode(
                '|',
                array_map(
                    static function (string $type): string {
                        return strpos($type, '&') === false ? $type : sprintf('(%s)', $type);
                    },
                    $types
                )
            );
        }

        throw new InvalidArgumentException('Unknown ReflectionType: ' . get_debug_type($type));
=======
        $typeHint = self::typeToString($type, $declaringClass);

        return (!$withoutNullable && $type->allowsNull()) ? self::formatNullableType($typeHint) : $typeHint;
    }

    /**
     * Compute the string representation for the return type.
     *
     * @param \ReflectionParameter $param
     * @param bool $withoutNullable
     *
     * @return string|null
     */
    public static function getReturnType(\ReflectionMethod $method, $withoutNullable = false)
    {
        if (!$method->hasReturnType()) {
            return null;
        }

        $type = $method->getReturnType();
        $declaringClass = $method->getDeclaringClass();
        $typeHint = self::typeToString($type, $declaringClass);

        return (!$withoutNullable && $type->allowsNull()) ? self::formatNullableType($typeHint) : $typeHint;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Get the string representation of the given type.
     *
<<<<<<< HEAD
     * @return list<array{typeHint:string,isPrimitive:bool}>
     */
    private static function getTypeInformation(ReflectionType $type, ReflectionClass $declaringClass): array
    {
        // PHP 8 union types and PHP 8.1 intersection types can be recursively processed
        if ($type instanceof ReflectionUnionType || $type instanceof ReflectionIntersectionType) {
            $types = [];

            foreach ($type->getTypes() as $innterType) {
                foreach (self::getTypeInformation($innterType, $declaringClass) as $info) {
                    if ($info['typeHint'] === 'null' && $info['isPrimitive']) {
                        continue;
                    }

                    $types[] = $info;
                }
            }

            return $types;
=======
     * @param \ReflectionType $type
     * @param string $declaringClass
     *
     * @return string|null
     */
    private static function typeToString(\ReflectionType $type, \ReflectionClass $declaringClass)
    {
        // PHP 8 union types can be recursively processed
        if ($type instanceof \ReflectionUnionType) {
            return \implode('|', \array_map(function (\ReflectionType $type) use ($declaringClass) {
                return self::typeToString($type, $declaringClass);
            }, $type->getTypes()));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        // $type must be an instance of \ReflectionNamedType
        $typeHint = $type->getName();

<<<<<<< HEAD
        // builtins can be returned as is
        if ($type->isBuiltin()) {
            return [
                [
                    'typeHint' => $typeHint,
                    'isPrimitive' => in_array($typeHint, self::BUILTIN_TYPES, true),
                ],
            ];
        }

        // 'static' can be returned as is
        if ($typeHint === 'static') {
            return [
                [
                    'typeHint' => $typeHint,
                    'isPrimitive' => false,
                ],
            ];
=======
        // builtins and 'static' can be returned as is
        if (($type->isBuiltin() || $typeHint === 'static')) {
            return $typeHint;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        // 'self' needs to be resolved to the name of the declaring class
        if ($typeHint === 'self') {
            $typeHint = $declaringClass->getName();
        }

        // 'parent' needs to be resolved to the name of the parent class
        if ($typeHint === 'parent') {
            $typeHint = $declaringClass->getParentClass()->getName();
        }

        // class names need prefixing with a slash
<<<<<<< HEAD
        return [
            [
                'typeHint' => sprintf('\\%s', $typeHint),
                'isPrimitive' => false,
            ],
        ];
=======
        return sprintf('\\%s', $typeHint);
    }

    /**
     * Format the given type as a nullable type.
     *
     * This method MUST only be called on PHP 7.1+.
     *
     * @param string $typeHint
     *
     * @return string
     */
    private static function formatNullableType($typeHint)
    {
        if (\PHP_VERSION_ID < 80000) {
            return sprintf('?%s', $typeHint);
        }

        return $typeHint === 'mixed' ? 'mixed' : sprintf('%s|null', $typeHint);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
