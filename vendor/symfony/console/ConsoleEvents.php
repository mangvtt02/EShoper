<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console;

/**
 * Contains all events dispatched by an Application.
 *
 * @author Francesco Levorato <git@flevour.net>
 */
final class ConsoleEvents
{
    /**
     * The COMMAND event allows you to attach listeners before any command is
     * executed by the console. It also allows you to modify the command, input and output
<<<<<<< HEAD
     * before they are handed to the command.
     *
     * @Event("Symfony\Component\Console\Event\ConsoleCommandEvent")
     */
    public const COMMAND = 'console.command';
=======
     * before they are handled to the command.
     *
     * @Event("Symfony\Component\Console\Event\ConsoleCommandEvent")
     */
    const COMMAND = 'console.command';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The TERMINATE event allows you to attach listeners after a command is
     * executed by the console.
     *
     * @Event("Symfony\Component\Console\Event\ConsoleTerminateEvent")
     */
<<<<<<< HEAD
    public const TERMINATE = 'console.terminate';
=======
    const TERMINATE = 'console.terminate';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The ERROR event occurs when an uncaught exception or error appears.
     *
     * This event allows you to deal with the exception/error or
     * to modify the thrown exception.
     *
     * @Event("Symfony\Component\Console\Event\ConsoleErrorEvent")
     */
<<<<<<< HEAD
    public const ERROR = 'console.error';
=======
    const ERROR = 'console.error';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
