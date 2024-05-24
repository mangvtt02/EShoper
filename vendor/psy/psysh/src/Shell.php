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

namespace Psy;

use Psy\CodeCleaner\NoReturnValue;
use Psy\Exception\BreakException;
use Psy\Exception\ErrorException;
use Psy\Exception\Exception as PsyException;
<<<<<<< HEAD
use Psy\Exception\RuntimeException;
use Psy\Exception\ThrowUpException;
=======
use Psy\Exception\ThrowUpException;
use Psy\Exception\TypeErrorException;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\ExecutionLoop\ProcessForker;
use Psy\ExecutionLoop\RunkitReloader;
use Psy\Formatter\TraceFormatter;
use Psy\Input\ShellInput;
use Psy\Input\SilentInput;
<<<<<<< HEAD
use Psy\Output\ShellOutput;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\TabCompletion\Matcher;
use Psy\VarDumper\PresenterAware;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command as BaseCommand;
<<<<<<< HEAD
use Symfony\Component\Console\Exception\ExceptionInterface as SymfonyConsoleException;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * The Psy Shell application.
 *
 * Usage:
 *
 *     $shell = new Shell;
 *     $shell->run();
 *
 * @author Justin Hileman <justin@justinhileman.info>
 */
class Shell extends Application
{
<<<<<<< HEAD
    const VERSION = 'v0.12.3';
=======
    const VERSION = 'v0.10.4';

    const PROMPT      = '>>> ';
    const BUFF_PROMPT = '... ';
    const REPLAY      = '--> ';
    const RETVAL      = '=> ';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    private $config;
    private $cleaner;
    private $output;
    private $originalVerbosity;
    private $readline;
    private $inputBuffer;
    private $code;
    private $codeBuffer;
    private $codeBufferOpen;
    private $codeStack;
    private $stdoutBuffer;
    private $context;
    private $includes;
    private $outputWantsNewline = false;
    private $loopListeners;
    private $autoCompleter;
    private $matchers = [];
    private $commandsMatcher;
    private $lastExecSuccess = true;
<<<<<<< HEAD
    private $nonInteractive = false;
    private $errorReporting;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Create a new Psy Shell.
     *
     * @param Configuration|null $config (default: null)
     */
<<<<<<< HEAD
    public function __construct(?Configuration $config = null)
    {
        $this->config = $config ?: new Configuration();
        $this->cleaner = $this->config->getCodeCleaner();
        $this->context = new Context();
        $this->includes = [];
        $this->readline = $this->config->getReadline();
        $this->inputBuffer = [];
        $this->codeStack = [];
        $this->stdoutBuffer = '';
=======
    public function __construct(Configuration $config = null)
    {
        $this->config        = $config ?: new Configuration();
        $this->cleaner       = $this->config->getCodeCleaner();
        $this->context       = new Context();
        $this->includes      = [];
        $this->readline      = $this->config->getReadline();
        $this->inputBuffer   = [];
        $this->codeStack     = [];
        $this->stdoutBuffer  = '';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->loopListeners = $this->getDefaultLoopListeners();

        parent::__construct('Psy Shell', self::VERSION);

        $this->config->setShell($this);

        // Register the current shell session's config with \Psy\info
        \Psy\info($this->config);
    }

    /**
     * Check whether the first thing in a backtrace is an include call.
     *
     * This is used by the psysh bin to decide whether to start a shell on boot,
     * or to simply autoload the library.
     */
<<<<<<< HEAD
    public static function isIncluded(array $trace): bool
    {
        $isIncluded = isset($trace[0]['function']) &&
          \in_array($trace[0]['function'], ['require', 'include', 'require_once', 'include_once']);

        // Detect Composer PHP bin proxies.
        if ($isIncluded && \array_key_exists('_composer_autoload_path', $GLOBALS) && \preg_match('{[\\\\/]psysh$}', $trace[0]['file'])) {
            // If we're in a bin proxy, we'll *always* see one include, but we
            // care if we see a second immediately after that.
            return isset($trace[1]['function']) &&
                \in_array($trace[1]['function'], ['require', 'include', 'require_once', 'include_once']);
        }

        return $isIncluded;
    }

    /**
     * Check if the currently running PsySH bin is a phar archive.
     */
    public static function isPhar(): bool
    {
        return \class_exists("\Phar") && \Phar::running() !== '' && \strpos(__FILE__, \Phar::running(true)) === 0;
=======
    public static function isIncluded(array $trace)
    {
        return isset($trace[0]['function']) &&
          \in_array($trace[0]['function'], ['require', 'include', 'require_once', 'include_once']);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Invoke a Psy Shell from the current context.
     *
     * @see Psy\debug
     * @deprecated will be removed in 1.0. Use \Psy\debug instead
     *
     * @param array         $vars   Scope variables from the calling context (default: [])
     * @param object|string $bindTo Bound object ($this) or class (self) value for the shell
     *
     * @return array Scope variables from the debugger session
     */
<<<<<<< HEAD
    public static function debug(array $vars = [], $bindTo = null): array
    {
        @\trigger_error('`Psy\\Shell::debug` is deprecated; call `Psy\\debug` instead.', \E_USER_DEPRECATED);

=======
    public static function debug(array $vars = [], $bindTo = null)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return \Psy\debug($vars, $bindTo);
    }

    /**
     * Adds a command object.
     *
     * {@inheritdoc}
     *
     * @param BaseCommand $command A Symfony Console Command object
     *
     * @return BaseCommand The registered command
     */
<<<<<<< HEAD
    public function add(BaseCommand $command): BaseCommand
=======
    public function add(BaseCommand $command)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($ret = parent::add($command)) {
            if ($ret instanceof ContextAware) {
                $ret->setContext($this->context);
            }

            if ($ret instanceof PresenterAware) {
                $ret->setPresenter($this->config->getPresenter());
            }

            if (isset($this->commandsMatcher)) {
                $this->commandsMatcher->setCommands($this->all());
            }
        }

        return $ret;
    }

    /**
     * Gets the default input definition.
     *
     * @return InputDefinition An InputDefinition instance
     */
<<<<<<< HEAD
    protected function getDefaultInputDefinition(): InputDefinition
=======
    protected function getDefaultInputDefinition()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new InputDefinition([
            new InputArgument('command', InputArgument::REQUIRED, 'The command to execute'),
            new InputOption('--help', '-h', InputOption::VALUE_NONE, 'Display this help message.'),
        ]);
    }

    /**
     * Gets the default commands that should always be available.
     *
     * @return array An array of default Command instances
     */
<<<<<<< HEAD
    protected function getDefaultCommands(): array
=======
    protected function getDefaultCommands()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $sudo = new Command\SudoCommand();
        $sudo->setReadline($this->readline);

        $hist = new Command\HistoryCommand();
        $hist->setReadline($this->readline);

        return [
            new Command\HelpCommand(),
            new Command\ListCommand(),
            new Command\DumpCommand(),
            new Command\DocCommand(),
            new Command\ShowCommand(),
            new Command\WtfCommand(),
            new Command\WhereamiCommand(),
            new Command\ThrowUpCommand(),
            new Command\TimeitCommand(),
            new Command\TraceCommand(),
            new Command\BufferCommand(),
            new Command\ClearCommand(),
            new Command\EditCommand($this->config->getRuntimeDir()),
            // new Command\PsyVersionCommand(),
            $sudo,
            $hist,
            new Command\ExitCommand(),
        ];
    }

