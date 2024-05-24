<?php
/**
* Whoops - php errors for cool kids
* @author Filipe Dobreira <http://github.com/filp>
* Plaintext handler for command line and logs.
* @author Pierre-Yves Landuré <https://howto.biapy.com/>
*/

namespace Whoops\Handler;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Whoops\Exception\Frame;

/**
* Handler outputing plaintext error messages. Can be used
* directly, or will be instantiated automagically by Whoops\Run
* if passed to Run::pushHandler
*/
class PlainTextHandler extends Handler
{
    const VAR_DUMP_PREFIX = '   | ';

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var callable
     */
    protected $dumper;

    /**
     * @var bool
     */
    private $addTraceToOutput = true;

    /**
     * @var bool|integer
     */
    private $addTraceFunctionArgsToOutput = false;

    /**
     * @var integer
     */
    private $traceFunctionArgsOutputLimit = 1024;

    /**
     * @var bool
     */
    private $addPreviousToOutput = true;

    /**
     * @var bool
     */
    private $loggerOnly = false;

    /**
     * Constructor.
     * @throws InvalidArgumentException     If argument is not null or a LoggerInterface
     * @param  \Psr\Log\LoggerInterface|null $logger
     */
    public function __construct($logger = null)
    {
        $this->setLogger($logger);
    }

    /**
     * Set the output logger interface.
     * @throws InvalidArgumentException     If argument is not null or a LoggerInterface
     * @param  \Psr\Log\LoggerInterface|null $logger
     */
    public function setLogger($logger = null)
    {
        if (! (is_null($logger)
            || $logger instanceof LoggerInterface)) {
            throw new InvalidArgumentException(
                'Argument to ' . __METHOD__ .
                " must be a valid Logger Interface (aka. Monolog), " .
                get_class($logger) . ' given.'
            );
        }

        $this->logger = $logger;
    }

    /**
     * @return \Psr\Log\LoggerInterface|null
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Set var dumper callback function.
     *
     * @param  callable $dumper
<<<<<<< HEAD
     * @return static
=======
     * @return void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function setDumper(callable $dumper)
    {
        $this->dumper = $dumper;
<<<<<<< HEAD
        return $this;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Add error trace to output.
     * @param  bool|null  $addTraceToOutput
<<<<<<< HEAD
     * @return bool|static
=======
     * @return bool|$this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function addTraceToOutput($addTraceToOutput = null)
    {
        if (func_num_args() == 0) {
            return $this->addTraceToOutput;
        }

        $this->addTraceToOutput = (bool) $addTraceToOutput;
        return $this;
    }

    /**
     * Add previous exceptions to output.
     * @param  bool|null $addPreviousToOutput
<<<<<<< HEAD
     * @return bool|static
=======
     * @return bool|$this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function addPreviousToOutput($addPreviousToOutput = null)
    {
        if (func_num_args() == 0) {
            return $this->addPreviousToOutput;
        }

        $this->addPreviousToOutput = (bool) $addPreviousToOutput;
        return $this;
    }

    /**
     * Add error trace function arguments to output.
     * Set to True for all frame args, or integer for the n first frame args.
     * @param  bool|integer|null $addTraceFunctionArgsToOutput
<<<<<<< HEAD
     * @return static|bool|integer
=======
     * @return null|bool|integer
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function addTraceFunctionArgsToOutput($addTraceFunctionArgsToOutput = null)
    {
        if (func_num_args() == 0) {
            return $this->addTraceFunctionArgsToOutput;
        }

        if (! is_integer($addTraceFunctionArgsToOutput)) {
            $this->addTraceFunctionArgsToOutput = (bool) $addTraceFunctionArgsToOutput;
        } else {
            $this->addTraceFunctionArgsToOutput = $addTraceFunctionArgsToOutput;
        }
<<<<<<< HEAD
        return $this;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Set the size limit in bytes of frame arguments var_dump output.
     * If the limit is reached, the var_dump output is discarded.
     * Prevent memory limit errors.
     * @var integer
<<<<<<< HEAD
     * @return static
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function setTraceFunctionArgsOutputLimit($traceFunctionArgsOutputLimit)
    {
        $this->traceFunctionArgsOutputLimit = (integer) $traceFunctionArgsOutputLimit;
<<<<<<< HEAD
        return $this;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Create plain text response and return it as a string
     * @return string
     */
    public function generateResponse()
    {
        $exception = $this->getException();
        $message = $this->getExceptionOutput($exception);

        if ($this->addPreviousToOutput) {
            $previous = $exception->getPrevious();
            while ($previous) {
                $message .= "\n\nCaused by\n" . $this->getExceptionOutput($previous);
                $previous = $previous->getPrevious();
            }
        }


        return $message . $this->getTraceOutput() . "\n";
    }

