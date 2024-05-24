<?php
<<<<<<< HEAD

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
=======
/**
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
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */

namespace Mockery\Generator;

interface TargetClassInterface
{
    /**
<<<<<<< HEAD
     * Returns the targetClass's attributes.
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Returns the targetClass's interfaces.
     *
     * @return array
     */
    public function getInterfaces();
=======
     * Returns a new instance of the current
     * TargetClassInterface's
     * implementation.
     *
     * @param string $name
     * @return TargetClassInterface
     */
    public static function factory($name);

    /**
     * Returns the targetClass's name.
     *
     * @return string
     */
    public function getName();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Returns the targetClass's methods.
     *
     * @return array
     */
    public function getMethods();

    /**
<<<<<<< HEAD
     * Returns the targetClass's name.
     *
     * @return string
     */
    public function getName();
=======
     * Returns the targetClass's interfaces.
     *
     * @return array
     */
    public function getInterfaces();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Returns the targetClass's namespace name.
     *
     * @return string
     */
    public function getNamespaceName();

    /**
     * Returns the targetClass's short name.
     *
     * @return string
     */
    public function getShortName();

    /**
<<<<<<< HEAD
     * Returns whether the targetClass has
     * an internal ancestor.
     *
     * @return boolean
     */
    public function hasInternalAncestor();

    /**
     * Returns whether the targetClass is in
     * the passed interface.
     *
     * @param mixed $interface
     *
     * @return boolean
     */
    public function implementsInterface($interface);

    /**
     * Returns whether the targetClass is in namespace.
     *
     * @return boolean
     */
    public function inNamespace();

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Returns whether the targetClass is abstract.
     *
     * @return boolean
     */
    public function isAbstract();

    /**
     * Returns whether the targetClass is final.
     *
     * @return boolean
     */
    public function isFinal();

    /**
<<<<<<< HEAD
     * Returns a new instance of the current
     * TargetClassInterface's
     * implementation.
     *
     * @param string $name
     *
     * @return TargetClassInterface
     */
    public static function factory($name);
=======
     * Returns whether the targetClass is in namespace.
     *
     * @return boolean
     */
    public function inNamespace();

    /**
     * Returns whether the targetClass is in
     * the passed interface.
     *
     * @param mixed $interface
     * @return boolean
     */
    public function implementsInterface($interface);

    /**
     * Returns whether the targetClass has
     * an internal ancestor.
     *
     * @return boolean
     */
    public function hasInternalAncestor();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