    /**
<<<<<<< HEAD
     * @return Matcher\AbstractMatcher[]
     */
    protected function getDefaultMatchers(): array
=======
     * @return array
     */
    protected function getDefaultMatchers()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // Store the Commands Matcher for later. If more commands are added,
        // we'll update the Commands Matcher too.
        $this->commandsMatcher = new Matcher\CommandsMatcher($this->all());

        return [
            $this->commandsMatcher,
            new Matcher\KeywordsMatcher(),
            new Matcher\VariablesMatcher(),
            new Matcher\ConstantsMatcher(),
            new Matcher\FunctionsMatcher(),
            new Matcher\ClassNamesMatcher(),
            new Matcher\ClassMethodsMatcher(),
            new Matcher\ClassAttributesMatcher(),
            new Matcher\ObjectMethodsMatcher(),
            new Matcher\ObjectAttributesMatcher(),
            new Matcher\ClassMethodDefaultParametersMatcher(),
            new Matcher\ObjectMethodDefaultParametersMatcher(),
            new Matcher\FunctionDefaultParametersMatcher(),
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @deprecated Nothing should use this anymore
     */
    protected function getTabCompletionMatchers()
    {
        @\trigger_error('getTabCompletionMatchers is no longer used', E_USER_DEPRECATED);
    }

    /**
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Gets the default command loop listeners.
     *
     * @return array An array of Execution Loop Listener instances
     */
<<<<<<< HEAD
    protected function getDefaultLoopListeners(): array
=======
    protected function getDefaultLoopListeners()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $listeners = [];

        if (ProcessForker::isSupported() && $this->config->usePcntl()) {
            $listeners[] = new ProcessForker();
        }

        if (RunkitReloader::isSupported()) {
            $listeners[] = new RunkitReloader();
        }

        return $listeners;
    }

    /**
     * Add tab completion matchers.
     *
     * @param array $matchers
     */
    public function addMatchers(array $matchers)
    {
        $this->matchers = \array_merge($this->matchers, $matchers);

        if (isset($this->autoCompleter)) {
            $this->addMatchersToAutoCompleter($matchers);
        }
    }

    /**
     * @deprecated Call `addMatchers` instead
     *
     * @param array $matchers
     */
    public function addTabCompletionMatchers(array $matchers)
    {
<<<<<<< HEAD
        @\trigger_error('`addTabCompletionMatchers` is deprecated; call `addMatchers` instead.', \E_USER_DEPRECATED);

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->addMatchers($matchers);
    }

    /**
     * Set the Shell output.
     *
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
        $this->originalVerbosity = $output->getVerbosity();
    }

    /**
     * Runs PsySH.
     *
     * @param InputInterface|null  $input  An Input instance
     * @param OutputInterface|null $output An Output instance
     *
     * @return int 0 if everything went fine, or an error code
     */
<<<<<<< HEAD
    public function run(?InputInterface $input = null, ?OutputInterface $output = null): int
=======
    public function run(InputInterface $input = null, OutputInterface $output = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // We'll just ignore the input passed in, and set up our own!
        $input = new ArrayInput([]);

        if ($output === null) {
            $output = $this->config->getOutput();
        }

        $this->setAutoExit(false);
        $this->setCatchExceptions(false);

        try {
            return parent::run($input, $output);
<<<<<<< HEAD
        } catch (\Throwable $e) {
=======
        } catch (\Exception $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->writeException($e);
        }

        return 1;
    }

    /**
     * Runs PsySH.
     *
<<<<<<< HEAD
     * @throws \Throwable if thrown via the `throw-up` command
=======
     * @throws \Exception if thrown via the `throw-up` command
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param InputInterface  $input  An Input instance
     * @param OutputInterface $output An Output instance
     *
     * @return int 0 if everything went fine, or an error code
     */
<<<<<<< HEAD
    public function doRun(InputInterface $input, OutputInterface $output): int
=======
    public function doRun(InputInterface $input, OutputInterface $output)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->setOutput($output);
        $this->resetCodeBuffer();

        if ($input->isInteractive()) {
            // @todo should it be possible to have raw output in an interactive run?
            return $this->doInteractiveRun();
        } else {
            return $this->doNonInteractiveRun($this->config->rawOutput());
        }
    }

    /**
     * Run PsySH in interactive mode.
     *
     * Initializes tab completion and readline history, then spins up the
     * execution loop.
     *
<<<<<<< HEAD
     * @throws \Throwable if thrown via the `throw-up` command
     *
     * @return int 0 if everything went fine, or an error code
     */
    private function doInteractiveRun(): int
=======
     * @throws \Exception if thrown via the `throw-up` command
     *
     * @return int 0 if everything went fine, or an error code
     */
    private function doInteractiveRun()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->initializeTabCompletion();
        $this->readline->readHistory();

        $this->output->writeln($this->getHeader());
        $this->writeVersionInfo();
        $this->writeStartupMessage();

        try {
            $this->beforeRun();
            $this->loadIncludes();
            $loop = new ExecutionLoopClosure($this);
            $loop->execute();
            $this->afterRun();
        } catch (ThrowUpException $e) {
            throw $e->getPrevious();
        } catch (BreakException $e) {
            // The ProcessForker throws a BreakException to finish the main thread.
        }

        return 0;
    }

    /**
     * Run PsySH in non-interactive mode.
     *
     * Note that this isn't very useful unless you supply "include" arguments at
     * the command line, or code via stdin.
     *
     * @param bool $rawOutput
     *
     * @return int 0 if everything went fine, or an error code
     */
