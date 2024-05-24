<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use ReflectionExtension;

/**
 * Monolog POSIX signal handler
 *
 * @author Robert Gust-Bardon <robert@gust-bardon.org>
<<<<<<< HEAD
 *
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class SignalHandler
{
    /** @var LoggerInterface */
    private $logger;

    /** @var array<int, callable|string|int> SIG_DFL, SIG_IGN or previous callable */
    private $previousSignalHandler = [];
    /** @var array<int, int> */
    private $signalLevelMap = [];
    /** @var array<int, bool> */
=======
 */
class SignalHandler
{
    private $logger;

    private $previousSignalHandler = [];
    private $signalLevelMap = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    private $signalRestartSyscalls = [];

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

<<<<<<< HEAD
    /**
     * @param  int|string $level           Level or level name
     * @param  bool       $callPrevious
     * @param  bool       $restartSyscalls
     * @param  bool|null  $async
     * @return $this
     *
     * @phpstan-param Level|LevelName|LogLevel::* $level
     */
    public function registerSignalHandler(int $signo, $level = LogLevel::CRITICAL, bool $callPrevious = true, bool $restartSyscalls = true, ?bool $async = true): self
=======
    public function registerSignalHandler($signo, $level = LogLevel::CRITICAL, bool $callPrevious = true, bool $restartSyscalls = true, ?bool $async = true): self
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!extension_loaded('pcntl') || !function_exists('pcntl_signal')) {
            return $this;
        }

<<<<<<< HEAD
        $level = Logger::toMonologLevel($level);

        if ($callPrevious) {
            $handler = pcntl_signal_get_handler($signo);
=======
        if ($callPrevious) {
            $handler = pcntl_signal_get_handler($signo);
            if ($handler === false) {
                return $this;
            }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->previousSignalHandler[$signo] = $handler;
        } else {
            unset($this->previousSignalHandler[$signo]);
        }
        $this->signalLevelMap[$signo] = $level;
        $this->signalRestartSyscalls[$signo] = $restartSyscalls;

        if ($async !== null) {
            pcntl_async_signals($async);
        }

        pcntl_signal($signo, [$this, 'handleSignal'], $restartSyscalls);

        return $this;
    }

<<<<<<< HEAD
    /**
     * @param mixed $siginfo
     */
    public function handleSignal(int $signo, $siginfo = null): void
=======
    public function handleSignal($signo, array $siginfo = null): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        static $signals = [];

        if (!$signals && extension_loaded('pcntl')) {
            $pcntl = new ReflectionExtension('pcntl');
            // HHVM 3.24.2 returns an empty array.
            foreach ($pcntl->getConstants() ?: get_defined_constants(true)['Core'] as $name => $value) {
                if (substr($name, 0, 3) === 'SIG' && $name[3] !== '_' && is_int($value)) {
                    $signals[$value] = $name;
                }
            }
        }

        $level = $this->signalLevelMap[$signo] ?? LogLevel::CRITICAL;
        $signal = $signals[$signo] ?? $signo;
        $context = $siginfo ?? [];
        $this->logger->log($level, sprintf('Program received signal %s', $signal), $context);

        if (!isset($this->previousSignalHandler[$signo])) {
            return;
        }

<<<<<<< HEAD
        if ($this->previousSignalHandler[$signo] === SIG_DFL) {
=======
        if ($this->previousSignalHandler[$signo] === true || $this->previousSignalHandler[$signo] === SIG_DFL) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            if (extension_loaded('pcntl') && function_exists('pcntl_signal') && function_exists('pcntl_sigprocmask') && function_exists('pcntl_signal_dispatch')
                && extension_loaded('posix') && function_exists('posix_getpid') && function_exists('posix_kill')
            ) {
                $restartSyscalls = $this->signalRestartSyscalls[$signo] ?? true;
                pcntl_signal($signo, SIG_DFL, $restartSyscalls);
                pcntl_sigprocmask(SIG_UNBLOCK, [$signo], $oldset);
                posix_kill(posix_getpid(), $signo);
                pcntl_signal_dispatch();
                pcntl_sigprocmask(SIG_SETMASK, $oldset);
                pcntl_signal($signo, [$this, 'handleSignal'], $restartSyscalls);
            }
        } elseif (is_callable($this->previousSignalHandler[$signo])) {
            $this->previousSignalHandler[$signo]($signo, $siginfo);
        }
    }
}
