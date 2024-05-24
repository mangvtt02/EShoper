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
use ReflectionAttribute;
use ReflectionClass;

use function array_map;
use function array_merge;
use function array_unique;

use const PHP_VERSION_ID;

class DefinedTargetClass implements TargetClassInterface
{
    private $name;

    private $rfc;

    public function __construct(ReflectionClass $rfc, $alias = null)
    {
        $this->rfc = $rfc;
        $this->name = $alias ?? $rfc->getName();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getAttributes()
    {
        if (PHP_VERSION_ID < 80000) {
            return [];
        }

        return array_unique(
            array_merge(
                ['\AllowDynamicProperties'],
                array_map(
                    static function (ReflectionAttribute $attribute): string {
                        return '\\' . $attribute->getName();
                    },
                    $this->rfc->getAttributes()
                )
            )
        );
    }

    public function getInterfaces()
    {
        $class = self::class;
        return array_map(static function ($interface) use ($class) {
            return new $class($interface);
        }, $this->rfc->getInterfaces());
    }

    public function getMethods()
    {
        return array_map(static function ($method) {
            return new Method($method);
        }, $this->rfc->getMethods());
=======
class DefinedTargetClass implements TargetClassInterface
{
    private $rfc;
    private $name;

    public function __construct(\ReflectionClass $rfc, $alias = null)
    {
        $this->rfc = $rfc;
        $this->name = $alias === null ? $rfc->getName() : $alias;
    }

    public static function factory($name, $alias = null)
    {
        return new self(new \ReflectionClass($name), $alias);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function getName()
    {
        return $this->name;
    }

<<<<<<< HEAD
=======
    public function isAbstract()
    {
        return $this->rfc->isAbstract();
    }

    public function isFinal()
    {
        return $this->rfc->isFinal();
    }

    public function getMethods()
    {
        return array_map(function ($method) {
            return new Method($method);
        }, $this->rfc->getMethods());
    }

    public function getInterfaces()
    {
        $class = __CLASS__;
        return array_map(function ($interface) use ($class) {
            return new $class($interface);
        }, $this->rfc->getInterfaces());
    }

    public function __toString()
    {
        return $this->getName();
    }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function getNamespaceName()
    {
        return $this->rfc->getNamespaceName();
    }

<<<<<<< HEAD
=======
    public function inNamespace()
    {
        return $this->rfc->inNamespace();
    }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function getShortName()
    {
        return $this->rfc->getShortName();
    }

<<<<<<< HEAD
=======
    public function implementsInterface($interface)
    {
        return $this->rfc->implementsInterface($interface);
    }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function hasInternalAncestor()
    {
        if ($this->rfc->isInternal()) {
            return true;
        }

        $child = $this->rfc;
        while ($parent = $child->getParentClass()) {
            if ($parent->isInternal()) {
                return true;
            }
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $child = $parent;
        }

        return false;
    }
<<<<<<< HEAD

    public function implementsInterface($interface)
    {
        return $this->rfc->implementsInterface($interface);
    }

    public function inNamespace()
    {
        return $this->rfc->inNamespace();
    }

    public function isAbstract()
    {
        return $this->rfc->isAbstract();
    }

    public function isFinal()
    {
        return $this->rfc->isFinal();
    }

    public static function factory($name, $alias = null)
    {
        return new self(new ReflectionClass($name), $alias);
    }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
