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

use Psy\Input\FilterOptions;
use Psy\Output\ShellOutput;
use Psy\Readline\Readline;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Psy Shell history command.
 *
 * Shows, searches and replays readline history. Not too shabby.
 */
class HistoryCommand extends Command
{
    private $filter;
    private $readline;

    /**
     * {@inheritdoc}
     */
    public function __construct($name = null)
    {
        $this->filter = new FilterOptions();

        parent::__construct($name);
    }

    /**
     * Set the Shell's Readline service.
     *
     * @param Readline $readline
     */
    public function setReadline(Readline $readline)
    {
        $this->readline = $readline;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        list($grep, $insensitive, $invert) = FilterOptions::getOptions();

        $this
            ->setName('history')
            ->setAliases(['hist'])
            ->setDefinition([
<<<<<<< HEAD
                new InputOption('show', 's', InputOption::VALUE_REQUIRED, 'Show the given range of lines.'),
                new InputOption('head', 'H', InputOption::VALUE_REQUIRED, 'Display the first N items.'),
                new InputOption('tail', 'T', InputOption::VALUE_REQUIRED, 'Display the last N items.'),
=======
                new InputOption('show',        's', InputOption::VALUE_REQUIRED, 'Show the given range of lines.'),
                new InputOption('head',        'H', InputOption::VALUE_REQUIRED, 'Display the first N items.'),
                new InputOption('tail',        'T', InputOption::VALUE_REQUIRED, 'Display the last N items.'),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                $grep,
                $insensitive,
                $invert,

<<<<<<< HEAD
                new InputOption('no-numbers', 'N', InputOption::VALUE_NONE, 'Omit line numbers.'),

                new InputOption('save', '', InputOption::VALUE_REQUIRED, 'Save history to a file.'),
                new InputOption('replay', '', InputOption::VALUE_NONE, 'Replay.'),
                new InputOption('clear', '', InputOption::VALUE_NONE, 'Clear the history.'),
=======
                new InputOption('no-numbers',  'N', InputOption::VALUE_NONE,     'Omit line numbers.'),

                new InputOption('save',        '',  InputOption::VALUE_REQUIRED, 'Save history to a file.'),
                new InputOption('replay',      '',  InputOption::VALUE_NONE,     'Replay.'),
                new InputOption('clear',       '',  InputOption::VALUE_NONE,     'Clear the history.'),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ])
            ->setDescription('Show the Psy Shell history.')
            ->setHelp(
                <<<'HELP'
Show, search, save or replay the Psy Shell history.

e.g.
<return>>>> history --grep /[bB]acon/</return>
<return>>>> history --show 0..10 --replay</return>
<return>>>> history --clear</return>
<return>>>> history --tail 1000 --save somefile.txt</return>
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
        $this->validateOnlyOne($input, ['show', 'head', 'tail']);
        $this->validateOnlyOne($input, ['save', 'replay', 'clear']);

        $history = $this->getHistorySlice(
            $input->getOption('show'),
            $input->getOption('head'),
            $input->getOption('tail')
        );
        $highlighted = false;

        $this->filter->bind($input);
        if ($this->filter->hasFilter()) {
<<<<<<< HEAD
            $matches = [];
=======
            $matches     = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $highlighted = [];
            foreach ($history as $i => $line) {
                if ($this->filter->match($line, $matches)) {
                    if (isset($matches[0])) {
                        $chunks = \explode($matches[0], $history[$i]);
                        $chunks = \array_map([__CLASS__, 'escape'], $chunks);
<<<<<<< HEAD
                        $glue = \sprintf('<urgent>%s</urgent>', self::escape($matches[0]));
=======
                        $glue   = \sprintf('<urgent>%s</urgent>', self::escape($matches[0]));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                        $highlighted[$i] = \implode($glue, $chunks);
                    }
                } else {
                    unset($history[$i]);
                }
            }
        }

        if ($save = $input->getOption('save')) {
            $output->writeln(\sprintf('Saving history in %s...', $save));
<<<<<<< HEAD
            \file_put_contents($save, \implode(\PHP_EOL, $history).\PHP_EOL);
=======
            \file_put_contents($save, \implode(PHP_EOL, $history) . PHP_EOL);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $output->writeln('<info>History saved.</info>');
        } elseif ($input->getOption('replay')) {
            if (!($input->getOption('show') || $input->getOption('head') || $input->getOption('tail'))) {
                throw new \InvalidArgumentException('You must limit history via --head, --tail or --show before replaying');
            }

            $count = \count($history);
            $output->writeln(\sprintf('Replaying %d line%s of history', $count, ($count !== 1) ? 's' : ''));
            $this->getApplication()->addInput($history);
        } elseif ($input->getOption('clear')) {
            $this->clearHistory();
            $output->writeln('<info>History cleared.</info>');
        } else {
            $type = $input->getOption('no-numbers') ? 0 : ShellOutput::NUMBER_LINES;
            if (!$highlighted) {
                $type = $type | OutputInterface::OUTPUT_RAW;
            }

            $output->page($highlighted ?: $history, $type);
        }

        return 0;
    }

    /**
     * Extract a range from a string.
     *
     * @param string $range
     *
     * @return array [ start, end ]
     */
<<<<<<< HEAD
    private function extractRange(string $range): array
=======
    private function extractRange($range)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (\preg_match('/^\d+$/', $range)) {
            return [$range, $range + 1];
        }

        $matches = [];
        if ($range !== '..' && \preg_match('/^(\d*)\.\.(\d*)$/', $range, $matches)) {
<<<<<<< HEAD
            $start = $matches[1] ? (int) $matches[1] : 0;
            $end = $matches[2] ? (int) $matches[2] + 1 : \PHP_INT_MAX;
=======
            $start = $matches[1] ? \intval($matches[1]) : 0;
            $end   = $matches[2] ? \intval($matches[2]) + 1 : PHP_INT_MAX;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            return [$start, $end];
        }

<<<<<<< HEAD
        throw new \InvalidArgumentException('Unexpected range: '.$range);
=======
        throw new \InvalidArgumentException('Unexpected range: ' . $range);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Retrieve a slice of the readline history.
     *
<<<<<<< HEAD
     * @param string|null $show
     * @param string|null $head
     * @param string|null $tail
     *
     * @return array A slice of history
     */
    private function getHistorySlice($show, $head, $tail): array
=======
     * @param string $show
     * @param string $head
     * @param string $tail
     *
     * @return array A slilce of history
     */
    private function getHistorySlice($show, $head, $tail)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $history = $this->readline->listHistory();

        // don't show the current `history` invocation
        \array_pop($history);

        if ($show) {
            list($start, $end) = $this->extractRange($show);
            $length = $end - $start;
        } elseif ($head) {
            if (!\preg_match('/^\d+$/', $head)) {
                throw new \InvalidArgumentException('Please specify an integer argument for --head');
            }

<<<<<<< HEAD
            $start = 0;
            $length = (int) $head;
=======
            $start  = 0;
            $length = \intval($head);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } elseif ($tail) {
            if (!\preg_match('/^\d+$/', $tail)) {
                throw new \InvalidArgumentException('Please specify an integer argument for --tail');
            }

<<<<<<< HEAD
            $start = \count($history) - $tail;
            $length = (int) $tail + 1;
=======
            $start  = \count($history) - $tail;
            $length = \intval($tail) + 1;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } else {
            return $history;
        }

        return \array_slice($history, $start, $length, true);
    }

    /**
     * Validate that only one of the given $options is set.
     *
     * @param InputInterface $input
     * @param array          $options
     */
    private function validateOnlyOne(InputInterface $input, array $options)
    {
        $count = 0;
        foreach ($options as $opt) {
            if ($input->getOption($opt)) {
                $count++;
            }
        }

        if ($count > 1) {
<<<<<<< HEAD
            throw new \InvalidArgumentException('Please specify only one of --'.\implode(', --', $options));
=======
            throw new \InvalidArgumentException('Please specify only one of --' . \implode(', --', $options));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * Clear the readline history.
     */
    private function clearHistory()
    {
        $this->readline->clearHistory();
    }

<<<<<<< HEAD
    public static function escape(string $string): string
=======
    public static function escape($string)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return OutputFormatter::escape($string);
    }
}
