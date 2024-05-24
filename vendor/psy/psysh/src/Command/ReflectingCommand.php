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

namespace Psy\Command;

<<<<<<< HEAD
use PhpParser\NodeTraverser;
use PhpParser\PrettyPrinter\Standard as Printer;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\CodeCleaner\NoReturnValue;
use Psy\Context;
use Psy\ContextAware;
use Psy\Exception\ErrorException;
use Psy\Exception\RuntimeException;
use Psy\Exception\UnexpectedTargetException;
<<<<<<< HEAD
use Psy\Reflection\ReflectionConstant;
use Psy\Sudo\SudoVisitor;
=======
use Psy\Reflection\ReflectionClassConstant;
use Psy\Reflection\ReflectionConstant_;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\Util\Mirror;

/**
 * An abstract command with helpers for inspecting the current context.
 */
abstract class ReflectingCommand extends Command implements ContextAware
{
<<<<<<< HEAD
    const CLASS_OR_FUNC = '/^[\\\\\w]+$/';
    const CLASS_MEMBER = '/^([\\\\\w]+)::(\w+)$/';
    const CLASS_STATIC = '/^([\\\\\w]+)::\$(\w+)$/';
=======
    const CLASS_OR_FUNC   = '/^[\\\\\w]+$/';
    const CLASS_MEMBER    = '/^([\\\\\w]+)::(\w+)$/';
    const CLASS_STATIC    = '/^([\\\\\w]+)::\$(\w+)$/';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    const INSTANCE_MEMBER = '/^(\$\w+)(::|->)(\w+)$/';

    /**
     * Context instance (for ContextAware interface).
     *
     * @var Context
     */
    protected $context;

<<<<<<< HEAD
    private $parser;
    private $traverser;
    private $printer;

