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

<<<<<<< HEAD
use function array_pop;
use function explode;
use function implode;
use function ltrim;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
class UndefinedTargetClass implements TargetClassInterface
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

<<<<<<< HEAD
    public function __toString()
    {
        return $this->name;
    }

    public function getAttributes()
    {
        return [];
    }

    public function getInterfaces()
    {
        return [];
    }

    public function getMethods()
    {
        return [];
=======
    public static function factory($name)
    {
        return new self($name);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function getName()
    {
        return $this->name;
    }

<<<<<<< HEAD
    public function getNamespaceName()
    {
        $parts = explode('\\', ltrim($this->getName(), '\\'));
        array_pop($parts);
        return implode('\\', $parts);
    }

    public function getShortName()
    {
        $parts = explode('\\', $this->getName());
        return array_pop($parts);
    }

    public function hasInternalAncestor()
    {
        return false;
    }

    public function implementsInterface($interface)
    {
        return false;
    }

    public function inNamespace()
    {
        return $this->getNamespaceName() !== '';
    }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function isAbstract()
    {
        return false;
    }

    public function isFinal()
    {
        return false;
    }

<<<<<<< HEAD
    public static function factory($name)
    {
        return new self($name);
=======
    public function getMethods()
    {
        return array();
    }

    public function getInterfaces()
    {
        return array();
    }

    public function getNamespaceName()
    {
        $parts = explode("\\", ltrim($this->getName(), "\\"));
        array_pop($parts);
        return implode("\\", $parts);
    }

    public function inNamespace()
    {
        return $this->getNamespaceName() !== '';
    }

    public function getShortName()
    {
        $parts = explode("\\", $this->getName());
        return array_pop($parts);
    }

    public function implementsInterface($interface)
    {
        return false;
    }

    public function hasInternalAncestor()
    {
        return false;
    }

    public function __toString()
    {
        return $this->name;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
