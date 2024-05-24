<?php
/**
 * Whoops - php errors for cool kids
 * @author Filipe Dobreira <http://github.com/filp>
 */

namespace Whoops;

use InvalidArgumentException;
<<<<<<< HEAD
use Throwable;
use Whoops\Exception\ErrorException;
use Whoops\Handler\CallbackHandler;
use Whoops\Handler\Handler;
use Whoops\Handler\HandlerInterface;
use Whoops\Inspector\CallableInspectorFactory;
use Whoops\Inspector\InspectorFactory;
use Whoops\Inspector\InspectorFactoryInterface;
use Whoops\Inspector\InspectorInterface;
=======
use Whoops\Exception\ErrorException;
use Whoops\Exception\Inspector;
use Whoops\Handler\CallbackHandler;
use Whoops\Handler\Handler;
use Whoops\Handler\HandlerInterface;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Whoops\Util\Misc;
use Whoops\Util\SystemFacade;

final class Run implements RunInterface
{
<<<<<<< HEAD
    /**
     * @var bool
     */
    private $isRegistered;

    /**
     * @var bool
     */
    private $allowQuit       = true;

    /**
     * @var bool
     */
=======
    private $isRegistered;
    private $allowQuit       = true;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    private $sendOutput      = true;

    /**
     * @var integer|false
     */
    private $sendHttpCode    = 500;

    /**
<<<<<<< HEAD
     * @var integer|false
     */
    private $sendExitCode    = 1;

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @var HandlerInterface[]
     */
    private $handlerStack = [];

<<<<<<< HEAD
    /**
     * @var array
     * @psalm-var list<array{patterns: string, levels: int}>
     */
    private $silencedPatterns = [];

    /**
     * @var SystemFacade
     */
    private $system;

    /**
     * In certain scenarios, like in shutdown handler, we can not throw exceptions.
     *
     * @var bool
     */
    private $canThrowExceptions = true;

    /**
     * The inspector factory to create inspectors.
     *
     * @var InspectorFactoryInterface
     */
    private $inspectorFactory;

    /**
     * @var array<callable>
     */
    private $frameFilters = [];

    public function __construct(SystemFacade $system = null)
    {
        $this->system = $system ?: new SystemFacade;
        $this->inspectorFactory = new InspectorFactory();
    }

    /**
     * Explicitly request your handler runs as the last of all currently registered handlers.
     *
     * @param callable|HandlerInterface $handler
     *
     * @return Run
=======
    private $silencedPatterns = [];

    private $system;

    public function __construct(SystemFacade $system = null)
    {
        $this->system = $system ?: new SystemFacade;
    }

    /**
     * Explicitly request your handler runs as the last of all currently registered handlers
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function appendHandler($handler)
    {
        array_unshift($this->handlerStack, $this->resolveHandler($handler));
        return $this;
    }

    /**
<<<<<<< HEAD
     * Explicitly request your handler runs as the first of all currently registered handlers.
     *
     * @param callable|HandlerInterface $handler
     *
     * @return Run
=======
     * Explicitly request your handler runs as the first of all currently registered handlers
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function prependHandler($handler)
    {
        return $this->pushHandler($handler);
    }

    /**
<<<<<<< HEAD
     * Register your handler as the last of all currently registered handlers (to be executed first).
     * Prefer using appendHandler and prependHandler for clarity.
     *
     * @param callable|HandlerInterface $handler
     *
     * @return Run
     *
     * @throws InvalidArgumentException If argument is not callable or instance of HandlerInterface.
=======
     * Register your handler as the last of all currently registered handlers.
     * Prefer using appendHandler and prependHandler for clarity.
     *
     * @throws InvalidArgumentException  If argument is not callable or instance of HandlerInterface
     * @param  Callable|HandlerInterface $handler
     * @return Run
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function pushHandler($handler)
    {
        $this->handlerStack[] = $this->resolveHandler($handler);
        return $this;
    }

    /**
<<<<<<< HEAD
     * Removes and returns the last handler pushed to the handler stack.
     *
     * @see Run::removeFirstHandler(), Run::removeLastHandler()
     *
     * @return HandlerInterface|null
=======
     * See removeFirstHandler and removeLastHandler
     * @return null|HandlerInterface
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function popHandler()
    {
        return array_pop($this->handlerStack);
    }

<<<<<<< HEAD
    /**
     * Removes the first handler.
     *
     * @return void
=======

    /**
     * Removes the first handler
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function removeFirstHandler()
    {
        array_pop($this->handlerStack);
    }

    /**
<<<<<<< HEAD
     * Removes the last handler.
     *
     * @return void
=======
     * Removes the last handler
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function removeLastHandler()
    {
        array_shift($this->handlerStack);
    }

    /**
<<<<<<< HEAD
     * Returns an array with all handlers, in the order they were added to the stack.
     *
=======
     * Returns an array with all handlers, in the
     * order they were added to the stack.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public function getHandlers()
    {
        return $this->handlerStack;
    }

    /**
<<<<<<< HEAD
     * Clears all handlers in the handlerStack, including the default PrettyPage handler.
     *
=======
     * Clears all handlers in the handlerStack, including
     * the default PrettyPage handler.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return Run
     */
    public function clearHandlers()
    {
        $this->handlerStack = [];
        return $this;
    }

<<<<<<< HEAD
    public function getFrameFilters()
    {
        return $this->frameFilters;
    }

