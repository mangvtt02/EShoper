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

use Psy\Exception\BreakException;

/**
 * An array-based Readline emulation implementation.
 */
class Transient implements Readline
{
    private $history;
    private $historySize;
    private $eraseDups;
    private $stdin;

    /**
     * Transient Readline is always supported.
     *
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public static function isSupported(): bool
=======
    public static function isSupported()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return true;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public static function supportsBracketedPaste(): bool
    {
        return false;
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Transient Readline constructor.
     */
    public function __construct($historyFile = null, $historySize = 0, $eraseDups = false)
    {
        // don't do anything with the history file...
<<<<<<< HEAD
        $this->history = [];
        $this->historySize = $historySize;
        $this->eraseDups = $eraseDups;
=======
        $this->history     = [];
        $this->historySize = $historySize;
        $this->eraseDups   = $eraseDups;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function addHistory(string $line): bool
=======
    public function addHistory($line)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($this->eraseDups) {
            if (($key = \array_search($line, $this->history)) !== false) {
                unset($this->history[$key]);
            }
        }

        $this->history[] = $line;

        if ($this->historySize > 0) {
            $histsize = \count($this->history);
            if ($histsize > $this->historySize) {
                $this->history = \array_slice($this->history, $histsize - $this->historySize);
            }
        }

        $this->history = \array_values($this->history);

        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function clearHistory(): bool
=======
    public function clearHistory()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->history = [];

        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function listHistory(): array
=======
    public function listHistory()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->history;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function readHistory(): bool
=======
    public function readHistory()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return true;
    }

    /**
     * {@inheritdoc}
     *
     * @throws BreakException if user hits Ctrl+D
     *
<<<<<<< HEAD
     * @return false|string
     */
    public function readline(?string $prompt = null)
=======
     * @return string
     */
    public function readline($prompt = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        echo $prompt;

        return \rtrim(\fgets($this->getStdin()), "\n\r");
    }

    /**
     * {@inheritdoc}
     */
    public function redisplay()
    {
        // noop
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function writeHistory(): bool
=======
    public function writeHistory()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return true;
    }

    /**
     * Get a STDIN file handle.
     *
     * @throws BreakException if user hits Ctrl+D
     *
     * @return resource
     */
    private function getStdin()
    {
        if (!isset($this->stdin)) {
            $this->stdin = \fopen('php://stdin', 'r');
        }

        if (\feof($this->stdin)) {
            throw new BreakException('Ctrl+D');
        }

        return $this->stdin;
    }
}
