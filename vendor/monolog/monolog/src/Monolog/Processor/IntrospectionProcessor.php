<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

use Monolog\Logger;
<<<<<<< HEAD
use Psr\Log\LogLevel;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Injects line/file:class/function where the log message came from
 *
 * Warning: This only works if the handler processes the logs directly.
 * If you put the processor on a handler that is behind a FingersCrossedHandler
 * for example, the processor will only be called once the trigger level is reached,
 * and all the log records will have the same file/line/.. data from the call that
 * triggered the FingersCrossedHandler.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
 *
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class IntrospectionProcessor implements ProcessorInterface
{
    /** @var int */
    private $level;
    /** @var string[] */
    private $skipClassesPartials;
    /** @var int */
    private $skipStackFramesCount;
    /** @var string[] */
=======
 */
class IntrospectionProcessor implements ProcessorInterface
{
    private $level;

    private $skipClassesPartials;

    private $skipStackFramesCount;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    private $skipFunctions = [
        'call_user_func',
        'call_user_func_array',
    ];

    /**
<<<<<<< HEAD
     * @param string|int $level               The minimum logging level at which this Processor will be triggered
     * @param string[]   $skipClassesPartials
     *
     * @phpstan-param Level|LevelName|LogLevel::* $level
=======
     * @param string|int $level The minimum logging level at which this Processor will be triggered
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($level = Logger::DEBUG, array $skipClassesPartials = [], int $skipStackFramesCount = 0)
    {
        $this->level = Logger::toMonologLevel($level);
        $this->skipClassesPartials = array_merge(['Monolog\\'], $skipClassesPartials);
        $this->skipStackFramesCount = $skipStackFramesCount;
    }

<<<<<<< HEAD
    /**
     * {@inheritDoc}
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function __invoke(array $record): array
    {
        // return if the level is not high enough
        if ($record['level'] < $this->level) {
            return $record;
        }

        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

        // skip first since it's always the current method
        array_shift($trace);
        // the call_user_func call is also skipped
        array_shift($trace);

        $i = 0;

        while ($this->isTraceClassOrSkippedFunction($trace, $i)) {
            if (isset($trace[$i]['class'])) {
                foreach ($this->skipClassesPartials as $part) {
                    if (strpos($trace[$i]['class'], $part) !== false) {
                        $i++;

                        continue 2;
                    }
                }
            } elseif (in_array($trace[$i]['function'], $this->skipFunctions)) {
                $i++;

                continue;
            }

            break;
        }

        $i += $this->skipStackFramesCount;

        // we should have the call source now
        $record['extra'] = array_merge(
            $record['extra'],
            [
                'file'      => isset($trace[$i - 1]['file']) ? $trace[$i - 1]['file'] : null,
                'line'      => isset($trace[$i - 1]['line']) ? $trace[$i - 1]['line'] : null,
                'class'     => isset($trace[$i]['class']) ? $trace[$i]['class'] : null,
<<<<<<< HEAD
                'callType'  => isset($trace[$i]['type']) ? $trace[$i]['type'] : null,
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                'function'  => isset($trace[$i]['function']) ? $trace[$i]['function'] : null,
            ]
        );

        return $record;
    }

<<<<<<< HEAD
    /**
     * @param array[] $trace
     */
    private function isTraceClassOrSkippedFunction(array $trace, int $index): bool
=======
    private function isTraceClassOrSkippedFunction(array $trace, int $index)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!isset($trace[$index])) {
            return false;
        }

        return isset($trace[$index]['class']) || in_array($trace[$index]['function'], $this->skipFunctions);
    }
}
