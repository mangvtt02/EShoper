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

use Psy\Reflection\ReflectionNamespace;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class Enumerator class.
 */
class ClassEnumerator extends Enumerator
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
        // if we have a reflector, ensure that it's a namespace reflector
        if (($target !== null || $reflector !== null) && !$reflector instanceof ReflectionNamespace) {
            return [];
        }

        $internal = $input->getOption('internal');
<<<<<<< HEAD
        $user = $input->getOption('user');
        $prefix = $reflector === null ? null : \strtolower($reflector->getName()).'\\';
=======
        $user     = $input->getOption('user');
        $prefix   = $reflector === null ? null : \strtolower($reflector->getName()) . '\\';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $ret = [];

        // only list classes, interfaces and traits if we are specifically asked

        if ($input->getOption('classes')) {
            $ret = \array_merge($ret, $this->filterClasses('Classes', \get_declared_classes(), $internal, $user, $prefix));
        }

        if ($input->getOption('interfaces')) {
            $ret = \array_merge($ret, $this->filterClasses('Interfaces', \get_declared_interfaces(), $internal, $user, $prefix));
        }

        if ($input->getOption('traits')) {
            $ret = \array_merge($ret, $this->filterClasses('Traits', \get_declared_traits(), $internal, $user, $prefix));
        }

        return \array_map([$this, 'prepareClasses'], \array_filter($ret));
    }

    /**
     * Filter a list of classes, interfaces or traits.
     *
     * If $internal or $user is defined, results will be limited to internal or
     * user-defined classes as appropriate.
     *
     * @param string $key
     * @param array  $classes
     * @param bool   $internal
     * @param bool   $user
     * @param string $prefix
     *
     * @return array
     */
<<<<<<< HEAD
    protected function filterClasses(string $key, array $classes, bool $internal, bool $user, ?string $prefix = null): array
=======
    protected function filterClasses($key, $classes, $internal, $user, $prefix = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $ret = [];

        if ($internal) {
<<<<<<< HEAD
            $ret['Internal '.$key] = \array_filter($classes, function ($class) use ($prefix) {
=======
            $ret['Internal ' . $key] = \array_filter($classes, function ($class) use ($prefix) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if ($prefix !== null && \strpos(\strtolower($class), $prefix) !== 0) {
                    return false;
                }

                $refl = new \ReflectionClass($class);

                return $refl->isInternal();
            });
        }

        if ($user) {
<<<<<<< HEAD
            $ret['User '.$key] = \array_filter($classes, function ($class) use ($prefix) {
=======
            $ret['User ' . $key] = \array_filter($classes, function ($class) use ($prefix) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if ($prefix !== null && \strpos(\strtolower($class), $prefix) !== 0) {
                    return false;
                }

                $refl = new \ReflectionClass($class);

                return !$refl->isInternal();
            });
        }

        if (!$user && !$internal) {
            $ret[$key] = \array_filter($classes, function ($class) use ($prefix) {
                return $prefix === null || \strpos(\strtolower($class), $prefix) === 0;
            });
        }

        return $ret;
    }

    /**
     * Prepare formatted class array.
     *
     * @param array $classes
     *
     * @return array
     */
<<<<<<< HEAD
    protected function prepareClasses(array $classes): array
=======
    protected function prepareClasses(array $classes)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        \natcasesort($classes);

        // My kingdom for a generator.
        $ret = [];

        foreach ($classes as $name) {
            if ($this->showItem($name)) {
                $ret[$name] = [
                    'name'  => $name,
                    'style' => self::IS_CLASS,
                    'value' => $this->presentSignature($name),
                ];
            }
        }

        return $ret;
    }
}
