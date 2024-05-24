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

namespace Psy\Command\ListCommand;

use Symfony\Component\Console\Input\InputInterface;

/**
 * Method Enumerator class.
 */
class MethodEnumerator extends Enumerator
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function listItems(InputInterface $input, ?\Reflector $reflector = null, $target = null): array
=======
    protected function listItems(InputInterface $input, \Reflector $reflector = null, $target = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // only list methods when a Reflector is present.
        if ($reflector === null) {
            return [];
        }

        // We can only list methods on actual class (or object) reflectors.
        if (!$reflector instanceof \ReflectionClass) {
            return [];
        }

        // only list methods if we are specifically asked
        if (!$input->getOption('methods')) {
            return [];
        }

<<<<<<< HEAD
        $showAll = $input->getOption('all');
        $noInherit = $input->getOption('no-inherit');
        $methods = $this->prepareMethods($this->getMethods($showAll, $reflector, $noInherit));
=======
        $showAll   = $input->getOption('all');
        $noInherit = $input->getOption('no-inherit');
        $methods   = $this->prepareMethods($this->getMethods($showAll, $reflector, $noInherit));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if (empty($methods)) {
            return [];
        }

        $ret = [];
        $ret[$this->getKindLabel($reflector)] = $methods;

        return $ret;
    }

    /**
     * Get defined methods for the given class or object Reflector.
     *
<<<<<<< HEAD
     * @param bool             $showAll   Include private and protected methods
     * @param \ReflectionClass $reflector
     * @param bool             $noInherit Exclude inherited methods
     *
     * @return array
     */
    protected function getMethods(bool $showAll, \ReflectionClass $reflector, bool $noInherit = false): array
=======
     * @param bool       $showAll   Include private and protected methods
     * @param \Reflector $reflector
     * @param bool       $noInherit Exclude inherited methods
     *
     * @return array
     */
    protected function getMethods($showAll, \Reflector $reflector, $noInherit = false)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $className = $reflector->getName();

        $methods = [];
        foreach ($reflector->getMethods() as $name => $method) {
            // For some reason PHP reflection shows private methods from the parent class, even
            // though they're effectively worthless. Let's suppress them here, like --no-inherit
            if (($noInherit || $method->isPrivate()) && $method->getDeclaringClass()->getName() !== $className) {
                continue;
            }

            if ($showAll || $method->isPublic()) {
                $methods[$method->getName()] = $method;
            }
        }

<<<<<<< HEAD
        \ksort($methods, \SORT_NATURAL | \SORT_FLAG_CASE);
=======
        \ksort($methods, SORT_NATURAL | SORT_FLAG_CASE);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $methods;
    }

    /**
     * Prepare formatted method array.
     *
     * @param array $methods
     *
     * @return array
     */
<<<<<<< HEAD
    protected function prepareMethods(array $methods): array
=======
    protected function prepareMethods(array $methods)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // My kingdom for a generator.
        $ret = [];

        foreach ($methods as $name => $method) {
            if ($this->showItem($name)) {
                $ret[$name] = [
                    'name'  => $name,
                    'style' => $this->getVisibilityStyle($method),
                    'value' => $this->presentSignature($method),
                ];
            }
        }

        return $ret;
    }

    /**
     * Get a label for the particular kind of "class" represented.
     *
     * @param \ReflectionClass $reflector
<<<<<<< HEAD
     */
    protected function getKindLabel(\ReflectionClass $reflector): string
=======
     *
     * @return string
     */
    protected function getKindLabel(\ReflectionClass $reflector)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($reflector->isInterface()) {
            return 'Interface Methods';
        } elseif (\method_exists($reflector, 'isTrait') && $reflector->isTrait()) {
            return 'Trait Methods';
        } else {
            return 'Class Methods';
        }
    }

    /**
     * Get output style for the given method's visibility.
     *
     * @param \ReflectionMethod $method
<<<<<<< HEAD
     */
    private function getVisibilityStyle(\ReflectionMethod $method): string
=======
     *
     * @return string
     */
    private function getVisibilityStyle(\ReflectionMethod $method)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($method->isPublic()) {
            return self::IS_PUBLIC;
        } elseif ($method->isProtected()) {
            return self::IS_PROTECTED;
        } else {
            return self::IS_PRIVATE;
        }
    }
}