    public function clearFrameFilters()
    {
        $this->frameFilters = [];
        return $this;
=======
    /**
     * @param  \Throwable $exception
     * @return Inspector
     */
    private function getInspector($exception)
    {
        return new Inspector($exception);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Registers this instance as an error handler.
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return Run
     */
    public function register()
    {
        if (!$this->isRegistered) {
            // Workaround PHP bug 42098
            // https://bugs.php.net/bug.php?id=42098
            class_exists("\\Whoops\\Exception\\ErrorException");
            class_exists("\\Whoops\\Exception\\FrameCollection");
            class_exists("\\Whoops\\Exception\\Frame");
            class_exists("\\Whoops\\Exception\\Inspector");
<<<<<<< HEAD
            class_exists("\\Whoops\\Inspector\\InspectorFactory");
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            $this->system->setErrorHandler([$this, self::ERROR_HANDLER]);
            $this->system->setExceptionHandler([$this, self::EXCEPTION_HANDLER]);
            $this->system->registerShutdownFunction([$this, self::SHUTDOWN_HANDLER]);

            $this->isRegistered = true;
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * Unregisters all handlers registered by this Whoops\Run instance.
     *
=======
     * Unregisters all handlers registered by this Whoops\Run instance
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return Run
     */
    public function unregister()
    {
        if ($this->isRegistered) {
            $this->system->restoreExceptionHandler();
            $this->system->restoreErrorHandler();

            $this->isRegistered = false;
        }

        return $this;
    }

    /**
     * Should Whoops allow Handlers to force the script to quit?
<<<<<<< HEAD
     *
     * @param bool|int $exit
     *
=======
     * @param  bool|int $exit
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    public function allowQuit($exit = null)
    {
        if (func_num_args() == 0) {
            return $this->allowQuit;
        }

        return $this->allowQuit = (bool) $exit;
    }

    /**
<<<<<<< HEAD
     * Silence particular errors in particular files.
     *
     * @param array|string $patterns List or a single regex pattern to match.
     * @param int          $levels   Defaults to E_STRICT | E_DEPRECATED.
     *
     * @return Run
=======
     * Silence particular errors in particular files
     * @param  array|string $patterns List or a single regex pattern to match
     * @param  int          $levels   Defaults to E_STRICT | E_DEPRECATED
     * @return \Whoops\Run
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function silenceErrorsInPaths($patterns, $levels = 10240)
    {
        $this->silencedPatterns = array_merge(
            $this->silencedPatterns,
            array_map(
                function ($pattern) use ($levels) {
                    return [
                        "pattern" => $pattern,
                        "levels" => $levels,
                    ];
                },
                (array) $patterns
            )
        );
<<<<<<< HEAD

        return $this;
    }

    /**
     * Returns an array with silent errors in path configuration.
=======
        return $this;
    }


    /**
     * Returns an array with silent errors in path configuration
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @return array
     */
    public function getSilenceErrorsInPaths()
    {
        return $this->silencedPatterns;
    }

<<<<<<< HEAD
    /**
=======
    /*
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Should Whoops send HTTP error code to the browser if possible?
     * Whoops will by default send HTTP code 500, but you may wish to
     * use 502, 503, or another 5xx family code.
     *
     * @param bool|int $code
<<<<<<< HEAD
     *
     * @return int|false
     *
     * @throws InvalidArgumentException
=======
     * @return int|false
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function sendHttpCode($code = null)
    {
        if (func_num_args() == 0) {
            return $this->sendHttpCode;
        }

        if (!$code) {
            return $this->sendHttpCode = false;
        }

        if ($code === true) {
            $code = 500;
        }

        if ($code < 400 || 600 <= $code) {
            throw new InvalidArgumentException(
<<<<<<< HEAD
                "Invalid status code '$code', must be 4xx or 5xx"
=======
                 "Invalid status code '$code', must be 4xx or 5xx"
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            );
        }

        return $this->sendHttpCode = $code;
    }

    /**
<<<<<<< HEAD
     * Should Whoops exit with a specific code on the CLI if possible?
     * Whoops will exit with 1 by default, but you can specify something else.
     *
     * @param int $code
     *
     * @return int
     *
     * @throws InvalidArgumentException
     */
    public function sendExitCode($code = null)
    {
        if (func_num_args() == 0) {
            return $this->sendExitCode;
        }

        if ($code < 0 || 255 <= $code) {
            throw new InvalidArgumentException(
                "Invalid status code '$code', must be between 0 and 254"
            );
        }

        return $this->sendExitCode = (int) $code;
    }

    /**
     * Should Whoops push output directly to the client?
     * If this is false, output will be returned by handleException.
     *
     * @param bool|int $send
     *
=======
     * Should Whoops push output directly to the client?
     * If this is false, output will be returned by handleException
     * @param  bool|int $send
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    public function writeToOutput($send = null)
    {
        if (func_num_args() == 0) {
            return $this->sendOutput;
        }

        return $this->sendOutput = (bool) $send;
    }

    /**
<<<<<<< HEAD
     * Handles an exception, ultimately generating a Whoops error page.
     *
     * @param Throwable $exception
     *
     * @return string Output generated by handlers.
=======
     * Handles an exception, ultimately generating a Whoops error
     * page.
     *
     * @param  \Throwable $exception
     * @return string     Output generated by handlers
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function handleException($exception)
    {
        // Walk the registered handlers in the reverse order
        // they were registered, and pass off the exception
        $inspector = $this->getInspector($exception);

        // Capture output produced while handling the exception,
        // we might want to send it straight away to the client,
        // or return it silently.
        $this->system->startOutputBuffering();

        // Just in case there are no handlers:
        $handlerResponse = null;
        $handlerContentType = null;

        try {
            foreach (array_reverse($this->handlerStack) as $handler) {
                $handler->setRun($this);
                $handler->setInspector($inspector);
                $handler->setException($exception);

                // The HandlerInterface does not require an Exception passed to handle()
                // and neither of our bundled handlers use it.
                // However, 3rd party handlers may have already relied on this parameter,
                // and removing it would be possibly breaking for users.
                $handlerResponse = $handler->handle($exception);

                // Collect the content type for possible sending in the headers.
                $handlerContentType = method_exists($handler, 'contentType') ? $handler->contentType() : null;

                if (in_array($handlerResponse, [Handler::LAST_HANDLER, Handler::QUIT])) {
                    // The Handler has handled the exception in some way, and
                    // wishes to quit execution (Handler::QUIT), or skip any
                    // other handlers (Handler::LAST_HANDLER). If $this->allowQuit
                    // is false, Handler::QUIT behaves like Handler::LAST_HANDLER
                    break;
                }
            }

            $willQuit = $handlerResponse == Handler::QUIT && $this->allowQuit();
        } finally {
            $output = $this->system->cleanOutputBuffer();
        }

        // If we're allowed to, send output generated by handlers directly
        // to the output, otherwise, and if the script doesn't quit, return
        // it so that it may be used by the caller
        if ($this->writeToOutput()) {
            // @todo Might be able to clean this up a bit better
            if ($willQuit) {
                // Cleanup all other output buffers before sending our output:
                while ($this->system->getOutputBufferLevel() > 0) {
                    $this->system->endOutputBuffering();
                }

                // Send any headers if needed:
                if (Misc::canSendHeaders() && $handlerContentType) {
                    header("Content-Type: {$handlerContentType}");
                }
            }

            $this->writeToOutputNow($output);
        }

        if ($willQuit) {
            // HHVM fix for https://github.com/facebook/hhvm/issues/4055
            $this->system->flushOutputBuffer();

<<<<<<< HEAD
            $this->system->stopExecution(
                $this->sendExitCode()
            );
=======
            $this->system->stopExecution(1);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $output;
    }

    /**
<<<<<<< HEAD
     * Converts generic PHP errors to \ErrorException instances, before passing them off to be handled.
     *
     * This method MUST be compatible with set_error_handler.
     *
     * @param int         $level
     * @param string      $message
     * @param string|null $file
     * @param int|null    $line
     *
     * @return bool
     *
=======
     * Converts generic PHP errors to \ErrorException
     * instances, before passing them off to be handled.
     *
     * This method MUST be compatible with set_error_handler.
     *
     * @param int    $level
     * @param string $message
     * @param string $file
     * @param int    $line
     *
     * @return bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @throws ErrorException
     */
    public function handleError($level, $message, $file = null, $line = null)
    {
        if ($level & $this->system->getErrorReportingLevel()) {
            foreach ($this->silencedPatterns as $entry) {
                $pathMatches = (bool) preg_match($entry["pattern"], $file);
                $levelMatches = $level & $entry["levels"];
                if ($pathMatches && $levelMatches) {
                    // Ignore the error, abort handling
                    // See https://github.com/filp/whoops/issues/418
                    return true;
                }
            }

            // XXX we pass $level for the "code" param only for BC reasons.
            // see https://github.com/filp/whoops/issues/267
            $exception = new ErrorException($message, /*code*/ $level, /*severity*/ $level, $file, $line);
            if ($this->canThrowExceptions) {
                throw $exception;
            } else {
                $this->handleException($exception);
            }
            // Do not propagate errors which were already handled by Whoops.
            return true;
        }

        // Propagate error to the next handler, allows error_get_last() to
        // work on silenced errors.
        return false;
    }

    /**
     * Special case to deal with Fatal errors and the like.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function handleShutdown()
    {
        // If we reached this step, we are in shutdown handler.
        // An exception thrown in a shutdown handler will not be propagated
        // to the exception handler. Pass that information along.
        $this->canThrowExceptions = false;

        $error = $this->system->getLastError();
        if ($error && Misc::isLevelFatal($error['type'])) {
            // If there was a fatal error,
            // it was not handled in handleError yet.
            $this->allowQuit = false;
            $this->handleError(
                $error['type'],
                $error['message'],
                $error['file'],
                $error['line']
            );
        }
    }

<<<<<<< HEAD

    /**
     * @param InspectorFactoryInterface $factory
     *
     * @return void
     */
    public function setInspectorFactory(InspectorFactoryInterface $factory)
    {
        $this->inspectorFactory = $factory;
    }

    public function addFrameFilter($filterCallback)
    {
        if (!is_callable($filterCallback)) {
            throw new \InvalidArgumentException(sprintf(
                "A frame filter must be of type callable, %s type given.", 
                gettype($filterCallback)
            ));
        }

        $this->frameFilters[] = $filterCallback;
        return $this;
    }

    /**
     * @param Throwable $exception
     *
     * @return InspectorInterface
     */
    private function getInspector($exception)
    {
        return $this->inspectorFactory->create($exception);
    }

    /**
     * Resolves the giving handler.
     *
     * @param callable|HandlerInterface $handler
     *
     * @return HandlerInterface
     *
     * @throws InvalidArgumentException
     */
=======
    /**
     * In certain scenarios, like in shutdown handler, we can not throw exceptions
     * @var bool
     */
    private $canThrowExceptions = true;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    private function resolveHandler($handler)
    {
        if (is_callable($handler)) {
            $handler = new CallbackHandler($handler);
        }

        if (!$handler instanceof HandlerInterface) {
            throw new InvalidArgumentException(
<<<<<<< HEAD
                "Handler must be a callable, or instance of "
=======
                  "Handler must be a callable, or instance of "
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                . "Whoops\\Handler\\HandlerInterface"
            );
        }

        return $handler;
    }

    /**
<<<<<<< HEAD
     * Echo something to the browser.
     *
     * @param string $output
     *
     * @return Run
     */
    private function writeToOutputNow($output)
    {
        if ($this->sendHttpCode() && Misc::canSendHeaders()) {
=======
     * Echo something to the browser
     * @param  string $output
     * @return $this
     */
    private function writeToOutputNow($output)
    {
        if ($this->sendHttpCode() && \Whoops\Util\Misc::canSendHeaders()) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->system->setHttpResponseCode(
                $this->sendHttpCode()
            );
        }

        echo $output;

        return $this;
    }
}
