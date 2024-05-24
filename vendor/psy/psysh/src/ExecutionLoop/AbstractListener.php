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

namespace Psy\ExecutionLoop;

use Psy\Shell;

/**
 * Abstract Execution Loop Listener class.
 */
abstract class AbstractListener implements Listener
{
    /**
     * {@inheritdoc}
     */
    public function beforeRun(Shell $shell)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function beforeLoop(Shell $shell)
    {
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function onInput(Shell $shell, string $input)
=======
    public function onInput(Shell $shell, $input)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function onExecute(Shell $shell, string $code)
=======
    public function onExecute(Shell $shell, $code)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
    }

    /**
     * {@inheritdoc}
     */
    public function afterLoop(Shell $shell)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function afterRun(Shell $shell)
    {
    }
}
