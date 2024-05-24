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

use Psy\Formatter\SignatureFormatter;
use Psy\Input\FilterOptions;
use Psy\Util\Mirror;
use Psy\VarDumper\Presenter;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Abstract Enumerator class.
 */
abstract class Enumerator
{
    // Output styles
<<<<<<< HEAD
    const IS_PUBLIC = 'public';
    const IS_PROTECTED = 'protected';
    const IS_PRIVATE = 'private';
    const IS_GLOBAL = 'global';
    const IS_CONSTANT = 'const';
    const IS_CLASS = 'class';
    const IS_FUNCTION = 'function';
=======
    const IS_PUBLIC    = 'public';
    const IS_PROTECTED = 'protected';
    const IS_PRIVATE   = 'private';
    const IS_GLOBAL    = 'global';
    const IS_CONSTANT  = 'const';
    const IS_CLASS     = 'class';
    const IS_FUNCTION  = 'function';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    private $filter;
    private $presenter;

    /**
     * Enumerator constructor.
     *
     * @param Presenter $presenter
     */
    public function __construct(Presenter $presenter)
    {
        $this->filter = new FilterOptions();
        $this->presenter = $presenter;
    }

    /**
     * Return a list of categorized things with the given input options and target.
     *
     * @param InputInterface  $input
     * @param \Reflector|null $reflector
     * @param mixed           $target
     *
     * @return array
     */
<<<<<<< HEAD
    public function enumerate(InputInterface $input, ?\Reflector $reflector = null, $target = null): array
=======
    public function enumerate(InputInterface $input, \Reflector $reflector = null, $target = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->filter->bind($input);

        return $this->listItems($input, $reflector, $target);
    }

    /**
     * Enumerate specific items with the given input options and target.
     *
     * Implementing classes should return an array of arrays:
     *
     *     [
     *         'Constants' => [
     *             'FOO' => [
     *                 'name'  => 'FOO',
     *                 'style' => 'public',
     *                 'value' => '123',
     *             ],
     *         ],
     *     ]
     *
     * @param InputInterface  $input
     * @param \Reflector|null $reflector
     * @param mixed           $target
     *
     * @return array
     */
<<<<<<< HEAD
    abstract protected function listItems(InputInterface $input, ?\Reflector $reflector = null, $target = null): array;
=======
    abstract protected function listItems(InputInterface $input, \Reflector $reflector = null, $target = null);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    protected function showItem($name)
    {
        return $this->filter->match($name);
    }

    protected function presentRef($value)
    {
        return $this->presenter->presentRef($value);
    }

    protected function presentSignature($target)
    {
        // This might get weird if the signature is actually for a reflector. Hrm.
        if (!$target instanceof \Reflector) {
            $target = Mirror::get($target);
        }

        return SignatureFormatter::format($target);
    }
}
