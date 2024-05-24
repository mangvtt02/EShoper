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

namespace Psy\Formatter;

use Psy\Input\FilterOptions;
use Symfony\Component\Console\Formatter\OutputFormatter;

/**
 * Output formatter for exception traces.
 */
class TraceFormatter
{
    /**
     * Format the trace of the given exception.
     *
<<<<<<< HEAD
=======
     * @throws \InvalidArgumentException if passed a non-Throwable value
     *
     * @todo type hint $throwable when we drop support for PHP 5.x
     *
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param \Throwable    $throwable  The error or exception with a backtrace
     * @param FilterOptions $filter     (default: null)
     * @param int           $count      (default: PHP_INT_MAX)
     * @param bool          $includePsy (default: true)
     *
     * @return string[] Formatted stacktrace lines
     */
<<<<<<< HEAD
    public static function formatTrace(\Throwable $throwable, ?FilterOptions $filter = null, ?int $count = null, bool $includePsy = true): array
    {
        if ($cwd = \getcwd()) {
            $cwd = \rtrim($cwd, \DIRECTORY_SEPARATOR).\DIRECTORY_SEPARATOR;
        }

        if ($count === null) {
            $count = \PHP_INT_MAX;
=======
    public static function formatTrace($throwable, FilterOptions $filter = null, $count = null, $includePsy = true)
    {
        if (!($throwable instanceof \Throwable || $throwable instanceof \Exception)) {
            throw new \InvalidArgumentException('Unable to format non-throwable value');
        }

        if ($cwd = \getcwd()) {
            $cwd = \rtrim($cwd, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        }

        if ($count === null) {
            $count = PHP_INT_MAX;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $lines = [];

        $trace = $throwable->getTrace();
        \array_unshift($trace, [
            'function' => '',
            'file'     => $throwable->getFile() !== null ? $throwable->getFile() : 'n/a',
            'line'     => $throwable->getLine() !== null ? $throwable->getLine() : 'n/a',
            'args'     => [],
        ]);

        if (!$includePsy) {
            for ($i = \count($trace) - 1; $i >= 0; $i--) {
                $thing = isset($trace[$i]['class']) ? $trace[$i]['class'] : $trace[$i]['function'];
                if (\preg_match('/\\\\?Psy\\\\/', $thing)) {
                    $trace = \array_slice($trace, $i + 1);
                    break;
                }
            }
        }

        for ($i = 0, $count = \min($count, \count($trace)); $i < $count; $i++) {
<<<<<<< HEAD
            $class = isset($trace[$i]['class']) ? $trace[$i]['class'] : '';
            $type = isset($trace[$i]['type']) ? $trace[$i]['type'] : '';
            $function = $trace[$i]['function'];
            $file = isset($trace[$i]['file']) ? $trace[$i]['file'] : 'n/a';
            $line = isset($trace[$i]['line']) ? $trace[$i]['line'] : 'n/a';

            // Make file paths relative to cwd
            if ($cwd !== false) {
                $file = \preg_replace('/^'.\preg_quote($cwd, '/').'/', '', $file);
            }
=======
            $class    = isset($trace[$i]['class']) ? $trace[$i]['class'] : '';
            $type     = isset($trace[$i]['type']) ? $trace[$i]['type'] : '';
            $function = $trace[$i]['function'];
            $file     = isset($trace[$i]['file']) ? self::replaceCwd($cwd, $trace[$i]['file']) : 'n/a';
            $line     = isset($trace[$i]['line']) ? $trace[$i]['line'] : 'n/a';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            // Leave execution loop out of the `eval()'d code` lines
            if (\preg_match("#/src/Execution(?:Loop)?Closure.php\(\d+\) : eval\(\)'d code$#", \str_replace('\\', '/', $file))) {
                $file = "eval()'d code";
            }

            // Skip any lines that don't match our filter options
            if ($filter !== null && !$filter->match(\sprintf('%s%s%s() at %s:%s', $class, $type, $function, $file, $line))) {
                continue;
            }

            $lines[] = \sprintf(
                ' <class>%s</class>%s%s() at <info>%s:%s</info>',
                OutputFormatter::escape($class),
                OutputFormatter::escape($type),
                OutputFormatter::escape($function),
                OutputFormatter::escape($file),
                OutputFormatter::escape($line)
            );
        }

        return $lines;
    }
<<<<<<< HEAD
=======

    /**
     * Replace the given directory from the start of a filepath.
     *
     * @param string $cwd
     * @param string $file
     *
     * @return string
     */
    private static function replaceCwd($cwd, $file)
    {
        if ($cwd === false) {
            return $file;
        } else {
            return \preg_replace('/^' . \preg_quote($cwd, '/') . '/', '', $file);
        }
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
