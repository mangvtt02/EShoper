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
 * A fake Reflector for namespaces.
 */
class ReflectionNamespace implements \Reflector
{
    private $name;

    /**
     * Construct a ReflectionNamespace object.
     *
     * @param string $name
     */
<<<<<<< HEAD
    public function __construct(string $name)
=======
    public function __construct($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->name = $name;
    }

    /**
     * Gets the constant name.
     *
     * @return string
     */
<<<<<<< HEAD
    public function getName(): string
=======
    public function getName()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->name;
    }

    /**
     * This can't (and shouldn't) do anything :).
     *
     * @throws \RuntimeException
     */
    public static function export($name)
    {
        throw new \RuntimeException('Not yet implemented because it\'s unclear what I should do here :)');
    }

    /**
     * To string.
     *
     * @return string
     */
<<<<<<< HEAD
    public function __toString(): string
=======
    public function __toString()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->getName();
    }
}
