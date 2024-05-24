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

namespace Psy\Reflection;

/**
 * A fake ReflectionParameter but for language construct parameters.
 *
 * It stubs out all the important bits and returns whatever was passed in $opts.
 */
class ReflectionLanguageConstructParameter extends \ReflectionParameter
{
    private $function;
    private $parameter;
    private $opts;

    public function __construct($function, $parameter, array $opts)
    {
<<<<<<< HEAD
        $this->function = $function;
        $this->parameter = $parameter;
        $this->opts = $opts;
=======
        $this->function  = $function;
        $this->parameter = $parameter;
        $this->opts      = $opts;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * No class here.
     */
<<<<<<< HEAD
    public function getClass(): ?\ReflectionClass
    {
        return null;
=======
    public function getClass()
    {
        return;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Is the param an array?
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isArray(): bool
=======
    public function isArray()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \array_key_exists('isArray', $this->opts) && $this->opts['isArray'];
    }

    /**
     * Get param default value.
     *
<<<<<<< HEAD
     * @todo remove \ReturnTypeWillChange attribute after dropping support for PHP 7.x (when we can use mixed type)
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
=======
     * @return mixed
     */
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function getDefaultValue()
    {
        if ($this->isDefaultValueAvailable()) {
            return $this->opts['defaultValue'];
        }
<<<<<<< HEAD

        return null;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Get param name.
     *
     * @return string
     */
<<<<<<< HEAD
    public function getName(): string
=======
    public function getName()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->parameter;
    }

    /**
     * Is the param optional?
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isOptional(): bool
=======
    public function isOptional()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \array_key_exists('isOptional', $this->opts) && $this->opts['isOptional'];
    }

    /**
     * Does the param have a default value?
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isDefaultValueAvailable(): bool
=======
    public function isDefaultValueAvailable()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \array_key_exists('defaultValue', $this->opts);
    }

    /**
     * Is the param passed by reference?
     *
     * (I don't think this is true for anything we need to fake a param for)
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isPassedByReference(): bool
=======
    public function isPassedByReference()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \array_key_exists('isPassedByReference', $this->opts) && $this->opts['isPassedByReference'];
    }
}
