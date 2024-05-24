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

namespace Psy\Readline;

/**
 * An interface abstracting the various readline_* functions.
 */
interface Readline
{
    /**
<<<<<<< HEAD
     * @param string|false $historyFile
     * @param int|null     $historySize
     * @param bool|null    $eraseDups
     */
    public function __construct($historyFile = null, $historySize = 0, $eraseDups = false);

    /**
     * Check whether this Readline class is supported by the current system.
     */
    public static function isSupported(): bool;

    /**
     * Check whether this Readline class supports bracketed paste.
     */
    public static function supportsBracketedPaste(): bool;
=======
     * Check whether this Readline class is supported by the current system.
     *
     * @return bool
     */
    public static function isSupported();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Add a line to the command history.
     *
     * @param string $line
     *
     * @return bool Success
     */
<<<<<<< HEAD
    public function addHistory(string $line): bool;
=======
    public function addHistory($line);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Clear the command history.
     *
     * @return bool Success
     */
<<<<<<< HEAD
    public function clearHistory(): bool;
=======
    public function clearHistory();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * List the command history.
     *
<<<<<<< HEAD
     * @return string[]
     */
    public function listHistory(): array;
=======
     * @return array
     */
    public function listHistory();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Read the command history.
     *
     * @return bool Success
     */
<<<<<<< HEAD
    public function readHistory(): bool;
=======
    public function readHistory();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Read a single line of input from the user.
     *
     * @param string|null $prompt
     *
     * @return false|string
     */
<<<<<<< HEAD
    public function readline(?string $prompt = null);
=======
    public function readline($prompt = null);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Redraw readline to redraw the display.
     */
    public function redisplay();

    /**
     * Write the command history to a file.
     *
     * @return bool Success
     */
<<<<<<< HEAD
    public function writeHistory(): bool;
=======
    public function writeHistory();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
