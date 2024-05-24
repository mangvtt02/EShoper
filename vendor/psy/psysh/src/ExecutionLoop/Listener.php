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
 * Execution Loop Listener interface.
 */
interface Listener
{
    /**
     * Determines whether this listener should be active.
<<<<<<< HEAD
     */
    public static function isSupported(): bool;
=======
     *
     * @return bool
     */
    public static function isSupported();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Called once before the REPL session starts.
     *
     * @param Shell $shell
     */
    public function beforeRun(Shell $shell);

    /**
     * Called at the start of each loop.
     *
     * @param Shell $shell
     */
    public function beforeLoop(Shell $shell);

    /**
     * Called on user input.
     *
     * Return a new string to override or rewrite user input.
     *
     * @param Shell  $shell
     * @param string $input
     *
     * @return string|null User input override
     */
<<<<<<< HEAD
    public function onInput(Shell $shell, string $input);
=======
    public function onInput(Shell $shell, $input);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Called before executing user code.
     *
     * Return a new string to override or rewrite user code.
     *
     * Note that this is run *after* the Code Cleaner, so if you return invalid
     * or unsafe PHP here, it'll be executed without any of the safety Code
     * Cleaner provides. This comes with the big kid warranty :)
     *
     * @param Shell  $shell
     * @param string $code
     *
     * @return string|null User code override
     */
<<<<<<< HEAD
    public function onExecute(Shell $shell, string $code);
=======
    public function onExecute(Shell $shell, $code);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Called at the end of each loop.
     *
     * @param Shell $shell
     */
    public function afterLoop(Shell $shell);

    /**
     * Called once after the REPL session ends.
     *
     * @param Shell $shell
     */
    public function afterRun(Shell $shell);
}