<<<<<<< HEAD
    private function doNonInteractiveRun(bool $rawOutput): int
    {
        $this->nonInteractive = true;

=======
    private function doNonInteractiveRun($rawOutput)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        // If raw output is enabled (or output is piped) we don't want startup messages.
        if (!$rawOutput && !$this->config->outputIsPiped()) {
            $this->output->writeln($this->getHeader());
            $this->writeVersionInfo();
            $this->writeStartupMessage();
        }

        $this->beforeRun();
        $this->loadIncludes();

        // For non-interactive execution, read only from the input buffer or from piped input.
        // Otherwise it'll try to readline and hang, waiting for user input with no indication of
        // what's holding things up.
        if (!empty($this->inputBuffer) || $this->config->inputIsPiped()) {
            $this->getInput(false);
        }

        if ($this->hasCode()) {
            $ret = $this->execute($this->flushCode());
            $this->writeReturnValue($ret, $rawOutput);
        }

        $this->afterRun();
<<<<<<< HEAD
        $this->nonInteractive = false;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return 0;
    }

    /**
     * Configures the input and output instances based on the user arguments and options.
     */
<<<<<<< HEAD
    protected function configureIO(InputInterface $input, OutputInterface $output): void
=======
    protected function configureIO(InputInterface $input, OutputInterface $output)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // @todo overrides via environment variables (or should these happen in config? ... probably config)
        $input->setInteractive($this->config->getInputInteractive());

        if ($this->config->getOutputDecorated() !== null) {
            $output->setDecorated($this->config->getOutputDecorated());
        }

        $output->setVerbosity($this->config->getOutputVerbosity());
    }

    /**
     * Load user-defined includes.
     */
    private function loadIncludes()
    {
        // Load user-defined includes
        $load = function (self $__psysh__) {
            \set_error_handler([$__psysh__, 'handleError']);
            foreach ($__psysh__->getIncludes() as $__psysh_include__) {
                try {
<<<<<<< HEAD
                    include_once $__psysh_include__;
=======
                    include $__psysh_include__;
                } catch (\Error $_e) {
                    $__psysh__->writeException(ErrorException::fromError($_e));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                } catch (\Exception $_e) {
                    $__psysh__->writeException($_e);
                }
            }
            \restore_error_handler();
            unset($__psysh_include__);

            // Override any new local variables with pre-defined scope variables
            \extract($__psysh__->getScopeVariables(false));

            // ... then add the whole mess of variables back.
            $__psysh__->setScopeVariables(\get_defined_vars());
        };

        $load($this);
    }

    /**
     * Read user input.
     *
     * This will continue fetching user input until the code buffer contains
     * valid code.
     *
     * @throws BreakException if user hits Ctrl+D
     *
     * @param bool $interactive
     */
<<<<<<< HEAD
    public function getInput(bool $interactive = true)
=======
    public function getInput($interactive = true)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->codeBufferOpen = false;

        do {
            // reset output verbosity (in case it was altered by a subcommand)
            $this->output->setVerbosity($this->originalVerbosity);

            $input = $this->readline();

            /*
             * Handle Ctrl+D. It behaves differently in different cases:
             *
             *   1) In an expression, like a function or "if" block, clear the input buffer
             *   2) At top-level session, behave like the exit command
             *   3) When non-interactive, return, because that's the end of stdin
             */
            if ($input === false) {
                if (!$interactive) {
                    return;
                }

                $this->output->writeln('');

                if ($this->hasCode()) {
                    $this->resetCodeBuffer();
                } else {
                    throw new BreakException('Ctrl+D');
                }
            }

            // handle empty input
            if (\trim($input) === '' && !$this->codeBufferOpen) {
                continue;
            }

            $input = $this->onInput($input);

            // If the input isn't in an open string or comment, check for commands to run.
            if ($this->hasCommand($input) && !$this->inputInOpenStringOrComment($input)) {
                $this->addHistory($input);
                $this->runCommand($input);

                continue;
            }

            $this->addCode($input);
        } while (!$interactive || !$this->hasValidCode());
    }

    /**
     * Check whether the code buffer (plus current input) is in an open string or comment.
     *
     * @param string $input current line of input
     *
     * @return bool true if the input is in an open string or comment
     */
<<<<<<< HEAD
    private function inputInOpenStringOrComment(string $input): bool
=======
    private function inputInOpenStringOrComment($input)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!$this->hasCode()) {
            return false;
        }

        $code = $this->codeBuffer;
<<<<<<< HEAD
        $code[] = $input;
        $tokens = @\token_get_all('<?php '.\implode("\n", $code));
        $last = \array_pop($tokens);

        return $last === '"' || $last === '`' ||
            (\is_array($last) && \in_array($last[0], [\T_ENCAPSED_AND_WHITESPACE, \T_START_HEREDOC, \T_COMMENT]));
=======
        \array_push($code, $input);
        $tokens = @\token_get_all('<?php ' . \implode("\n", $code));
        $last = \array_pop($tokens);

        return $last === '"' || $last === '`' ||
            (\is_array($last) && \in_array($last[0], [T_ENCAPSED_AND_WHITESPACE, T_START_HEREDOC, T_COMMENT]));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Run execution loop listeners before the shell session.
     */
    protected function beforeRun()
    {
        foreach ($this->loopListeners as $listener) {
            $listener->beforeRun($this);
        }
    }

    /**
     * Run execution loop listeners at the start of each loop.
     */
    public function beforeLoop()
    {
        foreach ($this->loopListeners as $listener) {
            $listener->beforeLoop($this);
        }
    }

    /**
     * Run execution loop listeners on user input.
     *
     * @param string $input
<<<<<<< HEAD
     */
    public function onInput(string $input): string
=======
     *
     * @return string
     */
    public function onInput($input)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        foreach ($this->loopListeners as $listeners) {
            if (($return = $listeners->onInput($this, $input)) !== null) {
                $input = $return;
            }
        }

        return $input;
    }

    /**
     * Run execution loop listeners on code to be executed.
     *
     * @param string $code
<<<<<<< HEAD
     */
    public function onExecute(string $code): string
    {
        $this->errorReporting = \error_reporting();

=======
     *
     * @return string
     */
    public function onExecute($code)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        foreach ($this->loopListeners as $listener) {
            if (($return = $listener->onExecute($this, $code)) !== null) {
                $code = $return;
            }
        }

<<<<<<< HEAD
        $output = $this->output;
        if ($output instanceof ConsoleOutput) {
            $output = $output->getErrorOutput();
        }

        $output->writeln(\sprintf('<whisper>%s</whisper>', OutputFormatter::escape($code)), ConsoleOutput::VERBOSITY_DEBUG);

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $code;
    }

    /**
     * Run execution loop listeners after each loop.
     */
    public function afterLoop()
    {
        foreach ($this->loopListeners as $listener) {
            $listener->afterLoop($this);
        }
    }

    /**
     * Run execution loop listers after the shell session.
     */
    protected function afterRun()
    {
        foreach ($this->loopListeners as $listener) {
            $listener->afterRun($this);
        }
    }

    /**
     * Set the variables currently in scope.
     *
     * @param array $vars
     */
    public function setScopeVariables(array $vars)
    {
        $this->context->setAll($vars);
    }

    /**
     * Return the set of variables currently in scope.
     *
     * @param bool $includeBoundObject Pass false to exclude 'this'. If you're
     *                                 passing the scope variables to `extract`
<<<<<<< HEAD
     *                                 you _must_ exclude 'this'
     *
     * @return array Associative array of scope variables
     */
    public function getScopeVariables(bool $includeBoundObject = true): array
