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

namespace Psy;

/**
 * Helpers for bypassing visibility restrictions, mostly used in code generated
 * by the `sudo` command.
 */
class Sudo
{
    /**
     * Fetch a property of an object, bypassing visibility restrictions.
     *
     * @param object $object
     * @param string $property property name
     *
     * @return mixed Value of $object->property
     */
<<<<<<< HEAD
    public static function fetchProperty($object, string $property)
    {
        $prop = self::getProperty(new \ReflectionObject($object), $property);
=======
    public static function fetchProperty($object, $property)
    {
        $refl = new \ReflectionObject($object);
        $prop = $refl->getProperty($property);
        $prop->setAccessible(true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $prop->getValue($object);
    }

    /**
     * Assign the value of a property of an object, bypassing visibility restrictions.
     *
     * @param object $object
     * @param string $property property name
     * @param mixed  $value
     *
     * @return mixed Value of $object->property
     */
<<<<<<< HEAD
    public static function assignProperty($object, string $property, $value)
    {
        $prop = self::getProperty(new \ReflectionObject($object), $property);
=======
    public static function assignProperty($object, $property, $value)
    {
        $refl = new \ReflectionObject($object);
        $prop = $refl->getProperty($property);
        $prop->setAccessible(true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $prop->setValue($object, $value);

        return $value;
    }

    /**
     * Call a method on an object, bypassing visibility restrictions.
     *
     * @param object $object
     * @param string $method  method name
     * @param mixed  $args...
     *
     * @return mixed
     */
<<<<<<< HEAD
    public static function callMethod($object, string $method, ...$args)
    {
=======
    public static function callMethod($object, $method, $args = null)
    {
        $args   = \func_get_args();
        $object = \array_shift($args);
        $method = \array_shift($args);

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $refl = new \ReflectionObject($object);
        $reflMethod = $refl->getMethod($method);
        $reflMethod->setAccessible(true);

        return $reflMethod->invokeArgs($object, $args);
    }

    /**
     * Fetch a property of a class, bypassing visibility restrictions.
     *
     * @param string|object $class    class name or instance
     * @param string        $property property name
     *
     * @return mixed Value of $class::$property
     */
<<<<<<< HEAD
    public static function fetchStaticProperty($class, string $property)
    {
        $prop = self::getProperty(new \ReflectionClass($class), $property);
=======
    public static function fetchStaticProperty($class, $property)
    {
        $refl = new \ReflectionClass($class);
        $prop = $refl->getProperty($property);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $prop->setAccessible(true);

        return $prop->getValue();
    }

    /**
     * Assign the value of a static property of a class, bypassing visibility restrictions.
     *
     * @param string|object $class    class name or instance
     * @param string        $property property name
     * @param mixed         $value
     *
     * @return mixed Value of $class::$property
     */
<<<<<<< HEAD
    public static function assignStaticProperty($class, string $property, $value)
    {
        $prop = self::getProperty(new \ReflectionClass($class), $property);
        $refl = $prop->getDeclaringClass();

        if (\method_exists($refl, 'setStaticPropertyValue')) {
            $refl->setStaticPropertyValue($property, $value);
        } else {
            $prop->setValue($value);
        }
=======
    public static function assignStaticProperty($class, $property, $value)
    {
        $refl = new \ReflectionClass($class);
        $prop = $refl->getProperty($property);
        $prop->setAccessible(true);
        $prop->setValue($value);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $value;
    }

    /**
     * Call a static method on a class, bypassing visibility restrictions.
     *
     * @param string|object $class   class name or instance
     * @param string        $method  method name
     * @param mixed         $args...
     *
     * @return mixed
     */
<<<<<<< HEAD
    public static function callStatic($class, string $method, ...$args)
    {
=======
    public static function callStatic($class, $method, $args = null)
    {
        $args   = \func_get_args();
        $class  = \array_shift($args);
        $method = \array_shift($args);

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $refl = new \ReflectionClass($class);
        $reflMethod = $refl->getMethod($method);
        $reflMethod->setAccessible(true);

        return $reflMethod->invokeArgs(null, $args);
    }

    /**
     * Fetch a class constant, bypassing visibility restrictions.
     *
     * @param string|object $class class name or instance
     * @param string        $const constant name
     *
     * @return mixed
     */
<<<<<<< HEAD
    public static function fetchClassConst($class, string $const)
    {
        $refl = new \ReflectionClass($class);

        // Special case the ::class magic constant, because `getConstant` does the wrong thing here.
        if ($const === 'class') {
            return $refl->getName();
        }

        do {
            if ($refl->hasConstant($const)) {
                return $refl->getConstant($const);
            }

            $refl = $refl->getParentClass();
        } while ($refl !== false);

        return false;
    }

    /**
     * Construct an instance of a class, bypassing private constructors.
     *
     * @param string $class   class name
     * @param mixed  $args...
     */
    public static function newInstance(string $class, ...$args)
    {
        $refl = new \ReflectionClass($class);
        $instance = $refl->newInstanceWithoutConstructor();

        $constructor = $refl->getConstructor();
        $constructor->setAccessible(true);
        $constructor->invokeArgs($instance, $args);

        return $instance;
    }

    /**
     * Get a ReflectionProperty from an object (or its parent classes).
     *
     * @throws \ReflectionException if neither the object nor any of its parents has this property
     *
     * @param \ReflectionClass $refl
     * @param string           $property property name
     *
     * @return \ReflectionProperty
     */
    private static function getProperty(\ReflectionClass $refl, string $property): \ReflectionProperty
    {
        $firstException = null;
        do {
            try {
                $prop = $refl->getProperty($property);
                $prop->setAccessible(true);

                return $prop;
            } catch (\ReflectionException $e) {
                if ($firstException === null) {
                    $firstException = $e;
                }

                $refl = $refl->getParentClass();
            }
        } while ($refl !== false);

        throw $firstException;
=======
    public static function fetchClassConst($class, $const)
    {
        $refl = new \ReflectionClass($class);

        return $refl->getConstant($const);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
