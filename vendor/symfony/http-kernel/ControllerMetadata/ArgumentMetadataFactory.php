<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\ControllerMetadata;

/**
 * Builds {@see ArgumentMetadata} objects based on the given Controller.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
final class ArgumentMetadataFactory implements ArgumentMetadataFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createArgumentMetadata($controller): array
    {
        $arguments = [];

        if (\is_array($controller)) {
            $reflection = new \ReflectionMethod($controller[0], $controller[1]);
<<<<<<< HEAD
            $class = $reflection->class;
        } elseif (\is_object($controller) && !$controller instanceof \Closure) {
            $reflection = new \ReflectionMethod($controller, '__invoke');
            $class = $reflection->class;
        } else {
            $reflection = new \ReflectionFunction($controller);
            if ($class = str_contains($reflection->name, '{closure}') ? null : $reflection->getClosureScopeClass()) {
                $class = $class->name;
            }
        }

        foreach ($reflection->getParameters() as $param) {
            $arguments[] = new ArgumentMetadata($param->getName(), $this->getType($param, $class), $param->isVariadic(), $param->isDefaultValueAvailable(), $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null, $param->allowsNull());
=======
        } elseif (\is_object($controller) && !$controller instanceof \Closure) {
            $reflection = (new \ReflectionObject($controller))->getMethod('__invoke');
        } else {
            $reflection = new \ReflectionFunction($controller);
        }

        foreach ($reflection->getParameters() as $param) {
            $arguments[] = new ArgumentMetadata($param->getName(), $this->getType($param, $reflection), $param->isVariadic(), $param->isDefaultValueAvailable(), $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null, $param->allowsNull());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $arguments;
    }

    /**
     * Returns an associated type to the given parameter if available.
     */
<<<<<<< HEAD
    private function getType(\ReflectionParameter $parameter, ?string $class): ?string
=======
    private function getType(\ReflectionParameter $parameter, \ReflectionFunctionAbstract $function): ?string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!$type = $parameter->getType()) {
            return null;
        }
        $name = $type instanceof \ReflectionNamedType ? $type->getName() : (string) $type;

<<<<<<< HEAD
        if (null !== $class) {
            switch (strtolower($name)) {
                case 'self':
                    return $class;
                case 'parent':
                    return get_parent_class($class) ?: null;
=======
        if ($function instanceof \ReflectionMethod) {
            $lcName = strtolower($name);
            switch ($lcName) {
                case 'self':
                    return $function->getDeclaringClass()->name;
                case 'parent':
                    return ($parent = $function->getDeclaringClass()->getParentClass()) ? $parent->name : null;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        return $name;
    }
}
