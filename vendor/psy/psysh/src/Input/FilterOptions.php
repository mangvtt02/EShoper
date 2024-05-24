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

namespace Psy\Input;

use Psy\Exception\ErrorException;
use Psy\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

/**
 * Parse, validate and match --grep, --insensitive and --invert command options.
 */
class FilterOptions
{
    private $filter = false;
    private $pattern;
    private $insensitive;
    private $invert;

    /**
     * Get input option definitions for filtering.
     *
     * @return InputOption[]
     */
<<<<<<< HEAD
    public static function getOptions(): array
    {
        return [
            new InputOption('grep', 'G', InputOption::VALUE_REQUIRED, 'Limit to items matching the given pattern (string or regex).'),
            new InputOption('insensitive', 'i', InputOption::VALUE_NONE, 'Case-insensitive search (requires --grep).'),
            new InputOption('invert', 'v', InputOption::VALUE_NONE, 'Inverted search (requires --grep).'),
=======
    public static function getOptions()
    {
        return [
            new InputOption('grep',        'G', InputOption::VALUE_REQUIRED, 'Limit to items matching the given pattern (string or regex).'),
            new InputOption('insensitive', 'i', InputOption::VALUE_NONE,     'Case-insensitive search (requires --grep).'),
            new InputOption('invert',      'v', InputOption::VALUE_NONE,     'Inverted search (requires --grep).'),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        ];
    }

    /**
     * Bind input and prepare filter.
     *
     * @param InputInterface $input
     */
    public function bind(InputInterface $input)
    {
        $this->validateInput($input);

        if (!$pattern = $input->getOption('grep')) {
            $this->filter = false;

            return;
        }

        if (!$this->stringIsRegex($pattern)) {
<<<<<<< HEAD
            $pattern = '/'.\preg_quote($pattern, '/').'/';
=======
            $pattern = '/' . \preg_quote($pattern, '/') . '/';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($insensitive = $input->getOption('insensitive')) {
            $pattern .= 'i';
        }

        $this->validateRegex($pattern);

<<<<<<< HEAD
        $this->filter = true;
        $this->pattern = $pattern;
        $this->insensitive = $insensitive;
        $this->invert = $input->getOption('invert');
=======
        $this->filter      = true;
        $this->pattern     = $pattern;
        $this->insensitive = $insensitive;
        $this->invert      = $input->getOption('invert');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Check whether the bound input has filter options.
<<<<<<< HEAD
     */
    public function hasFilter(): bool
=======
     *
     * @return bool
     */
    public function hasFilter()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->filter;
    }

    /**
     * Check whether a string matches the current filter options.
     *
     * @param string $string
     * @param array  $matches
<<<<<<< HEAD
     */
    public function match(string $string, ?array &$matches = null): bool
=======
     *
     * @return bool
     */
    public function match($string, array &$matches = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->filter === false || (\preg_match($this->pattern, $string, $matches) xor $this->invert);
    }

    /**
     * Validate that grep, invert and insensitive input options are consistent.
     *
     * @throws RuntimeException if input is invalid
     *
     * @param InputInterface $input
     */
    private function validateInput(InputInterface $input)
    {
        if (!$input->getOption('grep')) {
            foreach (['invert', 'insensitive'] as $option) {
                if ($input->getOption($option)) {
<<<<<<< HEAD
                    throw new RuntimeException('--'.$option.' does not make sense without --grep');
=======
                    throw new RuntimeException('--' . $option . ' does not make sense without --grep');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }
            }
        }
    }

    /**
     * Check whether a string appears to be a regular expression.
     *
     * @param string $string
<<<<<<< HEAD
     */
    private function stringIsRegex(string $string): bool
=======
     *
     * @return bool
     */
    private function stringIsRegex($string)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \substr($string, 0, 1) === '/' && \substr($string, -1) === '/' && \strlen($string) >= 3;
    }

    /**
     * Validate that $pattern is a valid regular expression.
     *
     * @throws RuntimeException if pattern is invalid
     *
     * @param string $pattern
     */
<<<<<<< HEAD
    private function validateRegex(string $pattern)
=======
    private function validateRegex($pattern)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        \set_error_handler([ErrorException::class, 'throwException']);
        try {
            \preg_match($pattern, '');
        } catch (ErrorException $e) {
            throw new RuntimeException(\str_replace('preg_match(): ', 'Invalid regular expression: ', $e->getRawMessage()));
        } finally {
            \restore_error_handler();
        }
    }
}
