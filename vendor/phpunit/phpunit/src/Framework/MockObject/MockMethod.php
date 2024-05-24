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
use const DIRECTORY_SEPARATOR;
use function implode;
use function is_string;
use function method_exists;
use function preg_match;
use function preg_replace;
use function sprintf;
use function str_replace;
use function substr_count;
use function trim;
use function var_export;
use ReflectionException;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionType;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use SebastianBergmann\Type\ObjectType;
use SebastianBergmann\Type\Type;
use SebastianBergmann\Type\UnknownType;
use SebastianBergmann\Type\VoidType;
<<<<<<< HEAD
use Text_Template;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class MockMethod
{
    /**
<<<<<<< HEAD
     * @var Text_Template[]
=======
     * @var \Text_Template[]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private static $templates = [];

    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $methodName;

    /**
     * @var bool
     */
    private $cloneArguments;

    /**
<<<<<<< HEAD
     * @var string
=======
     * @var string string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $modifier;

    /**
     * @var string
     */
    private $argumentsForDeclaration;

    /**
     * @var string
     */
    private $argumentsForCall;

    /**
     * @var Type
     */
    private $returnType;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var bool
     */
    private $callOriginalMethod;

    /**
     * @var bool
     */
    private $static;

    /**
     * @var ?string
     */
    private $deprecation;

    /**
<<<<<<< HEAD
     * @throws RuntimeException
     */
    public static function fromReflection(ReflectionMethod $method, bool $callOriginalMethod, bool $cloneArguments): self
=======
     * @var bool
     */
    private $allowsReturnNull;

    /**
     * @throws RuntimeException
     */
    public static function fromReflection(\ReflectionMethod $method, bool $callOriginalMethod, bool $cloneArguments): self
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($method->isPrivate()) {
            $modifier = 'private';
        } elseif ($method->isProtected()) {
            $modifier = 'protected';
        } else {
            $modifier = 'public';
        }

        if ($method->isStatic()) {
            $modifier .= ' static';
        }

        if ($method->returnsReference()) {
            $reference = '&';
        } else {
            $reference = '';
        }

        $docComment = $method->getDocComment();

<<<<<<< HEAD
        if (is_string($docComment) &&
            preg_match('#\*[ \t]*+@deprecated[ \t]*+(.*?)\r?+\n[ \t]*+\*(?:[ \t]*+@|/$)#s', $docComment, $deprecation)) {
            $deprecation = trim(preg_replace('#[ \t]*\r?\n[ \t]*+\*[ \t]*+#', ' ', $deprecation[1]));
=======
        if (\is_string($docComment) &&
            \preg_match('#\*[ \t]*+@deprecated[ \t]*+(.*?)\r?+\n[ \t]*+\*(?:[ \t]*+@|/$)#s', $docComment, $deprecation)) {
            $deprecation = \trim(\preg_replace('#[ \t]*\r?\n[ \t]*+\*[ \t]*+#', ' ', $deprecation[1]));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } else {
            $deprecation = null;
        }

        return new self(
            $method->getDeclaringClass()->getName(),
            $method->getName(),
            $cloneArguments,
            $modifier,
<<<<<<< HEAD
            self::getMethodParametersForDeclaration($method),
            self::getMethodParametersForCall($method),
=======
            self::getMethodParameters($method),
            self::getMethodParameters($method, true),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            self::deriveReturnType($method),
            $reference,
            $callOriginalMethod,
            $method->isStatic(),
<<<<<<< HEAD
            $deprecation
=======
            $deprecation,
            $method->hasReturnType() && $method->getReturnType()->allowsNull()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );
    }

    public static function fromName(string $fullClassName, string $methodName, bool $cloneArguments): self
    {
        return new self(
            $fullClassName,
            $methodName,
            $cloneArguments,
            'public',
            '',
            '',
            new UnknownType,
            '',
            false,
            false,
<<<<<<< HEAD
            null
        );
    }

    public function __construct(string $className, string $methodName, bool $cloneArguments, string $modifier, string $argumentsForDeclaration, string $argumentsForCall, Type $returnType, string $reference, bool $callOriginalMethod, bool $static, ?string $deprecation)
=======
            null,
            false
        );
    }

    public function __construct(string $className, string $methodName, bool $cloneArguments, string $modifier, string $argumentsForDeclaration, string $argumentsForCall, Type $returnType, string $reference, bool $callOriginalMethod, bool $static, ?string $deprecation, bool $allowsReturnNull)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->className               = $className;
        $this->methodName              = $methodName;
        $this->cloneArguments          = $cloneArguments;
        $this->modifier                = $modifier;
        $this->argumentsForDeclaration = $argumentsForDeclaration;
        $this->argumentsForCall        = $argumentsForCall;
        $this->returnType              = $returnType;
        $this->reference               = $reference;
        $this->callOriginalMethod      = $callOriginalMethod;
        $this->static                  = $static;
        $this->deprecation             = $deprecation;
