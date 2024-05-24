<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Logger;
use Monolog\Utils;

/**
 * Stores to any stream resource
 *
 * Can be used to store into php://stderr, remote and local files, etc.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
 *
 * @phpstan-import-type FormattedRecord from AbstractProcessingHandler
 */
class StreamHandler extends AbstractProcessingHandler
{
    /** @const int */
    protected const MAX_CHUNK_SIZE = 2147483647;
    /** @const int 10MB */
    protected const DEFAULT_CHUNK_SIZE = 10 * 1024 * 1024;
    /** @var int */
    protected $streamChunkSize;
    /** @var resource|null */
    protected $stream;
    /** @var ?string */
    protected $url = null;
    /** @var ?string */
    private $errorMessage = null;
    /** @var ?int */
    protected $filePermission;
    /** @var bool */
    protected $useLocking;
    /** @var true|null */
    private $dirCreated = null;

    /**
     * @param resource|string $stream         If a missing path can't be created, an UnexpectedValueException will be thrown on first write
=======
 */
class StreamHandler extends AbstractProcessingHandler
{
    /** @var resource|null */
    protected $stream;
    protected $url;
    /** @var string|null */
    private $errorMessage;
    protected $filePermission;
    protected $useLocking;
    private $dirCreated;

    /**
     * @param resource|string $stream         If a missing path can't be created, an UnexpectedValueException will be thrown on first write
     * @param string|int      $level          The minimum logging level at which this handler will be triggered
     * @param bool            $bubble         Whether the messages that are handled can bubble up the stack or not
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param int|null        $filePermission Optional file permissions (default (0644) are only for owner read/write)
     * @param bool            $useLocking     Try to lock log file before doing any writes
     *
     * @throws \InvalidArgumentException If stream is not a resource or string
     */
    public function __construct($stream, $level = Logger::DEBUG, bool $bubble = true, ?int $filePermission = null, bool $useLocking = false)
    {
        parent::__construct($level, $bubble);
<<<<<<< HEAD

        if (($phpMemoryLimit = Utils::expandIniShorthandBytes(ini_get('memory_limit'))) !== false) {
            if ($phpMemoryLimit > 0) {
                // use max 10% of allowed memory for the chunk size, and at least 100KB
                $this->streamChunkSize = min(static::MAX_CHUNK_SIZE, max((int) ($phpMemoryLimit / 10), 100 * 1024));
            } else {
                // memory is unlimited, set to the default 10MB
                $this->streamChunkSize = static::DEFAULT_CHUNK_SIZE;
            }
        } else {
            // no memory limit information, set to the default 10MB
            $this->streamChunkSize = static::DEFAULT_CHUNK_SIZE;
        }

        if (is_resource($stream)) {
            $this->stream = $stream;

            stream_set_chunk_size($this->stream, $this->streamChunkSize);
=======
        if (is_resource($stream)) {
            $this->stream = $stream;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } elseif (is_string($stream)) {
            $this->url = Utils::canonicalizePath($stream);
        } else {
            throw new \InvalidArgumentException('A stream must either be a resource or a string.');
        }

        $this->filePermission = $filePermission;
        $this->useLocking = $useLocking;
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function close(): void
    {
        if ($this->url && is_resource($this->stream)) {
            fclose($this->stream);
        }
        $this->stream = null;
        $this->dirCreated = null;
    }

    /**
     * Return the currently active stream if it is open
     *
     * @return resource|null
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * Return the stream URL if it was configured with a URL and not an active resource
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
<<<<<<< HEAD
     * @return int
     */
    public function getStreamChunkSize(): int
    {
        return $this->streamChunkSize;
    }

    /**
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function write(array $record): void
    {
        if (!is_resource($this->stream)) {
<<<<<<< HEAD
            $url = $this->url;
            if (null === $url || '' === $url) {
                throw new \LogicException('Missing stream url, the stream can not be opened. This may be caused by a premature call to close().' . Utils::getRecordMessageForException($record));
            }
            $this->createDir($url);
            $this->errorMessage = null;
            set_error_handler([$this, 'customErrorHandler']);
            try {
                $stream = fopen($url, 'a');
                if ($this->filePermission !== null) {
                    @chmod($url, $this->filePermission);
                }
            } finally {
                restore_error_handler();
            }
            if (!is_resource($stream)) {
                $this->stream = null;

                throw new \UnexpectedValueException(sprintf('The stream or file "%s" could not be opened in append mode: '.$this->errorMessage, $url) . Utils::getRecordMessageForException($record));
            }
            stream_set_chunk_size($stream, $this->streamChunkSize);
            $this->stream = $stream;
        }

        $stream = $this->stream;
        if (!is_resource($stream)) {
            throw new \LogicException('No stream was opened yet' . Utils::getRecordMessageForException($record));
=======
            if (null === $this->url || '' === $this->url) {
                throw new \LogicException('Missing stream url, the stream can not be opened. This may be caused by a premature call to close().');
            }
            $this->createDir();
            $this->errorMessage = null;
            set_error_handler([$this, 'customErrorHandler']);
            $this->stream = fopen($this->url, 'a');
            if ($this->filePermission !== null) {
                @chmod($this->url, $this->filePermission);
            }
            restore_error_handler();
            if (!is_resource($this->stream)) {
                $this->stream = null;

                throw new \UnexpectedValueException(sprintf('The stream or file "%s" could not be opened in append mode: '.$this->errorMessage, $this->url));
            }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($this->useLocking) {
            // ignoring errors here, there's not much we can do about them
<<<<<<< HEAD
            flock($stream, LOCK_EX);
        }

        $this->streamWrite($stream, $record);

        if ($this->useLocking) {
            flock($stream, LOCK_UN);
=======
            flock($this->stream, LOCK_EX);
        }

        $this->streamWrite($this->stream, $record);

        if ($this->useLocking) {
            flock($this->stream, LOCK_UN);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * Write to stream
     * @param resource $stream
     * @param array    $record
<<<<<<< HEAD
     *
     * @phpstan-param FormattedRecord $record
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function streamWrite($stream, array $record): void
    {
        fwrite($stream, (string) $record['formatted']);
    }

<<<<<<< HEAD
    private function customErrorHandler(int $code, string $msg): bool
=======
    private function customErrorHandler($code, $msg): bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->errorMessage = preg_replace('{^(fopen|mkdir)\(.*?\): }', '', $msg);

        return true;
    }

    private function getDirFromStream(string $stream): ?string
    {
        $pos = strpos($stream, '://');
        if ($pos === false) {
            return dirname($stream);
        }

        if ('file://' === substr($stream, 0, 7)) {
            return dirname(substr($stream, 7));
        }

        return null;
    }

<<<<<<< HEAD
    private function createDir(string $url): void
=======
    private function createDir(): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // Do not try to create dir if it has already been tried.
        if ($this->dirCreated) {
            return;
        }

<<<<<<< HEAD
        $dir = $this->getDirFromStream($url);
=======
        $dir = $this->getDirFromStream($this->url);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if (null !== $dir && !is_dir($dir)) {
            $this->errorMessage = null;
            set_error_handler([$this, 'customErrorHandler']);
            $status = mkdir($dir, 0777, true);
            restore_error_handler();
<<<<<<< HEAD
            if (false === $status && !is_dir($dir) && strpos((string) $this->errorMessage, 'File exists') === false) {
=======
            if (false === $status && !is_dir($dir)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                throw new \UnexpectedValueException(sprintf('There is no existing directory at "%s" and it could not be created: '.$this->errorMessage, $dir));
            }
        }
        $this->dirCreated = true;
    }
}