    /**
     * {@inheritdoc}
     */
    public function __construct($name = null)
    {
        $this->parser = new CodeArgumentParser();

        // @todo Pass visitor directly to once we drop support for PHP-Parser 4.x
        $this->traverser = new NodeTraverser();
        $this->traverser->addVisitor(new SudoVisitor());

        $this->printer = new Printer();

        parent::__construct($name);
    }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    /**
     * ContextAware interface.
     *
     * @param Context $context
     */
    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    /**
     * Get the target for a value.
     *
     * @throws \InvalidArgumentException when the value specified can't be resolved
     *
     * @param string $valueName Function, class, variable, constant, method or property name
     *
     * @return array (class or instance name, member name, kind)
     */
<<<<<<< HEAD
    protected function getTarget(string $valueName): array
    {
        $valueName = \trim($valueName);
        $matches = [];
=======
    protected function getTarget($valueName)
    {
        $valueName = \trim($valueName);
        $matches   = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        switch (true) {
            case \preg_match(self::CLASS_OR_FUNC, $valueName, $matches):
                return [$this->resolveName($matches[0], true), null, 0];

            case \preg_match(self::CLASS_MEMBER, $valueName, $matches):
                return [$this->resolveName($matches[1]), $matches[2], Mirror::CONSTANT | Mirror::METHOD];

            case \preg_match(self::CLASS_STATIC, $valueName, $matches):
                return [$this->resolveName($matches[1]), $matches[2], Mirror::STATIC_PROPERTY | Mirror::PROPERTY];

            case \preg_match(self::INSTANCE_MEMBER, $valueName, $matches):
                if ($matches[2] === '->') {
                    $kind = Mirror::METHOD | Mirror::PROPERTY;
                } else {
                    $kind = Mirror::CONSTANT | Mirror::METHOD;
                }

                return [$this->resolveObject($matches[1]), $matches[3], $kind];

            default:
                return [$this->resolveObject($valueName), null, 0];
        }
    }

    /**
     * Resolve a class or function name (with the current shell namespace).
     *
     * @throws ErrorException when `self` or `static` is used in a non-class scope
     *
     * @param string $name
     * @param bool   $includeFunctions (default: false)
<<<<<<< HEAD
     */
    protected function resolveName(string $name, bool $includeFunctions = false): string
=======
     *
     * @return string
     */
    protected function resolveName($name, $includeFunctions = false)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $shell = $this->getApplication();

        // While not *technically* 100% accurate, let's treat `self` and `static` as equivalent.
        if (\in_array(\strtolower($name), ['self', 'static'])) {
            if ($boundClass = $shell->getBoundClass()) {
                return $boundClass;
            }

            if ($boundObject = $shell->getBoundObject()) {
                return \get_class($boundObject);
            }

            $msg = \sprintf('Cannot use "%s" when no class scope is active', \strtolower($name));
<<<<<<< HEAD
            throw new ErrorException($msg, 0, \E_USER_ERROR, "eval()'d code", 1);
=======
            throw new ErrorException($msg, 0, E_USER_ERROR, "eval()'d code", 1);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if (\substr($name, 0, 1) === '\\') {
            return $name;
        }

        // Check $name against the current namespace and use statements.
        if (self::couldBeClassName($name)) {
            try {
<<<<<<< HEAD
                $name = $this->resolveCode($name.'::class');
=======
                $maybeAlias = $this->resolveCode($name . '::class');
                if ($maybeAlias !== $name) {
                    return $maybeAlias;
                }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            } catch (RuntimeException $e) {
                // /shrug
            }
        }

        if ($namespace = $shell->getNamespace()) {
<<<<<<< HEAD
            $fullName = $namespace.'\\'.$name;
=======
            $fullName = $namespace . '\\' . $name;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if (\class_exists($fullName) || \interface_exists($fullName) || ($includeFunctions && \function_exists($fullName))) {
                return $fullName;
            }
        }

        return $name;
    }

    /**
     * Check whether a given name could be a class name.
     */
<<<<<<< HEAD
    protected function couldBeClassName(string $name): bool
    {
        // Regex based on https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class
        return \preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*(\\\\[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*)*$/', $name) === 1;
=======
    protected function couldBeClassName($name)
    {
        // Regex based on https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class
        return \preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*(\\[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*)*$/', $name);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Get a Reflector and documentation for a function, class or instance, constant, method or property.
     *
     * @param string $valueName Function, class, variable, constant, method or property name
     *
     * @return array (value, Reflector)
     */
<<<<<<< HEAD
    protected function getTargetAndReflector(string $valueName): array
=======
    protected function getTargetAndReflector($valueName)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        list($value, $member, $kind) = $this->getTarget($valueName);

        return [$value, Mirror::get($value, $member, $kind)];
    }

    /**
     * Resolve code to a value in the current scope.
     *
     * @throws RuntimeException when the code does not return a value in the current scope
     *
     * @param string $code
     *
     * @return mixed Variable value
     */
<<<<<<< HEAD
    protected function resolveCode(string $code)
    {
        try {
            // Add an implicit `sudo` to target resolution.
            $nodes = $this->traverser->traverse($this->parser->parse($code));
            $sudoCode = $this->printer->prettyPrint($nodes);
            $value = $this->getApplication()->execute($sudoCode, true);
        } catch (\Throwable $e) {
=======
    protected function resolveCode($code)
    {
        try {
            $value = $this->getApplication()->execute($code, true);
        } catch (\Exception $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            // Swallow all exceptions?
        }

        if (!isset($value) || $value instanceof NoReturnValue) {
<<<<<<< HEAD
            throw new RuntimeException('Unknown target: '.$code);
=======
            throw new RuntimeException('Unknown target: ' . $code);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $value;
    }

    /**
     * Resolve code to an object in the current scope.
     *
     * @throws UnexpectedTargetException when the code resolves to a non-object value
     *
     * @param string $code
     *
     * @return object Variable instance
     */
<<<<<<< HEAD
    private function resolveObject(string $code)
=======
    private function resolveObject($code)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $value = $this->resolveCode($code);

        if (!\is_object($value)) {
            throw new UnexpectedTargetException($value, 'Unable to inspect a non-object');
        }

        return $value;
    }

    /**
<<<<<<< HEAD
=======
     * @deprecated Use `resolveCode` instead
     *
     * @param string $name
     *
     * @return mixed Variable instance
     */
    protected function resolveInstance($name)
    {
        @\trigger_error('`resolveInstance` is deprecated; use `resolveCode` instead.', E_USER_DEPRECATED);

        return $this->resolveCode($name);
    }

    /**
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Get a variable from the current shell scope.
     *
     * @param string $name
     *
     * @return mixed
     */
<<<<<<< HEAD
    protected function getScopeVariable(string $name)
=======
    protected function getScopeVariable($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->context->get($name);
    }

    /**
     * Get all scope variables from the current shell scope.
     *
     * @return array
     */
<<<<<<< HEAD
    protected function getScopeVariables(): array
=======
    protected function getScopeVariables()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->context->getAll();
    }

    /**
     * Given a Reflector instance, set command-scope variables in the shell
     * execution context. This is used to inject magic $__class, $__method and
     * $__file variables (as well as a handful of others).
     *
     * @param \Reflector $reflector
     */
    protected function setCommandScopeVariables(\Reflector $reflector)
    {
        $vars = [];

        switch (\get_class($reflector)) {
            case \ReflectionClass::class:
            case \ReflectionObject::class:
                $vars['__class'] = $reflector->name;
                if ($reflector->inNamespace()) {
                    $vars['__namespace'] = $reflector->getNamespaceName();
                }
                break;

            case \ReflectionMethod::class:
                $vars['__method'] = \sprintf('%s::%s', $reflector->class, $reflector->name);
                $vars['__class'] = $reflector->class;
                $classReflector = $reflector->getDeclaringClass();
                if ($classReflector->inNamespace()) {
                    $vars['__namespace'] = $classReflector->getNamespaceName();
                }
                break;

            case \ReflectionFunction::class:
                $vars['__function'] = $reflector->name;
                if ($reflector->inNamespace()) {
                    $vars['__namespace'] = $reflector->getNamespaceName();
                }
                break;

            case \ReflectionGenerator::class:
                $funcReflector = $reflector->getFunction();
                $vars['__function'] = $funcReflector->name;
                if ($funcReflector->inNamespace()) {
                    $vars['__namespace'] = $funcReflector->getNamespaceName();
                }
                if ($fileName = $reflector->getExecutingFile()) {
                    $vars['__file'] = $fileName;
                    $vars['__line'] = $reflector->getExecutingLine();
<<<<<<< HEAD
                    $vars['__dir'] = \dirname($fileName);
=======
                    $vars['__dir']  = \dirname($fileName);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }
                break;

            case \ReflectionProperty::class:
            case \ReflectionClassConstant::class:
<<<<<<< HEAD
=======
            case ReflectionClassConstant::class:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $classReflector = $reflector->getDeclaringClass();
                $vars['__class'] = $classReflector->name;
                if ($classReflector->inNamespace()) {
                    $vars['__namespace'] = $classReflector->getNamespaceName();
                }
                // no line for these, but this'll do
                if ($fileName = $reflector->getDeclaringClass()->getFileName()) {
                    $vars['__file'] = $fileName;
<<<<<<< HEAD
                    $vars['__dir'] = \dirname($fileName);
                }
                break;

            case ReflectionConstant::class:
=======
                    $vars['__dir']  = \dirname($fileName);
                }
                break;

            case ReflectionConstant_::class:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if ($reflector->inNamespace()) {
                    $vars['__namespace'] = $reflector->getNamespaceName();
                }
                break;
        }

        if ($reflector instanceof \ReflectionClass || $reflector instanceof \ReflectionFunctionAbstract) {
            if ($fileName = $reflector->getFileName()) {
                $vars['__file'] = $fileName;
                $vars['__line'] = $reflector->getStartLine();
<<<<<<< HEAD
                $vars['__dir'] = \dirname($fileName);
=======
                $vars['__dir']  = \dirname($fileName);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        $this->context->setCommandScopeVariables($vars);
    }
}