<<<<<<< HEAD
=======
        $this->allowsReturnNull        = $allowsReturnNull;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function getName(): string
    {
        return $this->methodName;
    }

    /**
     * @throws RuntimeException
     */
    public function generateCode(): string
    {
        if ($this->static) {
            $templateFile = 'mocked_static_method.tpl';
        } elseif ($this->returnType instanceof VoidType) {
<<<<<<< HEAD
            $templateFile = sprintf(
=======
            $templateFile = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                '%s_method_void.tpl',
                $this->callOriginalMethod ? 'proxied' : 'mocked'
            );
        } else {
<<<<<<< HEAD
            $templateFile = sprintf(
=======
            $templateFile = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                '%s_method.tpl',
                $this->callOriginalMethod ? 'proxied' : 'mocked'
            );
        }

        $deprecation = $this->deprecation;

        if (null !== $this->deprecation) {
<<<<<<< HEAD
            $deprecation         = "The {$this->className}::{$this->methodName} method is deprecated ({$this->deprecation}).";
            $deprecationTemplate = $this->getTemplate('deprecation.tpl');

            $deprecationTemplate->setVar([
                'deprecation' => var_export($deprecation, true),
=======
            $deprecation         = "The $this->className::$this->methodName method is deprecated ($this->deprecation).";
            $deprecationTemplate = $this->getTemplate('deprecation.tpl');

            $deprecationTemplate->setVar([
                'deprecation' => \var_export($deprecation, true),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ]);

            $deprecation = $deprecationTemplate->render();
        }

<<<<<<< HEAD
        /**
         * This is required as the version of sebastian/type used
         * by PHPUnit 8.5 does now know about the mixed type.
         */
        $returnTypeDeclaration = str_replace(
            '?mixed',
            'mixed',
            $this->returnType->getReturnTypeDeclaration()
        );

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $template = $this->getTemplate($templateFile);

        $template->setVar(
            [
                'arguments_decl'     => $this->argumentsForDeclaration,
                'arguments_call'     => $this->argumentsForCall,
<<<<<<< HEAD
                'return_declaration' => $returnTypeDeclaration,
                'arguments_count'    => !empty($this->argumentsForCall) ? substr_count($this->argumentsForCall, ',') + 1 : 0,
=======
                'return_declaration' => $this->returnType->getReturnTypeDeclaration(),
                'arguments_count'    => !empty($this->argumentsForCall) ? \substr_count($this->argumentsForCall, ',') + 1 : 0,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                'class_name'         => $this->className,
                'method_name'        => $this->methodName,
                'modifier'           => $this->modifier,
                'reference'          => $this->reference,
                'clone_arguments'    => $this->cloneArguments ? 'true' : 'false',
                'deprecation'        => $deprecation,
            ]
        );

        return $template->render();
    }

    public function getReturnType(): Type
    {
        return $this->returnType;
    }

<<<<<<< HEAD
    private function getTemplate(string $template): Text_Template
    {
        $filename = __DIR__ . DIRECTORY_SEPARATOR . 'Generator' . DIRECTORY_SEPARATOR . $template;

        if (!isset(self::$templates[$filename])) {
            self::$templates[$filename] = new Text_Template($filename);
=======
    private function getTemplate(string $template): \Text_Template
    {
        $filename = __DIR__ . \DIRECTORY_SEPARATOR . 'Generator' . \DIRECTORY_SEPARATOR . $template;

        if (!isset(self::$templates[$filename])) {
            self::$templates[$filename] = new \Text_Template($filename);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return self::$templates[$filename];
    }

    /**
     * Returns the parameters of a function or method.
     *
     * @throws RuntimeException
     */
<<<<<<< HEAD
    private static function getMethodParametersForDeclaration(ReflectionMethod $method): string
=======
    private static function getMethodParameters(\ReflectionMethod $method, bool $forCall = false): string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $parameters = [];

        foreach ($method->getParameters() as $i => $parameter) {
            $name = '$' . $parameter->getName();

            /* Note: PHP extensions may use empty names for reference arguments
             * or "..." for methods taking a variable number of arguments.
             */
            if ($name === '$' || $name === '$...') {
                $name = '$arg' . $i;
            }

<<<<<<< HEAD
=======
            if ($parameter->isVariadic()) {
                if ($forCall) {
                    continue;
                }

                $name = '...' . $name;
            }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $nullable        = '';
            $default         = '';
            $reference       = '';
            $typeDeclaration = '';
<<<<<<< HEAD
            $type            = null;
            $typeName        = null;

            if ($parameter->hasType()) {
                $type = $parameter->getType();

                if ($type instanceof ReflectionNamedType) {
                    $typeName = $type->getName();
                }
            }

            if ($parameter->isVariadic()) {
                $name = '...' . $name;
            } elseif ($parameter->isDefaultValueAvailable()) {
                $default = ' = ' . var_export($parameter->getDefaultValue(), true);
            } elseif ($parameter->isOptional()) {
                $default = ' = null';
            }

            if ($type !== null) {
                if ($typeName !== 'mixed' && $parameter->allowsNull()) {
                    $nullable = '?';
                }

                if ($typeName === 'self') {
                    $typeDeclaration = $method->getDeclaringClass()->getName() . ' ';
                } elseif ($typeName !== null) {
                    $typeDeclaration = $typeName . ' ';
=======

            if (!$forCall) {
                if ($parameter->hasType() && $parameter->allowsNull()) {
                    $nullable = '?';
                }

                if ($parameter->hasType()) {
                    $type = $parameter->getType();

                    if ($type instanceof \ReflectionNamedType && $type->getName() !== 'self') {
                        $typeDeclaration = $type->getName() . ' ';
                    } else {
                        try {
                            $class = $parameter->getClass();
                            // @codeCoverageIgnoreStart
                        } catch (\ReflectionException $e) {
                            throw new RuntimeException(
                                \sprintf(
                                    'Cannot mock %s::%s() because a class or ' .
                                    'interface used in the signature is not loaded',
                                    $method->getDeclaringClass()->getName(),
                                    $method->getName()
                                ),
                                0,
                                $e
                            );
                        }
                        // @codeCoverageIgnoreEnd

                        if ($class !== null) {
                            $typeDeclaration = $class->getName() . ' ';
                        }
                    }
                }

                if (!$parameter->isVariadic()) {
                    if ($parameter->isDefaultValueAvailable()) {
                        try {
                            $value = \var_export($parameter->getDefaultValue(), true);
                            // @codeCoverageIgnoreStart
                        } catch (\ReflectionException $e) {
                            throw new RuntimeException(
                                $e->getMessage(),
                                (int) $e->getCode(),
                                $e
                            );
                        }
                        // @codeCoverageIgnoreEnd

                        $default = ' = ' . $value;
                    } elseif ($parameter->isOptional()) {
                        $default = ' = null';
                    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }
            }

            if ($parameter->isPassedByReference()) {
                $reference = '&';
            }

            $parameters[] = $nullable . $typeDeclaration . $reference . $name . $default;
        }

<<<<<<< HEAD
        return implode(', ', $parameters);
    }

    /**
     * Returns the parameters of a function or method.
     *
     * @throws ReflectionException
     */
    private static function getMethodParametersForCall(ReflectionMethod $method): string
    {
        $parameters = [];

        foreach ($method->getParameters() as $i => $parameter) {
            $name = '$' . $parameter->getName();

            /* Note: PHP extensions may use empty names for reference arguments
             * or "..." for methods taking a variable number of arguments.
             */
            if ($name === '$' || $name === '$...') {
                $name = '$arg' . $i;
            }

            if ($parameter->isVariadic()) {
                continue;
            }

            if ($parameter->isPassedByReference()) {
                $parameters[] = '&' . $name;
            } else {
                $parameters[] = $name;
            }
        }

        return implode(', ', $parameters);
    }

    private static function deriveReturnType(ReflectionMethod $method): Type
    {
        $returnType = self::reflectionMethodGetReturnType($method);

        if ($returnType === null) {
            return new UnknownType;
        }

        // @see https://bugs.php.net/bug.php?id=70722
        if ($returnType instanceof ReflectionNamedType && $returnType->getName() === 'self') {
=======
        return \implode(', ', $parameters);
    }

    private static function deriveReturnType(\ReflectionMethod $method): Type
    {
        $returnType = $method->getReturnType();

        if ($returnType === null) {
            return new UnknownType();
        }

        // @see https://bugs.php.net/bug.php?id=70722
        if ($returnType->getName() === 'self') {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return ObjectType::fromName($method->getDeclaringClass()->getName(), $returnType->allowsNull());
        }

        // @see https://github.com/sebastianbergmann/phpunit-mock-objects/issues/406
<<<<<<< HEAD
        if ($returnType instanceof ReflectionNamedType && $returnType->getName() === 'parent') {
=======
        if ($returnType->getName() === 'parent') {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $parentClass = $method->getDeclaringClass()->getParentClass();

            if ($parentClass === false) {
                throw new RuntimeException(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'Cannot mock %s::%s because "parent" return type declaration is used but %s does not have a parent class',
                        $method->getDeclaringClass()->getName(),
                        $method->getName(),
                        $method->getDeclaringClass()->getName()
                    )
                );
            }

            return ObjectType::fromName($parentClass->getName(), $returnType->allowsNull());
        }

        return Type::fromName($returnType->getName(), $returnType->allowsNull());
    }
<<<<<<< HEAD

    private static function reflectionMethodGetReturnType(ReflectionMethod $method): ?ReflectionType
    {
        if ($method->hasReturnType()) {
            return $method->getReturnType();
        }

        if (!method_exists($method, 'getTentativeReturnType')) {
            return null;
        }

        return $method->getTentativeReturnType();
    }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