=======
     *                                 in PHP 7.1+, you _must_ exclude 'this'
     *
     * @return array Associative array of scope variables
     */
    public function getScopeVariables($includeBoundObject = true)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $vars = $this->context->getAll();

        if (!$includeBoundObject) {
            unset($vars['this']);
        }

        return $vars;
    }

    /**
     * Return the set of magic variables currently in scope.
     *
     * @param bool $includeBoundObject Pass false to exclude 'this'. If you're
     *                                 passing the scope variables to `extract`
<<<<<<< HEAD
     *                                 you _must_ exclude 'this'
     *
     * @return array Associative array of magic scope variables
     */
    public function getSpecialScopeVariables(bool $includeBoundObject = true): array
=======
     *                                 in PHP 7.1+, you _must_ exclude 'this'
     *
     * @return array Associative array of magic scope variables
     */
    public function getSpecialScopeVariables($includeBoundObject = true)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $vars = $this->context->getSpecialVariables();

        if (!$includeBoundObject) {
            unset($vars['this']);
        }

        return $vars;
    }

    /**
     * Return the set of variables currently in scope which differ from the
     * values passed as $currentVars.
     *
     * This is used inside the Execution Loop Closure to pick up scope variable
     * changes made by commands while the loop is running.
     *
     * @param array $currentVars
     *
     * @return array Associative array of scope variables which differ from $currentVars
     */
<<<<<<< HEAD
    public function getScopeVariablesDiff(array $currentVars): array
=======
    public function getScopeVariablesDiff(array $currentVars)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $newVars = [];

        foreach ($this->getScopeVariables(false) as $key => $value) {
<<<<<<< HEAD
            if (!\array_key_exists($key, $currentVars) || $currentVars[$key] !== $value) {
=======
            if (!array_key_exists($key, $currentVars) || $currentVars[$key] !== $value) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $newVars[$key] = $value;
            }
        }

        return $newVars;
    }

    /**
     * Get the set of unused command-scope variable names.
     *
     * @return array Array of unused variable names
     */
<<<<<<< HEAD
    public function getUnusedCommandScopeVariableNames(): array
=======
    public function getUnusedCommandScopeVariableNames()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->context->getUnusedCommandScopeVariableNames();
    }

    /**
     * Get the set of variable names currently in scope.
     *
     * @return array Array of variable names
     */
<<<<<<< HEAD
    public function getScopeVariableNames(): array
=======
    public function getScopeVariableNames()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \array_keys($this->context->getAll());
    }

    /**
     * Get a scope variable value by name.
     *
     * @param string $name
     *
     * @return mixed
     */
<<<<<<< HEAD
    public function getScopeVariable(string $name)
=======
    public function getScopeVariable($name)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->context->get($name);
    }

    /**
     * Set the bound object ($this variable) for the interactive shell.
     *
     * @param object|null $boundObject
     */
    public function setBoundObject($boundObject)
    {
        $this->context->setBoundObject($boundObject);
    }

    /**
     * Get the bound object ($this variable) for the interactive shell.
     *
     * @return object|null
     */
    public function getBoundObject()
    {
        return $this->context->getBoundObject();
    }

    /**
     * Set the bound class (self) for the interactive shell.
     *
     * @param string|null $boundClass
     */
    public function setBoundClass($boundClass)
    {
        $this->context->setBoundClass($boundClass);
    }

    /**
     * Get the bound class (self) for the interactive shell.
     *
     * @return string|null
     */
    public function getBoundClass()
    {
        return $this->context->getBoundClass();
    }

    /**
     * Add includes, to be parsed and executed before running the interactive shell.
     *
     * @param array $includes
     */
    public function setIncludes(array $includes = [])
    {
        $this->includes = $includes;
    }

    /**
     * Get PHP files to be parsed and executed before running the interactive shell.
     *
<<<<<<< HEAD
     * @return string[]
     */
    public function getIncludes(): array
=======
     * @return array
     */
    public function getIncludes()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \array_merge($this->config->getDefaultIncludes(), $this->includes);
    }

    /**
     * Check whether this shell's code buffer contains code.
     *
     * @return bool True if the code buffer contains code
     */
<<<<<<< HEAD
    public function hasCode(): bool
=======
    public function hasCode()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return !empty($this->codeBuffer);
    }

    /**
     * Check whether the code in this shell's code buffer is valid.
     *
     * If the code is valid, the code buffer should be flushed and evaluated.
     *
     * @return bool True if the code buffer content is valid
     */
<<<<<<< HEAD
    protected function hasValidCode(): bool
=======
    protected function hasValidCode()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return !$this->codeBufferOpen && $this->code !== false;
    }

    /**
     * Add code to the code buffer.
     *
     * @param string $code
     * @param bool   $silent
     */
<<<<<<< HEAD
    public function addCode(string $code, bool $silent = false)
=======
    public function addCode($code, $silent = false)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        try {
            // Code lines ending in \ keep the buffer open
            if (\substr(\rtrim($code), -1) === '\\') {
                $this->codeBufferOpen = true;
                $code = \substr(\rtrim($code), 0, -1);
            } else {
                $this->codeBufferOpen = false;
            }

            $this->codeBuffer[] = $silent ? new SilentInput($code) : $code;
<<<<<<< HEAD
            $this->code = $this->cleaner->clean($this->codeBuffer, $this->config->requireSemicolons());
        } catch (\Throwable $e) {
=======
            $this->code         = $this->cleaner->clean($this->codeBuffer, $this->config->requireSemicolons());
        } catch (\Exception $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            // Add failed code blocks to the readline history.
            $this->addCodeBufferToHistory();

            throw $e;
        }
    }

    /**
     * Set the code buffer.
     *
     * This is mostly used by `Shell::execute`. Any existing code in the input
     * buffer is pushed onto a stack and will come back after this new code is
     * executed.
     *
     * @throws \InvalidArgumentException if $code isn't a complete statement
     *
     * @param string $code
     * @param bool   $silent
     */