    /**
     * Get the size limit in bytes of frame arguments var_dump output.
     * If the limit is reached, the var_dump output is discarded.
     * Prevent memory limit errors.
     * @return integer
     */
    public function getTraceFunctionArgsOutputLimit()
    {
        return $this->traceFunctionArgsOutputLimit;
    }

    /**
     * Only output to logger.
     * @param  bool|null $loggerOnly
<<<<<<< HEAD
     * @return static|bool
=======
     * @return null|bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function loggerOnly($loggerOnly = null)
    {
        if (func_num_args() == 0) {
            return $this->loggerOnly;
        }

        $this->loggerOnly = (bool) $loggerOnly;
<<<<<<< HEAD
        return $this;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Test if handler can output to stdout.
     * @return bool
     */
    private function canOutput()
    {
        return !$this->loggerOnly();
    }

    /**
     * Get the frame args var_dump.
     * @param  \Whoops\Exception\Frame $frame [description]
     * @param  integer                 $line  [description]
     * @return string
     */
    private function getFrameArgsOutput(Frame $frame, $line)
    {
        if ($this->addTraceFunctionArgsToOutput() === false
            || $this->addTraceFunctionArgsToOutput() < $line) {
            return '';
        }

        // Dump the arguments:
        ob_start();
        $this->dump($frame->getArgs());
        if (ob_get_length() > $this->getTraceFunctionArgsOutputLimit()) {
            // The argument var_dump is to big.
            // Discarded to limit memory usage.
            ob_clean();
            return sprintf(
                "\n%sArguments dump length greater than %d Bytes. Discarded.",
                self::VAR_DUMP_PREFIX,
                $this->getTraceFunctionArgsOutputLimit()
            );
        }

        return sprintf(
            "\n%s",
            preg_replace('/^/m', self::VAR_DUMP_PREFIX, ob_get_clean())
        );
    }

    /**
     * Dump variable.
     *
     * @param mixed $var
     * @return void
     */
    protected function dump($var)
    {
        if ($this->dumper) {
            call_user_func($this->dumper, $var);
        } else {
            var_dump($var);
        }
    }

    /**
     * Get the exception trace as plain text.
     * @return string
     */
    private function getTraceOutput()
    {
        if (! $this->addTraceToOutput()) {
            return '';
        }
        $inspector = $this->getInspector();
<<<<<<< HEAD
        $frames = $inspector->getFrames($this->getRun()->getFrameFilters());
=======
        $frames = $inspector->getFrames();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $response = "\nStack trace:";

        $line = 1;
        foreach ($frames as $frame) {
            /** @var Frame $frame */
            $class = $frame->getClass();

            $template = "\n%3d. %s->%s() %s:%d%s";
            if (! $class) {
                // Remove method arrow (->) from output.
                $template = "\n%3d. %s%s() %s:%d%s";
            }

            $response .= sprintf(
                $template,
                $line,
                $class,
                $frame->getFunction(),
                $frame->getFile(),
                $frame->getLine(),
                $this->getFrameArgsOutput($frame, $line)
            );

            $line++;
        }

        return $response;
    }

    /**
     * Get the exception as plain text.
     * @param \Throwable $exception
     * @return string
     */
    private function getExceptionOutput($exception)
    {
        return sprintf(
            "%s: %s in file %s on line %d",
            get_class($exception),
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine()
        );
    }

    /**
     * @return int
     */
    public function handle()
    {
        $response = $this->generateResponse();

        if ($this->getLogger()) {
            $this->getLogger()->error($response);
        }

        if (! $this->canOutput()) {
            return Handler::DONE;
        }

        echo $response;

        return Handler::QUIT;
    }

    /**
     * @return string
     */
    public function contentType()
    {
        return 'text/plain';
    }
}
