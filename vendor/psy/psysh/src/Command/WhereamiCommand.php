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

use Psy\Formatter\CodeFormatter;
use Psy\Output\ShellOutput;
use Psy\Shell;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Show the context of where you opened the debugger.
 */
class WhereamiCommand extends Command
{
    private $backtrace;

<<<<<<< HEAD
    public function __construct()
    {
        $this->backtrace = \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS);
=======
    /**
     * @param string|null $colorMode (deprecated and ignored)
     */
    public function __construct($colorMode = null)
    {
        $this->backtrace = \debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('whereami')
            ->setDefinition([
<<<<<<< HEAD
                new InputOption('num', 'n', InputOption::VALUE_OPTIONAL, 'Number of lines before and after.', '5'),
                new InputOption('file', 'f|a', InputOption::VALUE_NONE, 'Show the full source for the current file.'),
=======
                new InputOption('num',  'n',   InputOption::VALUE_OPTIONAL, 'Number of lines before and after.', '5'),
                new InputOption('file', 'f|a', InputOption::VALUE_NONE,     'Show the full source for the current file.'),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ])
            ->setDescription('Show where you are in the code.')
            ->setHelp(
                <<<'HELP'
Show where you are in the code.

Optionally, include the number of lines before and after you want to display,
or --file for the whole file.

e.g.
<return>> whereami </return>
<return>> whereami -n10</return>
<return>> whereami --file</return>
HELP
            );
    }

    /**
     * Obtains the correct stack frame in the full backtrace.
     *
     * @return array
     */
<<<<<<< HEAD
    protected function trace(): array
=======
    protected function trace()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        foreach (\array_reverse($this->backtrace) as $stackFrame) {
            if ($this->isDebugCall($stackFrame)) {
                return $stackFrame;
            }
        }

        return \end($this->backtrace);
    }

<<<<<<< HEAD
    private static function isDebugCall(array $stackFrame): bool
    {
        $class = isset($stackFrame['class']) ? $stackFrame['class'] : null;
=======
    private static function isDebugCall(array $stackFrame)
    {
        $class    = isset($stackFrame['class']) ? $stackFrame['class'] : null;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $function = isset($stackFrame['function']) ? $stackFrame['function'] : null;

        return ($class === null && $function === 'Psy\\debug') ||
            ($class === Shell::class && \in_array($function, ['__construct', 'debug']));
    }

    /**
     * Determine the file and line based on the specific backtrace.
     *
     * @return array
     */
<<<<<<< HEAD
    protected function fileInfo(): array
=======
    protected function fileInfo()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $stackFrame = $this->trace();
        if (\preg_match('/eval\(/', $stackFrame['file'])) {
            \preg_match_all('/([^\(]+)\((\d+)/', $stackFrame['file'], $matches);
            $file = $matches[1][0];
            $line = (int) $matches[2][0];
        } else {
            $file = $stackFrame['file'];
            $line = $stackFrame['line'];
        }

        return \compact('file', 'line');
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @return int 0 if everything went fine, or an exit code
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $info = $this->fileInfo();
        $num = $input->getOption('num');
        $lineNum = $info['line'];
        $startLine = \max($lineNum - $num, 1);
        $endLine = $lineNum + $num;
        $code = \file_get_contents($info['file']);

        if ($input->getOption('file')) {
            $startLine = 1;
            $endLine = null;
=======
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $info      = $this->fileInfo();
        $num       = $input->getOption('num');
        $lineNum   = $info['line'];
        $startLine = \max($lineNum - $num, 1);
        $endLine   = $lineNum + $num;
        $code      = \file_get_contents($info['file']);

        if ($input->getOption('file')) {
            $startLine = 1;
            $endLine   = null;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($output instanceof ShellOutput) {
            $output->startPaging();
        }

        $output->writeln(\sprintf('From <info>%s:%s</info>:', $this->replaceCwd($info['file']), $lineNum));
        $output->write(CodeFormatter::formatCode($code, $startLine, $endLine, $lineNum), false);

        if ($output instanceof ShellOutput) {
            $output->stopPaging();
        }

        return 0;
    }

    /**
     * Replace the given directory from the start of a filepath.
     *
     * @param string $file
<<<<<<< HEAD
     */
    private function replaceCwd(string $file): string
=======
     *
     * @return string
     */
    private function replaceCwd($file)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $cwd = \getcwd();
        if ($cwd === false) {
            return $file;
        }

<<<<<<< HEAD
        $cwd = \rtrim($cwd, \DIRECTORY_SEPARATOR).\DIRECTORY_SEPARATOR;

        return \preg_replace('/^'.\preg_quote($cwd, '/').'/', '', $file);
=======
        $cwd = \rtrim($cwd, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        return \preg_replace('/^' . \preg_quote($cwd, '/') . '/', '', $file);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