<<<<<<< HEAD
    private function setCode(string $code, bool $silent = false)
=======
    private function setCode($code, $silent = false)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($this->hasCode()) {
            $this->codeStack[] = [$this->codeBuffer, $this->codeBufferOpen, $this->code];
        }

        $this->resetCodeBuffer();
        try {
            $this->addCode($code, $silent);
        } catch (\Throwable $e) {
            $this->popCodeStack();

            throw $e;
<<<<<<< HEAD
=======
        } catch (\Exception $e) {
            $this->popCodeStack();

            throw $e;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if (!$this->hasValidCode()) {
            $this->popCodeStack();

            throw new \InvalidArgumentException('Unexpected end of input');
        }
    }

    /**
     * Get the current code buffer.
     *
     * This is useful for commands which manipulate the buffer.
     *
<<<<<<< HEAD
     * @return string[]
     */
    public function getCodeBuffer(): array
=======
     * @return array
     */
    public function getCodeBuffer()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->codeBuffer;
    }

    /**
     * Run a Psy Shell command given the user input.
     *
     * @throws \InvalidArgumentException if the input is not a valid command
     *
     * @param string $input User input string
     *
     * @return mixed Who knows?
     */
<<<<<<< HEAD
    protected function runCommand(string $input)
=======
    protected function runCommand($input)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $command = $this->getCommand($input);

        if (empty($command)) {
<<<<<<< HEAD
            throw new \InvalidArgumentException('Command not found: '.$input);
=======
            throw new \InvalidArgumentException('Command not found: ' . $input);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $input = new ShellInput(\str_replace('\\', '\\\\', \rtrim($input, " \t\n\r\0\x0B;")));

        if ($input->hasParameterOption(['--help', '-h'])) {
            $helpCommand = $this->get('help');
<<<<<<< HEAD
            if (!$helpCommand instanceof Command\HelpCommand) {
                throw new RuntimeException('Invalid help command instance');
            }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $helpCommand->setCommand($command);

            return $helpCommand->run(new StringInput(''), $this->output);
        }

        return $command->run($input, $this->output);
    }

    /**
     * Reset the current code buffer.
     *
     * This should be run after evaluating user input, catching exceptions, or
     * on demand by commands such as BufferCommand.
     */
    public function resetCodeBuffer()
    {
        $this->codeBuffer = [];
<<<<<<< HEAD
        $this->code = false;
=======
        $this->code       = false;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Inject input into the input buffer.
     *
     * This is useful for commands which want to replay history.
     *
     * @param string|array $input
     * @param bool         $silent
     */
<<<<<<< HEAD
    public function addInput($input, bool $silent = false)
=======
    public function addInput($input, $silent = false)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        foreach ((array) $input as $line) {
            $this->inputBuffer[] = $silent ? new SilentInput($line) : $line;
        }
    }

    /**
     * Flush the current (valid) code buffer.
     *
     * If the code buffer is valid, resets the code buffer and returns the
     * current code.
     *
<<<<<<< HEAD
     * @return string|null PHP code buffer contents
=======
     * @return string PHP code buffer contents
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function flushCode()
    {
        if ($this->hasValidCode()) {
            $this->addCodeBufferToHistory();
            $code = $this->code;
            $this->popCodeStack();

            return $code;
        }
    }

    /**
     * Reset the code buffer and restore any code pushed during `execute` calls.
     */
    private function popCodeStack()
    {
        $this->resetCodeBuffer();

        if (empty($this->codeStack)) {
            return;
        }

        list($codeBuffer, $codeBufferOpen, $code) = \array_pop($this->codeStack);

<<<<<<< HEAD
        $this->codeBuffer = $codeBuffer;
        $this->codeBufferOpen = $codeBufferOpen;
        $this->code = $code;
=======
        $this->codeBuffer     = $codeBuffer;
        $this->codeBufferOpen = $codeBufferOpen;
        $this->code           = $code;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * (Possibly) add a line to the readline history.
     *
     * Like Bash, if the line starts with a space character, it will be omitted
     * from history. Note that an entire block multi-line code input will be
     * omitted iff the first line begins with a space.
     *
     * Additionally, if a line is "silent", i.e. it was initially added with the
     * silent flag, it will also be omitted.
     *
     * @param string|SilentInput $line
     */
    private function addHistory($line)
    {
        if ($line instanceof SilentInput) {
            return;
        }

        // Skip empty lines and lines starting with a space
        if (\trim($line) !== '' && \substr($line, 0, 1) !== ' ') {
            $this->readline->addHistory($line);
        }
    }

    /**
     * Filter silent input from code buffer, write the rest to readline history.
     */
    private function addCodeBufferToHistory()
    {
        $codeBuffer = \array_filter($this->codeBuffer, function ($line) {
            return !$line instanceof SilentInput;
        });

        $this->addHistory(\implode("\n", $codeBuffer));
    }

    /**
     * Get the current evaluation scope namespace.
     *
     * @see CodeCleaner::getNamespace
     *
<<<<<<< HEAD
     * @return string|null Current code namespace
=======
     * @return string Current code namespace
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function getNamespace()
    {
        if ($namespace = $this->cleaner->getNamespace()) {
            return \implode('\\', $namespace);
        }
    }

    /**
     * Write a string to stdout.
     *
     * This is used by the shell loop for rendering output from evaluated code.
     *
     * @param string $out
     * @param int    $phase Output buffering phase
     */
<<<<<<< HEAD
    public function writeStdout(string $out, int $phase = \PHP_OUTPUT_HANDLER_END)
    {
        if ($phase & \PHP_OUTPUT_HANDLER_START) {
            if ($this->output instanceof ShellOutput) {
                $this->output->startPaging();
            }
        }

        $isCleaning = $phase & \PHP_OUTPUT_HANDLER_CLEAN;
=======
    public function writeStdout($out, $phase = PHP_OUTPUT_HANDLER_END)
    {
        $isCleaning = $phase & PHP_OUTPUT_HANDLER_CLEAN;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        // Incremental flush
        if ($out !== '' && !$isCleaning) {
            $this->output->write($out, false, OutputInterface::OUTPUT_RAW);
            $this->outputWantsNewline = (\substr($out, -1) !== "\n");
            $this->stdoutBuffer .= $out;
        }

        // Output buffering is done!
<<<<<<< HEAD
        if ($phase & \PHP_OUTPUT_HANDLER_END) {
            // Write an extra newline if stdout didn't end with one
            if ($this->outputWantsNewline) {
                if (!$this->config->rawOutput() && !$this->config->outputIsPiped()) {
                    $this->output->writeln(\sprintf('<whisper>%s</whisper>', $this->config->useUnicode() ? '⏎' : '\\n'));
=======
        if ($phase & PHP_OUTPUT_HANDLER_END) {
            // Write an extra newline if stdout didn't end with one
            if ($this->outputWantsNewline) {
                if (!$this->config->rawOutput() && !$this->config->outputIsPiped()) {
                    $this->output->writeln(\sprintf('<aside>%s</aside>', $this->config->useUnicode() ? '⏎' : '\\n'));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                } else {
                    $this->output->writeln('');
                }
                $this->outputWantsNewline = false;
            }

            // Save the stdout buffer as $__out
            if ($this->stdoutBuffer !== '') {
                $this->context->setLastStdout($this->stdoutBuffer);
                $this->stdoutBuffer = '';
            }
<<<<<<< HEAD

            if ($this->output instanceof ShellOutput) {
                $this->output->stopPaging();
            }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * Write a return value to stdout.
     *
     * The return value is formatted or pretty-printed, and rendered in a
     * visibly distinct manner (in this case, as cyan).
     *
     * @see self::presentValue
     *
     * @param mixed $ret
     * @param bool  $rawOutput Write raw var_export-style values
     */
<<<<<<< HEAD
    public function writeReturnValue($ret, bool $rawOutput = false)
=======
    public function writeReturnValue($ret, $rawOutput = false)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->lastExecSuccess = true;

        if ($ret instanceof NoReturnValue) {
            return;
        }

        $this->context->setReturnValue($ret);

        if ($rawOutput) {
            $formatted = \var_export($ret, true);
        } else {
<<<<<<< HEAD
            $prompt = $this->config->theme()->returnValue();
            $indent = \str_repeat(' ', \strlen($prompt));
            $formatted = $this->presentValue($ret);
            $formattedRetValue = \sprintf('<whisper>%s</whisper>', $prompt);

            $formatted = $formattedRetValue.\str_replace(\PHP_EOL, \PHP_EOL.$indent, $formatted);
        }

        if ($this->output instanceof ShellOutput) {
            $this->output->page($formatted.\PHP_EOL);
        } else {
            $this->output->writeln($formatted);
        }
    }

    /**
     * Renders a caught Exception or Error.
=======
            $indent = \str_repeat(' ', \strlen(static::RETVAL));
            $formatted = $this->presentValue($ret);
            $formatted = static::RETVAL . \str_replace(PHP_EOL, PHP_EOL . $indent, $formatted);
        }

        $this->output->writeln($formatted);
    }

    /**
     * Renders a caught Exception.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * Exceptions are formatted according to severity. ErrorExceptions which were
     * warnings or Strict errors aren't rendered as harshly as real errors.
     *
     * Stores $e as the last Exception in the Shell Context.
     *
<<<<<<< HEAD
     * @param \Throwable $e An exception or error instance
     */
    public function writeException(\Throwable $e)
    {
        // No need to write the break exception during a non-interactive run.
        if ($e instanceof BreakException && $this->nonInteractive) {
            $this->resetCodeBuffer();

            return;
        }

        // Break exceptions don't count :)
        if (!$e instanceof BreakException) {
            $this->lastExecSuccess = false;
            $this->context->setLastException($e);
        }
=======
     * @param \Exception $e An exception instance
     */
    public function writeException(\Exception $e)
    {
        $this->lastExecSuccess = false;
        $this->context->setLastException($e);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $output = $this->output;
        if ($output instanceof ConsoleOutput) {
            $output = $output->getErrorOutput();
        }
<<<<<<< HEAD

        if (!$this->config->theme()->compact()) {
            $output->writeln('');
        }

        $output->writeln($this->formatException($e));

        if (!$this->config->theme()->compact()) {
            $output->writeln('');
        }

=======
        $output->writeln($this->formatException($e));

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        // Include an exception trace (as long as this isn't a BreakException).
        if (!$e instanceof BreakException && $output->getVerbosity() >= OutputInterface::VERBOSITY_VERBOSE) {
            $trace = TraceFormatter::formatTrace($e);
            if (\count($trace) !== 0) {
                $output->writeln('--');
                $output->write($trace, true);
                $output->writeln('');
            }
        }

        $this->resetCodeBuffer();
    }

    /**
     * Check whether the last exec was successful.
     *
     * Returns true if a return value was logged rather than an exception.
<<<<<<< HEAD
     */
    public function getLastExecSuccess(): bool
=======
     *
     * @return bool
     */
    public function getLastExecSuccess()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->lastExecSuccess;
    }

    /**
<<<<<<< HEAD
     * Helper for formatting an exception or error for writeException().
     *
     * @todo extract this to somewhere it makes more sense
     *
     * @param \Throwable $e
     */
    public function formatException(\Throwable $e): string
    {
        $indent = $this->config->theme()->compact() ? '' : '  ';

        if ($e instanceof BreakException) {
            return \sprintf('%s<info> INFO </info> %s.', $indent, \rtrim($e->getRawMessage(), '.'));
        } elseif ($e instanceof PsyException) {
            $message = $e->getLine() > 1
                ? \sprintf('%s in %s on line %d', $e->getRawMessage(), $e->getFile(), $e->getLine())
                : \sprintf('%s in %s', $e->getRawMessage(), $e->getFile());

            $messageLabel = \strtoupper($this->getMessageLabel($e));
        } else {
            $message = $e->getMessage();
            $messageLabel = $this->getMessageLabel($e);
        }

        $message = \preg_replace(
            "#(\\w:)?([\\\\/]\\w+)*[\\\\/]src[\\\\/]Execution(?:Loop)?Closure.php\(\d+\) : eval\(\)'d code#",
            "eval()'d code",
            $message
        );

        $message = \str_replace(" in eval()'d code", '', $message);
        $message = \trim($message);

        // Ensures the given string ends with punctuation...
        if (!empty($message) && !\in_array(\substr($message, -1), ['.', '?', '!', ':'])) {
            $message = "$message.";
        }

        // Ensures the given message only contains relative paths...
        $message = \str_replace(\getcwd().\DIRECTORY_SEPARATOR, '', $message);

        $severity = ($e instanceof \ErrorException) ? $this->getSeverity($e) : 'error';

        return \sprintf('%s<%s> %s </%s> %s', $indent, $severity, $messageLabel, $severity, OutputFormatter::escape($message));
=======
     * Helper for formatting an exception for writeException().
     *
     * @todo extract this to somewhere it makes more sense
     *
     * @param \Exception $e
     *
     * @return string
     */
    public function formatException(\Exception $e)
    {
        $message = $e->getMessage();
        if (!$e instanceof PsyException) {
            if ($message === '') {
                $message = \get_class($e);
            } else {
                $message = \sprintf('%s with message \'%s\'', \get_class($e), $message);
            }
        }

        $message = \preg_replace(
            "#(\\w:)?(/\\w+)*/src/Execution(?:Loop)?Closure.php\(\d+\) : eval\(\)'d code#",
            "eval()'d code",
            \str_replace('\\', '/', $message)
        );

        $message = \str_replace(" in eval()'d code", ' in Psy Shell code', $message);

        $severity = ($e instanceof \ErrorException) ? $this->getSeverity($e) : 'error';

        return \sprintf('<%s>%s</%s>', $severity, OutputFormatter::escape($message), $severity);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Helper for getting an output style for the given ErrorException's level.
     *
     * @param \ErrorException $e
<<<<<<< HEAD
     */
    protected function getSeverity(\ErrorException $e): string
=======
     *
     * @return string
     */
    protected function getSeverity(\ErrorException $e)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $severity = $e->getSeverity();
        if ($severity & \error_reporting()) {
            switch ($severity) {
<<<<<<< HEAD
                case \E_WARNING:
                case \E_NOTICE:
                case \E_CORE_WARNING:
                case \E_COMPILE_WARNING:
                case \E_USER_WARNING:
                case \E_USER_NOTICE:
                case \E_USER_DEPRECATED:
                case \E_DEPRECATED:
                case \E_STRICT:
=======
                case E_WARNING:
                case E_NOTICE:
                case E_CORE_WARNING:
                case E_COMPILE_WARNING:
                case E_USER_WARNING:
                case E_USER_NOTICE:
                case E_STRICT:
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    return 'warning';

                default:
                    return 'error';
            }
        } else {
            // Since this is below the user's reporting threshold, it's always going to be a warning.
            return 'warning';
        }
    }

    /**
<<<<<<< HEAD
     * Helper for getting an output style for the given ErrorException's level.
     *
     * @param \Throwable $e
     */
    protected function getMessageLabel(\Throwable $e): string
    {
        if ($e instanceof \ErrorException) {
            $severity = $e->getSeverity();

            if ($severity & \error_reporting()) {
                switch ($severity) {
                    case \E_WARNING:
                        return 'Warning';
                    case \E_NOTICE:
                        return 'Notice';
                    case \E_CORE_WARNING:
                        return 'Core Warning';
                    case \E_COMPILE_WARNING:
                        return 'Compile Warning';
                    case \E_USER_WARNING:
                        return 'User Warning';
                    case \E_USER_NOTICE:
                        return 'User Notice';
                    case \E_USER_DEPRECATED:
                        return 'User Deprecated';
                    case \E_DEPRECATED:
                        return 'Deprecated';
                    case \E_STRICT:
                        return 'Strict';
                }
            }
        }

        if ($e instanceof PsyException || $e instanceof SymfonyConsoleException) {
            $exceptionShortName = (new \ReflectionClass($e))->getShortName();
            $typeParts = \preg_split('/(?=[A-Z])/', $exceptionShortName);

            switch ($exceptionShortName) {
                case 'RuntimeException':
                case 'LogicException':
                    // These ones look weird without 'Exception'
                    break;
                default:
                    if (\end($typeParts) === 'Exception') {
                        \array_pop($typeParts);
                    }
                    break;
            }

            return \trim(\strtoupper(\implode(' ', $typeParts)));
        }

        return \get_class($e);
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Execute code in the shell execution context.
     *
     * @param string $code
     * @param bool   $throwExceptions
     *
     * @return mixed
     */
<<<<<<< HEAD
    public function execute(string $code, bool $throwExceptions = false)
=======
    public function execute($code, $throwExceptions = false)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->setCode($code, true);
        $closure = new ExecutionClosure($this);

        if ($throwExceptions) {
            return $closure->execute();
        }

        try {
            return $closure->execute();
<<<<<<< HEAD
        } catch (\Throwable $_e) {
=======
        } catch (\TypeError $_e) {
            $this->writeException(TypeErrorException::fromTypeError($_e));
        } catch (\Error $_e) {
            $this->writeException(ErrorException::fromError($_e));
        } catch (\Exception $_e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->writeException($_e);
        }
    }

    /**
     * Helper for throwing an ErrorException.
     *
     * This allows us to:
     *
     *     set_error_handler([$psysh, 'handleError']);
     *
     * Unlike ErrorException::throwException, this error handler respects error
     * levels; i.e. it logs warnings and notices, but doesn't throw exceptions.
     * This should probably only be used in the inner execution loop of the
     * shell, as most of the time a thrown exception is much more useful.
     *
     * If the error type matches the `errorLoggingLevel` config, it will be
     * logged as well, regardless of the `error_reporting` level.
     *
     * @see \Psy\Exception\ErrorException::throwException
     * @see \Psy\Shell::writeException
     *
     * @throws \Psy\Exception\ErrorException depending on the error level
     *
     * @param int    $errno   Error type
     * @param string $errstr  Message
     * @param string $errfile Filename
     * @param int    $errline Line number
     */
    public function handleError($errno, $errstr, $errfile, $errline)
    {
        // This is an error worth throwing.
        //
        // n.b. Technically we can't handle all of these in userland code, but
        // we'll list 'em all for good measure
<<<<<<< HEAD
        if ($errno & (\E_ERROR | \E_PARSE | \E_CORE_ERROR | \E_COMPILE_ERROR | \E_USER_ERROR | \E_RECOVERABLE_ERROR)) {
            ErrorException::throwException($errno, $errstr, $errfile, $errline);
        }

        // When errors are suppressed, the error_reporting value will differ
        // from when we started executing. In that case, we won't log errors.
        $errorsSuppressed = $this->errorReporting !== null && $this->errorReporting !== \error_reporting();

        // Otherwise log it and continue.
        if ($errno & \error_reporting() || (!$errorsSuppressed && ($errno & $this->config->errorLoggingLevel()))) {
=======
        if ($errno & (E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_RECOVERABLE_ERROR)) {
            ErrorException::throwException($errno, $errstr, $errfile, $errline);
        }

        // Otherwise log it and continue.
        if ($errno & \error_reporting() || $errno & $this->config->errorLoggingLevel()) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->writeException(new ErrorException($errstr, 0, $errno, $errfile, $errline));
        }
    }

    /**
     * Format a value for display.
     *
     * @see Presenter::present
     *
     * @param mixed $val
     *
     * @return string Formatted value
     */
<<<<<<< HEAD
    protected function presentValue($val): string
=======
    protected function presentValue($val)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->config->getPresenter()->present($val);
    }

    /**
     * Get a command (if one exists) for the current input string.
     *
     * @param string $input
     *
     * @return BaseCommand|null
     */
<<<<<<< HEAD
    protected function getCommand(string $input)
=======
    protected function getCommand($input)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $input = new StringInput($input);
        if ($name = $input->getFirstArgument()) {
            return $this->get($name);
        }
    }

    /**
     * Check whether a command is set for the current input string.
     *
     * @param string $input
     *
     * @return bool True if the shell has a command for the given input
     */
<<<<<<< HEAD
    protected function hasCommand(string $input): bool
=======
    protected function hasCommand($input)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (\preg_match('/([^\s]+?)(?:\s|$)/A', \ltrim($input), $match)) {
            return $this->has($match[1]);
        }

        return false;
    }

    /**
     * Get the current input prompt.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string | null
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function getPrompt()
    {
        if ($this->output->isQuiet()) {
            return null;
        }

<<<<<<< HEAD
        $theme = $this->config->theme();

        if ($this->hasCode()) {
            return $theme->bufferPrompt();
        }

        return $theme->prompt();
=======
        if ($this->hasCode()) {
            return static::BUFF_PROMPT;
        }

        return $this->config->getPrompt() ?: static::PROMPT;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Read a line of user input.
     *
     * This will return a line from the input buffer (if any exist). Otherwise,
     * it will ask the user for input.
     *
     * If readline is enabled, this delegates to readline. Otherwise, it's an
     * ugly `fgets` call.
     *
     * @param bool $interactive
     *
<<<<<<< HEAD
     * @return string|false One line of user input
     */
    protected function readline(bool $interactive = true)
    {
        $prompt = $this->config->theme()->replayPrompt();

        if (!empty($this->inputBuffer)) {
            $line = \array_shift($this->inputBuffer);
            if (!$line instanceof SilentInput) {
                $this->output->writeln(\sprintf('<whisper>%s</whisper><aside>%s</aside>', $prompt, OutputFormatter::escape($line)));
=======
     * @return string One line of user input
     */
    protected function readline($interactive = true)
    {
        if (!empty($this->inputBuffer)) {
            $line = \array_shift($this->inputBuffer);
            if (!$line instanceof SilentInput) {
                $this->output->writeln(\sprintf('<aside>%s %s</aside>', static::REPLAY, OutputFormatter::escape($line)));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            return $line;
        }

        $bracketedPaste = $interactive && $this->config->useBracketedPaste();

        if ($bracketedPaste) {
            \printf("\e[?2004h"); // Enable bracketed paste
        }

        $line = $this->readline->readline($this->getPrompt());

        if ($bracketedPaste) {
            \printf("\e[?2004l"); // ... and disable it again
        }

        return $line;
    }

    /**
     * Get the shell output header.
<<<<<<< HEAD
     */
    protected function getHeader(): string
    {
        return \sprintf('<whisper>%s by Justin Hileman</whisper>', self::getVersionHeader($this->config->useUnicode()));
=======
     *
     * @return string
     */
    protected function getHeader()
    {
        return \sprintf('<aside>%s by Justin Hileman</aside>', $this->getVersion());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Get the current version of Psy Shell.
     *
     * @deprecated call self::getVersionHeader instead
<<<<<<< HEAD
     */
    public function getVersion(): string
    {
        @\trigger_error('`getVersion` is deprecated; call `self::getVersionHeader` instead.', \E_USER_DEPRECATED);

=======
     *
     * @return string
     */
    public function getVersion()
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return self::getVersionHeader($this->config->useUnicode());
    }

    /**
     * Get a pretty header including the current version of Psy Shell.
     *
     * @param bool $useUnicode
<<<<<<< HEAD
     */
    public static function getVersionHeader(bool $useUnicode = false): string
    {
        $separator = $useUnicode ? '—' : '-';

        return \sprintf('Psy Shell %s (PHP %s %s %s)', self::VERSION, \PHP_VERSION, $separator, \PHP_SAPI);
=======
     *
     * @return string
     */
    public static function getVersionHeader($useUnicode = false)
    {
        $separator = $useUnicode ? '—' : '-';

        return \sprintf('Psy Shell %s (PHP %s %s %s)', self::VERSION, PHP_VERSION, $separator, PHP_SAPI);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Get a PHP manual database instance.
     *
     * @return \PDO|null
     */
    public function getManualDb()
    {
        return $this->config->getManualDb();
    }

    /**
<<<<<<< HEAD
=======
     * @deprecated Tab completion is provided by the AutoCompleter service
     */
    protected function autocomplete($text)
    {
        @\trigger_error('Tab completion is provided by the AutoCompleter service', E_USER_DEPRECATED);
    }

    /**
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Initialize tab completion matchers.
     *
     * If tab completion is enabled this adds tab completion matchers to the
     * auto completer and sets context if needed.
     */
    protected function initializeTabCompletion()
    {
        if (!$this->config->useTabCompletion()) {
            return;
        }

        $this->autoCompleter = $this->config->getAutoCompleter();

        // auto completer needs shell to be linked to configuration because of
        // the context aware matchers
        $this->addMatchersToAutoCompleter($this->getDefaultMatchers());
        $this->addMatchersToAutoCompleter($this->matchers);

        $this->autoCompleter->activate();
    }

    /**
     * Add matchers to the auto completer, setting context if needed.
     *
     * @param array $matchers
     */
    private function addMatchersToAutoCompleter(array $matchers)
    {
        foreach ($matchers as $matcher) {
            if ($matcher instanceof ContextAware) {
                $matcher->setContext($this->context);
            }
            $this->autoCompleter->addMatcher($matcher);
        }
    }

    /**
<<<<<<< HEAD
=======
     * @todo Implement self-update
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @todo Implement prompt to start update
     *
     * @return void|string
     */
    protected function writeVersionInfo()
    {
<<<<<<< HEAD
        if (\PHP_SAPI !== 'cli') {
=======
        if (PHP_SAPI !== 'cli') {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return;
        }

        try {
            $client = $this->config->getChecker();
            if (!$client->isLatest()) {
<<<<<<< HEAD
                $this->output->writeln(\sprintf('<whisper>New version is available at psysh.org/psysh (current: %s, latest: %s)</whisper>', self::VERSION, $client->getLatest()));
=======
                $this->output->writeln(\sprintf('New version is available (current: %s, latest: %s)', self::VERSION, $client->getLatest()));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        } catch (\InvalidArgumentException $e) {
            $this->output->writeln($e->getMessage());
        }
    }

    /**
     * Write a startup message if set.
     */
    protected function writeStartupMessage()
    {
        $message = $this->config->getStartupMessage();
        if ($message !== null && $message !== '') {
            $this->output->writeln($message);
        }
    }
}
