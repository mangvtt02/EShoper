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

namespace Psy\TabCompletion;

use Psy\TabCompletion\Matcher\AbstractMatcher;

/**
 * A readline tab completion service.
 *
 * @author Marc Garcia <markcial@gmail.com>
 */
class AutoCompleter
{
    /** @var Matcher\AbstractMatcher[] */
    protected $matchers;

    /**
     * Register a tab completion Matcher.
     *
     * @param AbstractMatcher $matcher
     */
    public function addMatcher(AbstractMatcher $matcher)
    {
        $this->matchers[] = $matcher;
    }

    /**
     * Activate readline tab completion.
     */
    public function activate()
    {
        \readline_completion_function([&$this, 'callback']);
    }

    /**
     * Handle readline completion.
     *
     * @param string $input Readline current word
     * @param int    $index Current word index
     * @param array  $info  readline_info() data
     *
     * @return array
     */
<<<<<<< HEAD
    public function processCallback(string $input, int $index, array $info = []): array
=======
    public function processCallback($input, $index, $info = [])
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // Some (Windows?) systems provide incomplete `readline_info`, so let's
        // try to work around it.
        $line = $info['line_buffer'];
        if (isset($info['end'])) {
            $line = \substr($line, 0, $info['end']);
        }
        if ($line === '' && $input !== '') {
            $line = $input;
        }

<<<<<<< HEAD
        $tokens = \token_get_all('<?php '.$line);
=======
        $tokens = \token_get_all('<?php ' . $line);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        // remove whitespaces
        $tokens = \array_filter($tokens, function ($token) {
            return !AbstractMatcher::tokenIs($token, AbstractMatcher::T_WHITESPACE);
        });
<<<<<<< HEAD
        // reset index from 0 to remove missing index number
        $tokens = \array_values($tokens);
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $matches = [];
        foreach ($this->matchers as $matcher) {
            if ($matcher->hasMatched($tokens)) {
                $matches = \array_merge($matcher->getMatches($tokens), $matches);
            }
        }

        $matches = \array_unique($matches);

        return !empty($matches) ? $matches : [''];
    }

    /**
     * The readline_completion_function callback handler.
     *
     * @see processCallback
     *
     * @param string $input
     * @param int    $index
     *
     * @return array
     */
<<<<<<< HEAD
    public function callback(string $input, int $index): array
=======
    public function callback($input, $index)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->processCallback($input, $index, \readline_info());
    }

    /**
     * Remove readline callback handler on destruct.
     */
    public function __destruct()
    {
        // PHP didn't implement the whole readline API when they first switched
        // to libedit. And they still haven't.
        if (\function_exists('readline_callback_handler_remove')) {
            \readline_callback_handler_remove();
        }
    }
}
