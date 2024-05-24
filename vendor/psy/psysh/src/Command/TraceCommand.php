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

namespace Psy\Command;

use Psy\Formatter\TraceFormatter;
use Psy\Input\FilterOptions;
use Psy\Output\ShellOutput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Show the current stack trace.
 */
class TraceCommand extends Command
{
    protected $filter;

    /**
     * {@inheritdoc}
     */
    public function __construct($name = null)
    {
        $this->filter = new FilterOptions();

        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        list($grep, $insensitive, $invert) = FilterOptions::getOptions();

        $this
            ->setName('trace')
            ->setDefinition([
<<<<<<< HEAD
                new InputOption('include-psy', 'p', InputOption::VALUE_NONE, 'Include Psy in the call stack.'),
                new InputOption('num', 'n', InputOption::VALUE_REQUIRED, 'Only include NUM lines.'),
=======
                new InputOption('include-psy', 'p', InputOption::VALUE_NONE,     'Include Psy in the call stack.'),
                new InputOption('num',         'n', InputOption::VALUE_REQUIRED, 'Only include NUM lines.'),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                $grep,
                $insensitive,
                $invert,
            ])
            ->setDescription('Show the current call stack.')
            ->setHelp(
                <<<'HELP'
Show the current call stack.

Optionally, include PsySH in the call stack by passing the <info>--include-psy</info> option.

e.g.
<return>> trace -n10</return>
<return>> trace --include-psy</return>
HELP
            );
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @return int 0 if everything went fine, or an exit code
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
=======
     */
    protected function execute(InputInterface $input, OutputInterface $output)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->filter->bind($input);
        $trace = $this->getBacktrace(new \Exception(), $input->getOption('num'), $input->getOption('include-psy'));
        $output->page($trace, ShellOutput::NUMBER_LINES);

        return 0;
    }

    /**
<<<<<<< HEAD
     * Get a backtrace for an exception or error.
=======
     * Get a backtrace for an exception.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * Optionally limit the number of rows to include with $count, and exclude
     * Psy from the trace.
     *
<<<<<<< HEAD
     * @param \Throwable $e          The exception or error with a backtrace
=======
     * @param \Exception $e          The exception with a backtrace
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param int        $count      (default: PHP_INT_MAX)
     * @param bool       $includePsy (default: true)
     *
     * @return array Formatted stacktrace lines
     */
<<<<<<< HEAD
    protected function getBacktrace(\Throwable $e, ?int $count = null, bool $includePsy = true): array
=======
    protected function getBacktrace(\Exception $e, $count = null, $includePsy = true)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return TraceFormatter::formatTrace($e, $this->filter, $count, $includePsy);
    }
}
